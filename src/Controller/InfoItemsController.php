<?php
namespace App\Controller;

/**
 * InfoItems Controller
 *
 * @property \App\Model\Table\InfoItemsTable $InfoItems
 */
class InfoItemsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['ItemTypes']
        ];
        $infoItems = $this->paginate($this->InfoItems);

        $this->set(compact('infoItems'));
        $this->set('_serialize', ['infoItems']);
    }

    /**
     * View method
     *
     * @param string|null $id Info Item id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        // TODO : finetune user retrieval
        $infoItem = $this->InfoItems->get($id, [
            'contain' => ['ItemTypes', 'Items']
        ]);

        $this->set('infoItem', $infoItem);
        $this->set('_serialize', ['infoItem']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $infoItem = $this->InfoItems->newEntity();
        if ($this->request->is('post')) {
            $infoItem = $this->InfoItems->patchEntity($infoItem, $this->request->data);
            if ($this->InfoItems->save($infoItem)) {
                $this->Flash->success(__('The info item has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The info item could not be saved. Please, try again.'));
        }
        $itemTypes = $this->InfoItems->ItemTypes->find('list', ['limit' => 200]);
        $this->set(compact('infoItem', 'itemTypes'));
        $this->set('_serialize', ['infoItem']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Info Item id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $infoItem = $this->InfoItems->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $infoItem = $this->InfoItems->patchEntity($infoItem, $this->request->data);
            if ($this->InfoItems->save($infoItem)) {
                $this->Flash->success(__('The info item has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The info item could not be saved. Please, try again.'));
        }
        $itemTypes = $this->InfoItems->ItemTypes->find('list', ['limit' => 200]);
        $this->set(compact('infoItem', 'itemTypes'));
        $this->set('_serialize', ['infoItem']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Info Item id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $infoItem = $this->InfoItems->get($id);
        if ($this->InfoItems->delete($infoItem)) {
            $this->Flash->success(__('The info item has been deleted.'));
        } else {
            $this->Flash->error(__('The info item could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function isAuthorized($user = null)
    {
        if ($user['role'] === 'admin') {
            return true;
        }

        return false;
    }
}
