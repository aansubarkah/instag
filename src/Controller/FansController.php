<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Fans Controller
 *
 * @property \App\Model\Table\FansTable $Fans
 *
 * @method \App\Model\Entity\Fan[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class FansController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Targets', 'Accountlists', 'Idols', 'Projects']
        ];
        $fans = $this->paginate($this->Fans);

        $this->set(compact('fans'));
    }

    /**
     * View method
     *
     * @param string|null $id Fan id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $fan = $this->Fans->get($id, [
            'contain' => ['Targets', 'Accountlists', 'Idols', 'Projects']
        ]);

        $this->set('fan', $fan);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $fan = $this->Fans->newEntity();
        if ($this->request->is('post')) {
            $fan = $this->Fans->patchEntity($fan, $this->request->getData());
            if ($this->Fans->save($fan)) {
                $this->Flash->success(__('The fan has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The fan could not be saved. Please, try again.'));
        }
        $targets = $this->Fans->Targets->find('list', ['limit' => 200]);
        $accountlists = $this->Fans->Accountlists->find('list', ['limit' => 200]);
        $idols = $this->Fans->Idols->find('list', ['limit' => 200]);
        $projects = $this->Fans->Projects->find('list', ['limit' => 200]);
        $this->set(compact('fan', 'targets', 'accountlists', 'idols', 'projects'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Fan id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $fan = $this->Fans->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $fan = $this->Fans->patchEntity($fan, $this->request->getData());
            if ($this->Fans->save($fan)) {
                $this->Flash->success(__('The fan has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The fan could not be saved. Please, try again.'));
        }
        $targets = $this->Fans->Targets->find('list', ['limit' => 200]);
        $accountlists = $this->Fans->Accountlists->find('list', ['limit' => 200]);
        $idols = $this->Fans->Idols->find('list', ['limit' => 200]);
        $projects = $this->Fans->Projects->find('list', ['limit' => 200]);
        $this->set(compact('fan', 'targets', 'accountlists', 'idols', 'projects'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Fan id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $fan = $this->Fans->get($id);
        if ($this->Fans->delete($fan)) {
            $this->Flash->success(__('The fan has been deleted.'));
        } else {
            $this->Flash->error(__('The fan could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
