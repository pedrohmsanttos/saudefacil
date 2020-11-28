<?php
namespace App\Controller\User;

use App\Controller\User\AppController;

/**
 * Consultations Controller
 *
 * @property \App\Model\Table\ConsultationsTable $Consultations
 */
class ConsultationsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        // pr($this->Consultations);die;
        $this->paginate = [
            'contain' => ['Specialties', 'Users', 'StatusConsultations', 'Districts']
        ];
        $consultations = $this->paginate($this->Consultations);
        $this->set('title', 'Minhas Consultas');
        $this->set(compact('consultations'));
        $this->set('_serialize', ['consultations']);
    }

    /**
     * View method
     *
     * @param string|null $id Consultation id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $consultation = $this->Consultations->get($id, [
            'contain' => ['Specialties', 'Users', 'StatusConsultations', 'Districts']
        ]);

        $this->set('consultation', $consultation);
        $this->set('_serialize', ['consultation']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $consultation = $this->Consultations->newEntity();
        $this->set('title', 'Marcar Consulta');

        if ($this->request->is('post')) {
            pr($this->request->data);die;
            $consultation = $this->Consultations->patchEntity($consultation, $this->request->data);
           
            if ($this->Consultations->save($consultation)) {
                $this->Flash->success(__('Consulta marcada com sucesso. Aguarde análise.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('Consulta não marcada. Por favor, tente novamente'));
            }
        }

        $this->loadModel('Specialties');
        $query = $this->Specialties->find('list')
                ->join(['us' =>['table' => 'units_specialties','type' => 'INNER','conditions' => 'us.specialty_id = specialties.id',]])
                ->toArray();

        

        // $specialties = $this->Consultations->Specialties->find('list', ['limit' => 200]);
        $specialties = $query;
        $users = $this->Consultations->Users->find('list', ['limit' => 200]);
        $statusConsultations = $this->Consultations->StatusConsultations->find('list', ['limit' => 200]);
        $districts = $this->Consultations->Districts->find('list', ['limit' => 200]);
        $this->set(compact('consultation', 'specialties', 'users', 'statusConsultations', 'districts'));
        $this->set('_serialize', ['consultation']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Consultation id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $consultation = $this->Consultations->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $consultation = $this->Consultations->patchEntity($consultation, $this->request->data);
            if ($this->Consultations->save($consultation)) {
                $this->Flash->success(__('The consultation has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The consultation could not be saved. Please, try again.'));
            }
        }
        $this->loadModel('Specialties');
        $query = $this->Specialties->find('list')
                ->join(['us' =>['table' => 'units_specialties','type' => 'INNER','conditions' => 'us.specialty_id = specialties.id',]])
                ->toArray();
        
        $users = $this->Consultations->Users->find('list', ['limit' => 200]);
        $statusConsultations = $this->Consultations->StatusConsultations->find('list', ['limit' => 200]);
        $districts = $this->Consultations->Districts->find('list', ['limit' => 200]);
        $this->set(compact('consultation', 'specialties', 'users', 'statusConsultations', 'districts'));
        $this->set('_serialize', ['consultation']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Consultation id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $consultation = $this->Consultations->get($id);
        if ($this->Consultations->delete($consultation)) {
            $this->Flash->success(__('The consultation has been deleted.'));
        } else {
            $this->Flash->error(__('The consultation could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
