<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * InfoObjects Controller
 *
 * @property \App\Model\Table\InfoObjectsTable $InfoObjects
 */
class InfoObjectsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['ObjectTypes']
        ];
        $infoObjects = $this->paginate($this->InfoObjects);

        $this->set(compact('infoObjects'));
        $this->set('_serialize', ['infoObjects']);
    }

    /**
     * View method
     *
     * @param string|null $id Info Object id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $infoObject = $this->InfoObjects->get($id, [
            'contain' => ['ObjectTypes', 'Objects']
        ]);

        $this->set('infoObject', $infoObject);
        $this->set('_serialize', ['infoObject']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $infoObject = $this->InfoObjects->newEntity();
        if ($this->request->is('post')) {
            $infoObject = $this->InfoObjects->patchEntity($infoObject, $this->request->data);
            if ($this->InfoObjects->save($infoObject)) {
                $this->Flash->success(__('The info object has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The info object could not be saved. Please, try again.'));
            }
        }
        $objectTypes = $this->InfoObjects->ObjectTypes->find('list', ['limit' => 200]);
        $this->set(compact('infoObject', 'objectTypes'));
        $this->set('_serialize', ['infoObject']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Info Object id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $infoObject = $this->InfoObjects->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $infoObject = $this->InfoObjects->patchEntity($infoObject, $this->request->data);
            if ($this->InfoObjects->save($infoObject)) {
                $this->Flash->success(__('The info object has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The info object could not be saved. Please, try again.'));
            }
        }
        $objectTypes = $this->InfoObjects->ObjectTypes->find('list', ['limit' => 200]);
        $this->set(compact('infoObject', 'objectTypes'));
        $this->set('_serialize', ['infoObject']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Info Object id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $infoObject = $this->InfoObjects->get($id);
        if ($this->InfoObjects->delete($infoObject)) {
            $this->Flash->success(__('The info object has been deleted.'));
        } else {
            $this->Flash->error(__('The info object could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
