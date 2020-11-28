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
class ConsultationsController extends AppController
{

     public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        // $this->Auth->allow(['logout', 'login', 'getConsultations']);
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
        $this->set('title', 'Consulta');
        $consultation = $this->Consultations->get($id, [
            'contain' => ['Specialties', 'Users', 'Units']
        ]);

        $this->set('consultation', $consultation);
        $this->set('_serialize', ['consultation']);
    }

    
    
}
