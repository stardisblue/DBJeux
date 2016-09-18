<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * InfoBooks Controller
 *
 * @property \App\Model\Table\InfoBooksTable $InfoBooks
 */
class InfoBooksController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $infoBooks = $this->paginate($this->InfoBooks);

        $this->set(compact('infoBooks'));
        $this->set('_serialize', ['infoBooks']);
    }

    /**
     * View method
     *
     * @param string|null $id Info Book id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $infoBook = $this->InfoBooks->get($id, [
            'contain' => ['Books']
        ]);

        $this->set('infoBook', $infoBook);
        $this->set('_serialize', ['infoBook']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $infoBook = $this->InfoBooks->newEntity();
        if ($this->request->is('post')) {
            $infoBook = $this->InfoBooks->patchEntity($infoBook, $this->request->data);
            if ($this->InfoBooks->save($infoBook)) {
                $this->Flash->success(__('The info book has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The info book could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('infoBook'));
        $this->set('_serialize', ['infoBook']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Info Book id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $infoBook = $this->InfoBooks->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $infoBook = $this->InfoBooks->patchEntity($infoBook, $this->request->data);
            if ($this->InfoBooks->save($infoBook)) {
                $this->Flash->success(__('The info book has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The info book could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('infoBook'));
        $this->set('_serialize', ['infoBook']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Info Book id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $infoBook = $this->InfoBooks->get($id);
        if ($this->InfoBooks->delete($infoBook)) {
            $this->Flash->success(__('The info book has been deleted.'));
        } else {
            $this->Flash->error(__('The info book could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
