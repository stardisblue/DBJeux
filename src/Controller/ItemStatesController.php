<?php
namespace App\Controller;

/**
 * ItemStates Controller
 *
 * @property \App\Model\Table\ItemStatesTable $ItemStates
 */
class ItemStatesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $itemStates = $this->paginate($this->ItemStates);

        $this->set(compact('itemStates'));
        $this->set('_serialize', ['itemStates']);
    }

    /**
     * View method
     *
     * @param string|null $id Item State id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $itemState = $this->ItemStates->get($id, [
            'contain' => ['Objects']
        ]);

        $this->set('itemState', $itemState);
        $this->set('_serialize', ['itemState']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $itemState = $this->ItemStates->newEntity();
        if ($this->request->is('post')) {
            $itemState = $this->ItemStates->patchEntity($itemState, $this->request->data);
            if ($this->ItemStates->save($itemState)) {
                $this->Flash->success(__('The item state has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The item state could not be saved. Please, try again.'));
        }
        $this->set(compact('itemState'));
        $this->set('_serialize', ['itemState']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Item State id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $itemState = $this->ItemStates->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $itemState = $this->ItemStates->patchEntity($itemState, $this->request->data);
            if ($this->ItemStates->save($itemState)) {
                $this->Flash->success(__('The item state has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The item state could not be saved. Please, try again.'));
        }
        $this->set(compact('itemState'));
        $this->set('_serialize', ['itemState']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Item State id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $itemState = $this->ItemStates->get($id);
        if ($this->ItemStates->delete($itemState)) {
            $this->Flash->success(__('The item state has been deleted.'));
        } else {
            $this->Flash->error(__('The item state could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
