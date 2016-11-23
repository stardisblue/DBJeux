<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * ObjectTypes Controller
 *
 * @property \App\Model\Table\ObjectTypesTable $ObjectTypes
 */
class ObjectTypesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $objectTypes = $this->paginate($this->ObjectTypes);

        $this->set(compact('objectTypes'));
        $this->set('_serialize', ['objectTypes']);
    }

    /**
     * View method
     *
     * @param string|null $id Object Type id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $objectType = $this->ObjectTypes->get($id, [
            'contain' => ['InfoObjects']
        ]);

        $this->set('objectType', $objectType);
        $this->set('_serialize', ['objectType']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $objectType = $this->ObjectTypes->newEntity();
        if ($this->request->is('post')) {
            $objectType = $this->ObjectTypes->patchEntity($objectType, $this->request->data);
            if ($this->ObjectTypes->save($objectType)) {
                $this->Flash->success(__('The object type has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The object type could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('objectType'));
        $this->set('_serialize', ['objectType']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Object Type id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $objectType = $this->ObjectTypes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $objectType = $this->ObjectTypes->patchEntity($objectType, $this->request->data);
            if ($this->ObjectTypes->save($objectType)) {
                $this->Flash->success(__('The object type has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The object type could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('objectType'));
        $this->set('_serialize', ['objectType']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Object Type id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $objectType = $this->ObjectTypes->get($id);
        if ($this->ObjectTypes->delete($objectType)) {
            $this->Flash->success(__('The object type has been deleted.'));
        } else {
            $this->Flash->error(__('The object type could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
