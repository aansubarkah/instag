<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Vassals Controller
 *
 * @property \App\Model\Table\VassalsTable $Vassals
 *
 * @method \App\Model\Entity\Vassal[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class VassalsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Accounts', 'Accountlists']
        ];
        $vassals = $this->paginate($this->Vassals);

        $this->set(compact('vassals'));
    }

    /**
     * View method
     *
     * @param string|null $id Vassal id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $vassal = $this->Vassals->get($id, [
            'contain' => ['Accounts', 'Accountlists']
        ]);

        $this->set('vassal', $vassal);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $vassal = $this->Vassals->newEntity();
        if ($this->request->is('post')) {
            $vassal = $this->Vassals->patchEntity($vassal, $this->request->getData());
            if ($this->Vassals->save($vassal)) {
                $this->Flash->success(__('The vassal has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The vassal could not be saved. Please, try again.'));
        }
        $accounts = $this->Vassals->Accounts->find('list', ['limit' => 200]);
        $accountlists = $this->Vassals->Accountlists->find('list', ['limit' => 200]);
        $this->set(compact('vassal', 'accounts', 'accountlists'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Vassal id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $vassal = $this->Vassals->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $vassal = $this->Vassals->patchEntity($vassal, $this->request->getData());
            if ($this->Vassals->save($vassal)) {
                $this->Flash->success(__('The vassal has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The vassal could not be saved. Please, try again.'));
        }
        $accounts = $this->Vassals->Accounts->find('list', ['limit' => 200]);
        $accountlists = $this->Vassals->Accountlists->find('list', ['limit' => 200]);
        $this->set(compact('vassal', 'accounts', 'accountlists'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Vassal id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $vassal = $this->Vassals->get($id);
        if ($this->Vassals->delete($vassal)) {
            $this->Flash->success(__('The vassal has been deleted.'));
        } else {
            $this->Flash->error(__('The vassal could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
