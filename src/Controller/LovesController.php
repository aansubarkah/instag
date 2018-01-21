<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Loves Controller
 *
 * @property \App\Model\Table\LovesTable $Loves
 *
 * @method \App\Model\Entity\Love[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class LovesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Accounts', 'Users', 'Posts', 'Targets', 'Locations', 'Comments']
        ];
        $loves = $this->paginate($this->Loves);

        $this->set(compact('loves'));
    }

    /**
     * View method
     *
     * @param string|null $id Love id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $love = $this->Loves->get($id, [
            'contain' => ['Accounts', 'Users', 'Posts', 'Targets', 'Locations', 'Comments']
        ]);

        $this->set('love', $love);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $love = $this->Loves->newEntity();
        if ($this->request->is('post')) {
            $love = $this->Loves->patchEntity($love, $this->request->getData());
            if ($this->Loves->save($love)) {
                $this->Flash->success(__('The love has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The love could not be saved. Please, try again.'));
        }
        $accounts = $this->Loves->Accounts->find('list', ['limit' => 200]);
        $users = $this->Loves->Users->find('list', ['limit' => 200]);
        $posts = $this->Loves->Posts->find('list', ['limit' => 200]);
        $targets = $this->Loves->Targets->find('list', ['limit' => 200]);
        $locations = $this->Loves->Locations->find('list', ['limit' => 200]);
        $comments = $this->Loves->Comments->find('list', ['limit' => 200]);
        $this->set(compact('love', 'accounts', 'users', 'posts', 'targets', 'locations', 'comments'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Love id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $love = $this->Loves->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $love = $this->Loves->patchEntity($love, $this->request->getData());
            if ($this->Loves->save($love)) {
                $this->Flash->success(__('The love has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The love could not be saved. Please, try again.'));
        }
        $accounts = $this->Loves->Accounts->find('list', ['limit' => 200]);
        $users = $this->Loves->Users->find('list', ['limit' => 200]);
        $posts = $this->Loves->Posts->find('list', ['limit' => 200]);
        $targets = $this->Loves->Targets->find('list', ['limit' => 200]);
        $locations = $this->Loves->Locations->find('list', ['limit' => 200]);
        $comments = $this->Loves->Comments->find('list', ['limit' => 200]);
        $this->set(compact('love', 'accounts', 'users', 'posts', 'targets', 'locations', 'comments'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Love id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $love = $this->Loves->get($id);
        if ($this->Loves->delete($love)) {
            $this->Flash->success(__('The love has been deleted.'));
        } else {
            $this->Flash->error(__('The love could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
