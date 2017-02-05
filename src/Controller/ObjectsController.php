<?php
namespace App\Controller;

/**
 * Objects Controller
 *
 * @property \App\Model\Table\ObjectsTable $Objects
 */
class ObjectsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['InfoObjects', 'ItemStates']
        ];
        $objects = $this->paginate($this->Objects);

        $this->set(compact('objects'));
        $this->set('_serialize', ['objects']);
    }

    /**
     * View method
     *
     * @param string|null $id Object id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $object = $this->Objects->get($id, [
            'contain' => ['InfoObjects', 'ItemStates', 'Users']
        ]);

        $this->set('object', $object);
        $this->set('_serialize', ['object']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $object = $this->Objects->newEntity();
        if ($this->request->is('post')) {
            $object = $this->Objects->patchEntity($object, $this->request->data);
            if ($this->Objects->save($object)) {
                $this->Flash->success(__('The object has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The object could not be saved. Please, try again.'));
        }
        $infoObjects = $this->Objects->InfoObjects->find('list', ['limit' => 200]);
        $itemStates = $this->Objects->ItemStates->find('list', ['limit' => 200]);
        $users = $this->Objects->Users->find('list', ['limit' => 200]);
        $this->set(compact('object', 'infoObjects', 'itemStates', 'users'));
        $this->set('_serialize', ['object']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Object id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $object = $this->Objects->get($id, [
            'contain' => ['Users']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $object = $this->Objects->patchEntity($object, $this->request->data);
            if ($this->Objects->save($object)) {
                $this->Flash->success(__('The object has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The object could not be saved. Please, try again.'));
        }
        $infoObjects = $this->Objects->InfoObjects->find('list', ['limit' => 200]);
        $itemStates = $this->Objects->ItemStates->find('list', ['limit' => 200]);
        $users = $this->Objects->Users->find('list', ['limit' => 200]);
        $this->set(compact('object', 'infoObjects', 'itemStates', 'users'));
        $this->set('_serialize', ['object']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Object id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $object = $this->Objects->get($id);
        if ($this->Objects->delete($object)) {
            $this->Flash->success(__('The object has been deleted.'));
        } else {
            $this->Flash->error(__('The object could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
