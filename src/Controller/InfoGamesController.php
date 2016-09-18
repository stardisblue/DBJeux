<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * InfoGames Controller
 *
 * @property \App\Model\Table\InfoGamesTable $InfoGames
 */
class InfoGamesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $infoGames = $this->paginate($this->InfoGames);

        $this->set(compact('infoGames'));
        $this->set('_serialize', ['infoGames']);
    }

    /**
     * View method
     *
     * @param string|null $id Info Game id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $infoGame = $this->InfoGames->get($id, [
            'contain' => ['Games']
        ]);

        $this->set('infoGame', $infoGame);
        $this->set('_serialize', ['infoGame']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $infoGame = $this->InfoGames->newEntity();
        if ($this->request->is('post')) {
            $infoGame = $this->InfoGames->patchEntity($infoGame, $this->request->data);
            if ($this->InfoGames->save($infoGame)) {
                $this->Flash->success(__('The info game has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The info game could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('infoGame'));
        $this->set('_serialize', ['infoGame']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Info Game id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $infoGame = $this->InfoGames->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $infoGame = $this->InfoGames->patchEntity($infoGame, $this->request->data);
            if ($this->InfoGames->save($infoGame)) {
                $this->Flash->success(__('The info game has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The info game could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('infoGame'));
        $this->set('_serialize', ['infoGame']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Info Game id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $infoGame = $this->InfoGames->get($id);
        if ($this->InfoGames->delete($infoGame)) {
            $this->Flash->success(__('The info game has been deleted.'));
        } else {
            $this->Flash->error(__('The info game could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
