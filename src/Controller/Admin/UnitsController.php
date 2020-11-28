<?php
namespace App\Controller\Admin;

use App\Controller\Admin\AppController;

/**
 * Units Controller
 *
 * @property \App\Model\Table\UnitsTable $Units
 */
class UnitsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->set('title', 'Unidade de Saúde');
        $this->paginate = [
            'contain' => ['Districts']
        ];
        $units = $this->paginate($this->Units);

        $this->set(compact('units'));
        $this->set('_serialize', ['units']);
    }

    /**
     * View method
     *
     * @param string|null $id Unit id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $unit = $this->Units->get($id, [
            'contain' => ['Districts']
        ]);

        $this->set('unit', $unit);
        $this->set('_serialize', ['unit']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->set('title', 'Cadastrar Unidade de Saúde');
        $unit = $this->Units->newEntity();
        if ($this->request->is('post')) {
            $unit = $this->Units->patchEntity($unit, $this->request->data);
            if ($this->Units->save($unit)) {
                $this->Flash->success(__('Unidade de Saúde cadastrada com sucesso.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('Unidade não cadastrada. Tente novamente.'));
            }
        }
        $districts = $this->Units->Districts->find('list', ['limit' => 200]);
        $specialties = $this->Units->Specialties->find('list', ['limit' => 200]);
        $rpas = $this->rpas;

        $this->set(compact('unit', 'districts','specialties','rpas'));
        $this->set('_serialize', ['unit']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Unit id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $this->set('title', 'Editar Unidade de Saúde');
        $unit = $this->Units->get($id, [
            'contain' => ['Specialties']
        ]);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $unit = $this->Units->patchEntity($unit, $this->request->data);
            if ($this->Units->save($unit)) {
                $this->Flash->success(__('Unidade de Saúde atualizada com sucesso.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('Ocorreu um problema ao atualizar a Unidade de Saúde'));
            }
        }
        $districts = $this->Units->Districts->find('list', ['limit' => 200]);
        $specialties = $this->Units->Specialties->find('list', ['limit' => 200]);
        $rpas = $this->rpas;
        $this->set(compact('unit', 'districts', 'specialties', 'rpas'));
        $this->set('_serialize', ['unit']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Unit id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $unit = $this->Units->get($id);
        if ($this->Units->delete($unit)) {
            $this->Flash->success(__('The unit has been deleted.'));
        } else {
            $this->Flash->error(__('The unit could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
