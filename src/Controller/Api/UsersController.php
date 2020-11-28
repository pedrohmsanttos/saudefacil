<?php
namespace App\Controller\Api;

use App\Controller\Api\AppController;
use Cake\Event\Event;
use Cake\I18n\Time;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UserTable $Users
 */
class UsersController extends AppController
{

     public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
    }
    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->set('title', 'Usuários');
        $admins = $this->paginate($this->Admins);

        $this->set(compact('admins'));
        $this->set('_serialize', ['admins']);
    }

    /**
     * View method
     *
     * @param string|null $id Admin id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $admin = $this->Admins->get($id, [
            'contain' => []
        ]);

        $this->set('admin', $admin);
        $this->set('_serialize', ['admin']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {

        $this->request->data['token'] = md5($this->request->data['password'] . KEY_TOKEN);
        $this->autoRender = false;
        $user = $this->Users->newEntity();
        $returnData = array();

        if ($this->request->is('post')) {

            $user = $this->Users->patchEntity($user, $this->request->data);
            if ($this->Users->save($user)) {
                $returnData['type'] = 'success';
            } else {
              $errors = $this->return_message_errors($user->errors());

              $returnData['type']   = 'error';
              $returnData['errors'] = $errors;
            }
        }
        $this->response->type('json');
        $this->response->body(json_encode($returnData));
        return $this->response;
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $id = ($id == null) ? trim($this->request->data['id']) : $id;
        $user = $this->Users->get($id);

        // pr($user);die;

        if ($this->request->is(['patch', 'post', 'put'])) {
           // pr($this->request->data);die;
            $user = $this->Users->patchEntity($this->Users->get($id), $this->request->data);
           
            if ($this->Users->save($user)) {
			    $returnData['type'] = 'success';
                $returnData['data'] = $user;
            } else {
				
              $errors = $this->return_message_errors($user->errors());

              $returnData['type']   = 'error';
              $returnData['errors'] = $errors;
            }
        }

        $this->response->type('json');
        $this->response->body(json_encode($returnData));
        return $this->response;

    }

    public function getCitiesByState(){

        if($this->request->is('post')){
            $cities = $this->return_cities($this->request->data['state']);
            // pr($cities);
            $returnData = $cities;

        }

        $this->response->type('json');
        $this->response->body(json_encode($returnData));
        return $this->response;
    }

    /**
     * Delete method
     *
     * @param string|null $id Admin id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $admin = $this->Admins->get($id);
        if ($this->Admins->delete($admin)) {
            $this->Flash->success(__('The admin has been deleted.'));
        } else {
            $this->Flash->error(__('The admin could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }

    public function getSpecialties(){
      $this->autoRender = false;
      $this->loadModel('Specialties');

      $specialties = $query = $this->Specialties->find('all',['fields' =>['id','name']])
      ->join(['us' =>['table' => 'units_specialties','type' => 'INNER','conditions' => 'us.specialty_id = specialties.id',]])
      ->group(['Specialties.id'])
      ->toArray();

      $this->response->type('json');
      $this->response->body(json_encode($specialties));
      return $this->response;
    }

    /**
     * Login method
     *
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function login()
    {
      $this -> autoRender = false;
      if ($this->request->is('post')) {
        $password = $this->request->data['password'];
        $email    = $this->request->data['username'];
        // Converte senha em token para achar o usuário por ele
        $token = md5($password . KEY_TOKEN);

        // Procurando usuário
        $query = $this->Users->find('all')->where(['Users.token' => $token, 'Users.username' => $email]);
        $user = $query->toArray();

        $returnData = array();
        if(!empty($user)){

          $user['0']['birthday']  = Time::parse($user['0']['birthday'] );
          $user['0']['birthday'] = $user['0']['birthday']->format('d/m/Y');

          $returnData['type'] = 'success';
          $returnData['data'] = $user['0'];

        }else{
          $returnData['type']     = 'error';
          $returnData['message']  = 'Senha incorreta / Usúario não cadastrado!';
        }
        $this->response->type('json');
        $this->response->body(json_encode($returnData));
        return $this->response;

      }
    }

    /**
     * Logout method
     *
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function logout()
    {
        return $this->redirect($this->Auth->logout());
    }
}
