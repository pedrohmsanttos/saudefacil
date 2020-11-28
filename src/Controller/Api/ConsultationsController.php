<?php
namespace App\Controller\Api;

use App\Controller\Api\AppController;
use Cake\Event\Event;
use Cake\I18n\Time;
use Cake\I18n\Date;
use Cake\Routing\Router; 

/**
 * Users Controller
 *
 * @property \App\Model\Table\UserTable $Users
 */
class ConsultationsController extends AppController
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

    public function getConsultations(){
        
        $this->autoRender = false;
        
        if ($this->request->is(['patch', 'post', 'put'])) {
            
            $user_id = (isset($this->request->data['user_id'])) ? $this->request->data['user_id'] : "";
            $id = (isset($this->request->data['id'])) ? $this->request->data['id'] : "";

            $conditions = [];

            if(isset($id) && !empty($id)){
              $conditions = ['Consultations.id' => $id];
            }else if(isset($user_id) && !empty($user_id)){
              $conditions = ['Consultations.user_id' => $user_id];
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
                "Districts.name"
              ])
                ->where($conditions)
                ->leftJoinWith('Units')
                ->leftJoinWith('Districts')
                ->leftJoinWith('Specialties')
                ->leftJoinWith('StatusConsultations')
                ->order(['Consultations.day'])
                ->autoFields(true);

              $consultations = $query->toArray();
              // $consultations = $query;
              // var_dump($consultations);die;
          
          foreach ($consultations as $consultation) {
              $consultation->day      = $consultation->day->i18nFormat('dd/MM/YYYY');
              $consultation->created  = $consultation->created->i18nFormat('dd/MM/YYYY');
              $consultation->modified = $consultation->modified->i18nFormat('dd/MM/YYYY');
            }
            
        }
        $this->response->type('json');
        $this->response->body(json_encode($consultations));
        return $this->response;
    }


    public function getConsultationsByDoctor(){
        
      $this->autoRender = false;
      $this->loadModel('Consultations');

      $conditions = [];


      if($this->request->is('post')){
          $id = $this->request->data['doctor_id'];    
      }

      

      if(!empty($this->request->data['start']) && !empty($this->request->data['end'])){
          $start  = $this->request->data['start'];
          $end    = $this->request->data['end'];
          
      }else{
        $start = $end = date("Y-m-d");
      }

      if(isset($id) && !empty($id)){
          $conditions = [
            'Consultations.doctor_id' => $id, 
            'StatusConsultations.id'  => STATUS_APROVADA,
            'Consultations.day >= '   => $start,
            'Consultations.day <= '   => $end
          ];
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

        $return = array();
        foreach ($consultations as $consultation) {
          $item = [];
          $item['title'] = $consultation->_matchingData['Users']['name'];
          $item['start'] = $consultation->day->format('Y-m-d') . "T" . $consultation->hour . ":00";
          $item['url'] = Router::url('/', true) . "doctor/visualizar/" . $consultation->id;
          $return[] = $item;
          
        }

        // pr($return);die;
      $this->response->type('json');
      $this->response->body(json_encode($return));
      return $this->response;
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {     
        $this->autoRender = false;
        $returnData = array();
        $consultation = $this->Consultations->newEntity();
        
        if ($this->request->is('post')) {
          // pr($this->request->data);die;
            $consultation = $this->Consultations->patchEntity($consultation, $this->request->data);
            
            if ($this->Consultations->save($consultation)) {
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
      ->toArray();

      $this->response->type('json');
      $this->response->body(json_encode($specialties));
      return $this->response;
    }

    
}
