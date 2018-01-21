<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Accountlists Controller
 *
 * @property \App\Model\Table\AccountlistsTable $Accountlists
 *
 * @method \App\Model\Entity\Accountlist[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class AccountlistsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Accounts', 'Projects']
        ];
        $accountlists = $this->paginate($this->Accountlists);

        $this->set(compact('accountlists'));
    }

    /**
     * View method
     *
     * @param string|null $id Accountlist id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $accountlist = $this->Accountlists->get($id, [
            'contain' => ['Accounts', 'Projects', 'Fans', 'Vassals']
        ]);

        $this->set('accountlist', $accountlist);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $accountlist = $this->Accountlists->newEntity();
        if ($this->request->is('post')) {
            $accountlist = $this->Accountlists->patchEntity($accountlist, $this->request->getData());
            if ($this->Accountlists->save($accountlist)) {
                $this->Flash->success(__('The accountlist has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The accountlist could not be saved. Please, try again.'));
        }
        $accounts = $this->Accountlists->Accounts->find('list', ['limit' => 200]);
        $projects = $this->Accountlists->Projects->find('list', ['limit' => 200]);
        $this->set(compact('accountlist', 'accounts', 'projects'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Accountlist id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $accountlist = $this->Accountlists->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $accountlist = $this->Accountlists->patchEntity($accountlist, $this->request->getData());
            if ($this->Accountlists->save($accountlist)) {
                $this->Flash->success(__('The accountlist has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The accountlist could not be saved. Please, try again.'));
        }
        $accounts = $this->Accountlists->Accounts->find('list', ['limit' => 200]);
        $projects = $this->Accountlists->Projects->find('list', ['limit' => 200]);
        $this->set(compact('accountlist', 'accounts', 'projects'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Accountlist id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $accountlist = $this->Accountlists->get($id);
        if ($this->Accountlists->delete($accountlist)) {
            $this->Flash->success(__('The accountlist has been deleted.'));
        } else {
            $this->Flash->error(__('The accountlist could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
