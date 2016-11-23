<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * ObjectsUsers Controller
 *
 * @property \App\Model\Table\ObjectsUsersTable $ObjectsUsers
 */
class ObjectsUsersController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Objects', 'Users', 'BorrowedStatus']
        ];
        $objectsUsers = $this->paginate($this->ObjectsUsers);

        $this->set(compact('objectsUsers'));
        $this->set('_serialize', ['objectsUsers']);
    }

    /**
     * View method
     *
     * @param string|null $id Objects User id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $objectsUser = $this->ObjectsUsers->get($id, [
            'contain' => ['Objects', 'Users', 'BorrowedStatus']
        ]);

        $this->set('objectsUser', $objectsUser);
        $this->set('_serialize', ['objectsUser']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $objectsUser = $this->ObjectsUsers->newEntity();
        if ($this->request->is('post')) {
            $objectsUser = $this->ObjectsUsers->patchEntity($objectsUser, $this->request->data);
            if ($this->ObjectsUsers->save($objectsUser)) {
                $this->Flash->success(__('The objects user has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The objects user could not be saved. Please, try again.'));
            }
        }
        $objects = $this->ObjectsUsers->Objects->find('list', ['limit' => 200]);
        $users = $this->ObjectsUsers->Users->find('list', ['limit' => 200]);
        $borrowedStatus = $this->ObjectsUsers->BorrowedStatus->find('list', ['limit' => 200]);
        $this->set(compact('objectsUser', 'objects', 'users', 'borrowedStatus'));
        $this->set('_serialize', ['objectsUser']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Objects User id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $objectsUser = $this->ObjectsUsers->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $objectsUser = $this->ObjectsUsers->patchEntity($objectsUser, $this->request->data);
            if ($this->ObjectsUsers->save($objectsUser)) {
                $this->Flash->success(__('The objects user has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The objects user could not be saved. Please, try again.'));
            }
        }
        $objects = $this->ObjectsUsers->Objects->find('list', ['limit' => 200]);
        $users = $this->ObjectsUsers->Users->find('list', ['limit' => 200]);
        $borrowedStatus = $this->ObjectsUsers->BorrowedStatus->find('list', ['limit' => 200]);
        $this->set(compact('objectsUser', 'objects', 'users', 'borrowedStatus'));
        $this->set('_serialize', ['objectsUser']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Objects User id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $objectsUser = $this->ObjectsUsers->get($id);
        if ($this->ObjectsUsers->delete($objectsUser)) {
            $this->Flash->success(__('The objects user has been deleted.'));
        } else {
            $this->Flash->error(__('The objects user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
