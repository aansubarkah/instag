<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Targets Controller
 *
 * @property \App\Model\Table\TargetsTable $Targets
 *
 * @method \App\Model\Entity\Target[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TargetsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users']
        ];
        $targets = $this->paginate($this->Targets);

        $this->set(compact('targets'));
    }

    /**
     * View method
     *
     * @param string|null $id Target id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $target = $this->Targets->get($id, [
            'contain' => ['Users', 'Fans', 'Followers', 'Hates', 'Henchmans', 'Loves', 'Messages']
        ]);

        $this->set('target', $target);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $target = $this->Targets->newEntity();
        if ($this->request->is('post')) {
            $target = $this->Targets->patchEntity($target, $this->request->getData());
            if ($this->Targets->save($target)) {
                $this->Flash->success(__('The target has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The target could not be saved. Please, try again.'));
        }
        $users = $this->Targets->Users->find('list', ['limit' => 200]);
        $this->set(compact('target', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Target id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $target = $this->Targets->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $target = $this->Targets->patchEntity($target, $this->request->getData());
            if ($this->Targets->save($target)) {
                $this->Flash->success(__('The target has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The target could not be saved. Please, try again.'));
        }
        $users = $this->Targets->Users->find('list', ['limit' => 200]);
        $this->set(compact('target', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Target id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $target = $this->Targets->get($id);
        if ($this->Targets->delete($target)) {
            $this->Flash->success(__('The target has been deleted.'));
        } else {
            $this->Flash->error(__('The target could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
