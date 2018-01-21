<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Hates Controller
 *
 * @property \App\Model\Table\HatesTable $Hates
 *
 * @method \App\Model\Entity\Hate[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class HatesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Targets', 'Projects', 'Accounts', 'Users']
        ];
        $hates = $this->paginate($this->Hates);

        $this->set(compact('hates'));
    }

    /**
     * View method
     *
     * @param string|null $id Hate id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $hate = $this->Hates->get($id, [
            'contain' => ['Targets', 'Projects', 'Accounts', 'Users']
        ]);

        $this->set('hate', $hate);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $hate = $this->Hates->newEntity();
        if ($this->request->is('post')) {
            $hate = $this->Hates->patchEntity($hate, $this->request->getData());
            if ($this->Hates->save($hate)) {
                $this->Flash->success(__('The hate has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The hate could not be saved. Please, try again.'));
        }
        $targets = $this->Hates->Targets->find('list', ['limit' => 200]);
        $projects = $this->Hates->Projects->find('list', ['limit' => 200]);
        $accounts = $this->Hates->Accounts->find('list', ['limit' => 200]);
        $users = $this->Hates->Users->find('list', ['limit' => 200]);
        $this->set(compact('hate', 'targets', 'projects', 'accounts', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Hate id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $hate = $this->Hates->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $hate = $this->Hates->patchEntity($hate, $this->request->getData());
            if ($this->Hates->save($hate)) {
                $this->Flash->success(__('The hate has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The hate could not be saved. Please, try again.'));
        }
        $targets = $this->Hates->Targets->find('list', ['limit' => 200]);
        $projects = $this->Hates->Projects->find('list', ['limit' => 200]);
        $accounts = $this->Hates->Accounts->find('list', ['limit' => 200]);
        $users = $this->Hates->Users->find('list', ['limit' => 200]);
        $this->set(compact('hate', 'targets', 'projects', 'accounts', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Hate id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $hate = $this->Hates->get($id);
        if ($this->Hates->delete($hate)) {
            $this->Flash->success(__('The hate has been deleted.'));
        } else {
            $this->Flash->error(__('The hate could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
