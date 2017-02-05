<?php
namespace App\Controller;

/**
 * BorrowedStatus Controller
 *
 * @property \App\Model\Table\BorrowedStatusTable $BorrowedStatus
 */
class BorrowedStatusController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $borrowedStatus = $this->paginate($this->BorrowedStatus);

        $this->set(compact('borrowedStatus'));
        $this->set('_serialize', ['borrowedStatus']);
    }

    /**
     * View method
     *
     * @param string|null $id Borrowed Status id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $borrowedStatus = $this->BorrowedStatus->get($id, [
            'contain' => ['ObjectsUsers']
        ]);

        $this->set('borrowedStatus', $borrowedStatus);
        $this->set('_serialize', ['borrowedStatus']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $borrowedStatus = $this->BorrowedStatus->newEntity();
        if ($this->request->is('post')) {
            $borrowedStatus = $this->BorrowedStatus->patchEntity($borrowedStatus, $this->request->data);
            if ($this->BorrowedStatus->save($borrowedStatus)) {
                $this->Flash->success(__('The borrowed status has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The borrowed status could not be saved. Please, try again.'));
        }
        $this->set(compact('borrowedStatus'));
        $this->set('_serialize', ['borrowedStatus']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Borrowed Status id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $borrowedStatus = $this->BorrowedStatus->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $borrowedStatus = $this->BorrowedStatus->patchEntity($borrowedStatus, $this->request->data);
            if ($this->BorrowedStatus->save($borrowedStatus)) {
                $this->Flash->success(__('The borrowed status has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The borrowed status could not be saved. Please, try again.'));
        }
        $this->set(compact('borrowedStatus'));
        $this->set('_serialize', ['borrowedStatus']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Borrowed Status id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $borrowedStatus = $this->BorrowedStatus->get($id);
        if ($this->BorrowedStatus->delete($borrowedStatus)) {
            $this->Flash->success(__('The borrowed status has been deleted.'));
        } else {
            $this->Flash->error(__('The borrowed status could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
