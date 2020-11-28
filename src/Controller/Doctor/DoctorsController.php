<?php
namespace App\Controller\Doctor;

use App\Controller\Doctor\AppController;
// use App\Controller\AppController;
use Cake\Event\Event;

/**
 * Admins Controller
 *
 * @property \App\Model\Table\AdminsTable $Admins
 */
class DoctorsController extends AppController
{

     public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        $this->Auth->allow(['logout', 'login', 'getConsultations']);
    }
    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->set('title', 'Minha Agenda');
        // $admins = $this->paginate($this->Admins);
        //
        // $this->set(compact('admins'));
        // $this->set('_serialize', ['admins']);
        // die('chamou login');
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
        // $this->set('title', 'Cadastrar Usuários');
        // $this->set('role', $this->role);
        //
        // $admin = $this->Admins->newEntity();
        // if ($this->request->is('post')) {
        //     $admin = $this->Admins->patchEntity($admin, $this->request->data);
        //     if ($this->Admins->save($admin)) {
        //         $this->Flash->success(__('Usuário cadastrado com sucesso.'));
        //         return $this->redirect(['action' => 'index']);
        //     } else {
        //         $this->Flash->error(__('Usuário não cadastrado. Por favor, tente novamente.'));
        //     }
        // }
        // $this->set(compact('admin'));
        // $this->set('_serialize', ['admin']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Admin id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {

        $this->set('title', 'Meus Dados');

        $id = $this->Auth->user()['id'];
        $doctor = $this->Doctors->get($id);

        $this->loadModel('Units');
        $units = $this->Units->find('list', ['limit' => 200])->toArray();

        // pr($doctor);die;

        if ($this->request->is(['patch', 'post', 'put'])) {
            $doctor = $this->Doctors->patchEntity($doctor, $this->request->data);
            if ($this->Doctors->save($doctor)) {
                $this->Flash->success(__('Dados atualizados com sucesso.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('Erro ao atualizar os dados. Tente novamente.'));
            }
        }
        $this->set(compact('doctor', 'units'));
        $this->set('_serialize', ['doctor']);
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

    /**
     * Login method
     *
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function login()
    {

        $this->set('title', 'Login - MÉDICO');
        $this->viewBuilder()->layout('login_user');
        if ($this->request->is('post')) {
        // pr($this->request->data);die;
            $user = $this->Auth->identify();
            if ($user) {
                $this->Auth->setUser($user);
                return $this->redirect($this->Auth->redirectUrl());
            }else{
                $this->Flash->error(__('Usuário ou senha inválido. Tente novamente'));
            }
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

    public function alterPassword()
    {

        $this->set('title', 'Alterar a Senha');
        $id = $this->Auth->user()['id'];

        $doctor = $this->Doctors->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {

            if($this->request->data['password'] != $this->request->data['confirm_password']){
                $this->Flash->error(__('Campo Senha e Confirmação são diferentes.'));

            }else{
                $doctor = $this->Doctors->patchEntity($doctor, $this->request->data);
                if ($this->Doctors->save($doctor)) {
                    $this->Flash->success(__('Senha alterada com sucesso.'));
                    return $this->redirect(['action' => 'alterPassword']);
                } else {
                    $this->Flash->error(__('The user could not be saved. Please, try again.'));
                }

            }
        }
        $this->set(compact('doctor'));
    }

    public function getConsultations(){
        $this->autoRender = false;
        $this->loadModel('Consultations');

        $conditions = [];


        if($this->request->is('post')){
            $id = $this->request->data['doctor_id'];    
        }else{
            $id = $this->Auth->user()['id'];
        }

        if(isset($id) && !empty($id)){
            $conditions = ['Consultations.doctor_id' => $id];
        }

        $this->loadModel('Consultations');

        $query = $this->Consultations->find();
        $query->select([
            "Units.id", 
            "Units.name", 
            "Units.address", 
            "Units.phone", 
            "StatusConsultations.name", 
            "Specialties.name",
            "Districts.name",
            "Users.name"
          ])
            ->where($conditions)
            ->leftJoinWith('Units')
            ->leftJoinWith('Districts')
            ->leftJoinWith('Specialties')
            ->leftJoinWith('StatusConsultations')
            ->leftJoinWith('Users')
            ->order(['Consultations.day'])
            ->autoFields(true);

          $consultations = $query->toArray();

        $this->response->type('json');
        $this->response->body(json_encode($consultations));
        return $this->response;
    }
}
