<?php

namespace App\Controller;

use Cake\I18n\Time;
use Cake\ORM\Query;

/**
 * ItemsUsers Controller
 *
 * @property \App\Model\Table\ItemsUsersTable $ItemsUsers
 */
class ItemsUsersController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Items' => ['InfoItems.ItemTypes', 'Owner', 'ItemStates'], 'Users', 'BorrowedStatus']
        ];
        $itemsUsers = $this->paginate($this->ItemsUsers);

        $this->set(compact('itemsUsers'));
        $this->set('_serialize', ['itemsUsers']);
    }

    /**
     * View method
     *
     * @param string|null $id Items User id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $itemsUser = $this->ItemsUsers->get($id, [
            'contain' => ['Items' => ['InfoItems.ItemTypes', 'Owner', 'ItemStates'], 'Users', 'BorrowedStatus']
        ]);

        $this->set('itemsUser', $itemsUser);
        $this->set('_serialize', ['itemsUser']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $itemsUser = $this->ItemsUsers->newEntity();
        if ($this->request->is('post')) {
            $itemsUser = $this->ItemsUsers->patchEntity($itemsUser, $this->request->data);
            debug($itemsUser);
            if ($this->ItemsUsers->save($itemsUser)) {
                $this->Flash->success(__('The items user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The items user could not be saved. Please, try again.'));
        }

        $items = $this->ItemsUsers->Items->find('list', ['limit' => 200, 'contain' => ['InfoItems.ItemTypes', 'Owner', 'ItemsUsers' => function (Query $q) {
            return $q->select('id')
                ->where(['ItemsUsers.date_begin <' => Time::now()])
                ->orWhere(['ItemsUsers.date_end >' => Time::now()])
                ->andWhere(['ItemsUsers.borrowed_status_id' => 1]);
        }]])->where('ItemsUsers.id IS NULL');

        $users = $this->ItemsUsers->Users->find('list', ['limit' => 200]);
        $borrowedStatus = $this->ItemsUsers->BorrowedStatus->find('list', ['limit' => 200]);
        $this->set(compact('itemsUser', 'items', 'users', 'borrowedStatus'));
        $this->set('_serialize', ['itemsUser']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Items User id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public
    function edit($id = null)
    {
        $itemsUser = $this->ItemsUsers->get($id, [
            'contain' => ['Items' => ['InfoItems.ItemTypes', 'Owner', 'ItemStates'], 'Users']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $itemsUser = $this->ItemsUsers->patchEntity($itemsUser, $this->request->data);
            if ($this->ItemsUsers->save($itemsUser)) {
                $this->Flash->success(__('The items user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The items user could not be saved. Please, try again.'));
        }
        $borrowedStatus = $this->ItemsUsers->BorrowedStatus->find('list', ['limit' => 200]);
        $this->set(compact('itemsUser', 'borrowedStatus'));
        $this->set('_serialize', ['itemsUser']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Items User id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public
    function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $itemsUser = $this->ItemsUsers->get($id);
        if ($this->ItemsUsers->delete($itemsUser)) {
            $this->Flash->success(__('The items user has been deleted.'));
        } else {
            $this->Flash->error(__('The items user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
