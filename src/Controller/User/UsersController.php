<?php
namespace App\Controller\User;

// use App\Controller\AppController;
use App\Controller\User\AppController;
use Cake\Event\Event;
use Cake\Utility\Security;
/**
 * Users Controller
 *
 * @author Pedro H M dos Santos <phmsanttos@gmail.com>
 *
 * @property \App\Model\Table\UsersTable $Users
 */
class UsersController extends AppController
{

    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        $this->Auth->allow(['add', 'logout', 'forgotPassword', 'resetPassword']);
    }

    public function beforeRender(Event $event)
    {
       parent::beforeRender($event);
      //  $this->viewBuilder()->helpers(['GoogleMap']);
    }
    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        // $this->viewBuilder()->layout('admin_user');
        $users = $this->paginate($this->Users);

        $this->set(compact('users'));
        $this->set('_serialize', ['users']);
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);

        $this->set('user', $user);
        $this->set('_serialize', ['user']);
    }




    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->set('title', 'Cadastro');
        $this->viewBuilder()->layout('login_user2');

        $states             = $this->return_states();
        $breed              = $this->breed;
        $sexual_orientation = $this->sexual_orientation;
        $deficiency_type    = $this->deficiency_type;
        $cities             = $this->return_cities('PE');

        $responsible = ['1' => 'Sim', '0' => 'Não'];



        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->data);

            if ($this->Users->save($user)) {
                $this->Flash->success(__('Usuário cadastrado com sucesso.'));
                return $this->redirect(['action' => 'login']);
            } else {

                $message = $this->return_message_errors($user->errors());
                $this->Flash->error(__('Erro ao criar usuário: ' . $message));
            }
        }
        $this->set(compact('user', 'breed', 'sexual_orientation', 'deficiency_type', 'responsible', 'states', 'cities'));
        $this->set('_serialize', ['user']);
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit()
    {
        $this->set('title', 'Meus Dados');


        $states             = $this->return_states();
        $breed              = $this->breed;
        $sexual_orientation = $this->sexual_orientation;
        $deficiency_type    = $this->deficiency_type;
        $cities             = $this->return_cities('PE');

        $responsible = ['1' => 'Sim', '0' => 'Não'];

        $id = $this->Auth->user()['id'];
        $user = $this->Users->get($id);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->data);
            if ($this->Users->save($user)) {
                $this->Flash->success(__('Usuário atualizado com sucesso.'));
                return $this->redirect(['action' => 'edit']);
            } else {
                $this->Flash->error(__('Erro ao tentar atualizar usuário. Por favor, tente novamente.'));
            }
        }
         $this->set(compact('user', 'breed', 'sexual_orientation', 'deficiency_type', 'responsible', 'states', 'cities'));
        $this->set('_serialize', ['user']);
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }

    /**
     * Login method
     *
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function login()
    {
        // pr(KEY_TOKEN);
        // pr(md5('101010'  KEY_TOKEN));
        // die();
        $this->set('title', 'Login');
        $this->viewBuilder()->layout('login_user2');
        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            if ($user) {
                // $localUser = $this->getLatitudeLongitudeByAddress($user);
                // $user['latitude'] = $localUser['latitude'];
                // $user['longitude'] = $localUser['longitude'];
                $this->Auth->setUser($user);
                if(!empty($user['address'])){
                    $event = new Event('Model.User.updateLocalUser', $this, ['user' => $user]);
                    $this->eventManager()->dispatch($event);
                }

                return $this->redirect($this->Auth->redirectUrl());
            }else{
                $this->Flash->error(__('Usuário ou senha inválido(s). Tente novamente'));
            }
      }

    }

    public function getLatitudeLongitudeByAddress($u = false){
        $user = ($u == false) ? $this->Auth->user() : $u;
        $address = $user['number_address'] . " ";
        $address .= $user['address'] . " ";
        $address .= $user['district_address'] . " ";
        $address .= $user['city_address'] . " ";
        $address .= $user['state_address'];
        $address = htmlentities(urlencode($address));

        $content_gmaps = file_get_contents("https://maps.googleapis.com/maps/api/geocode/json?address=$address&key=AIzaSyCZQoG3hICXoodL_tn1IpX3bxtgiHFUpoA");
        $latitude = json_decode($content_gmaps, false)->results['0']->geometry->location->lat;
        $longitude = json_decode($content_gmaps, false)->results['0']->geometry->location->lng;
       
        return array('latitude' => $latitude, 'longitude' => $longitude);
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

    /**
     * ForgotPassword method
     *
     * @return \Cake\Network\Response|null Redirects to index. Envia email com um token para recuperação de senha
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function forgotPassword()
    {

        $this->set('title', 'Esqueci a Senha');
        $this->viewBuilder()->layout('login_user');
    }

    /**
     * ResetPassword method
     *
     * @return \Cake\Network\Response|null Redirects to index. Altera a senha
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function resetPassword()
    {

        $this->set('title', 'Recuperar a Senha');
        $this->viewBuilder()->layout('login_user');
    }

    /**
     * AlterPassword method
     *
     * @return \Cake\Network\Response|null Redirects to index. Altera a senha (Admin)
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function alterPassword()
    {

        $this->set('title', 'Alterar a Senha');
        $id = $this->Auth->user()['id'];

        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {

            if($this->request->data['password'] != $this->request->data['confirm_password']){
                $this->Flash->error(__('Campo Senha e Confirmação são diferentes.'));

            }else{
                $user = $this->Users->patchEntity($user, $this->request->data);
                if ($this->Users->save($user)) {
                    $this->Flash->success(__('Senha alterada com sucesso.'));
                    return $this->redirect(['action' => 'alterPassword']);
                } else {
                    $this->Flash->error(__('The user could not be saved. Please, try again.'));
                }

            }
        }
        $this->set(compact('user'));
    }


    /**
     * return_cities_state method
     *
     * @return Cities from specific state
     */
    public function return_cities_state(){
        $this->autoRender = false;

        if($this->request->is('post')){
            $cities = $this->return_cities($this->request->data['state']);
            // pr($cities);
            echo json_encode($cities);
            die;
        }
    }

}
