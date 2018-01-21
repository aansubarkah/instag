<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Henchmans Controller
 *
 * @property \App\Model\Table\HenchmansTable $Henchmans
 *
 * @method \App\Model\Entity\Henchman[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class HenchmansController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Accounts', 'Targets']
        ];
        $henchmans = $this->paginate($this->Henchmans);

        $this->set(compact('henchmans'));
    }

    /**
     * View method
     *
     * @param string|null $id Henchman id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $henchman = $this->Henchmans->get($id, [
            'contain' => ['Accounts', 'Targets']
        ]);

        $this->set('henchman', $henchman);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $henchman = $this->Henchmans->newEntity();
        if ($this->request->is('post')) {
            $henchman = $this->Henchmans->patchEntity($henchman, $this->request->getData());
            if ($this->Henchmans->save($henchman)) {
                $this->Flash->success(__('The henchman has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The henchman could not be saved. Please, try again.'));
        }
        $accounts = $this->Henchmans->Accounts->find('list', ['limit' => 200]);
        $targets = $this->Henchmans->Targets->find('list', ['limit' => 200]);
        $this->set(compact('henchman', 'accounts', 'targets'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Henchman id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $henchman = $this->Henchmans->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $henchman = $this->Henchmans->patchEntity($henchman, $this->request->getData());
            if ($this->Henchmans->save($henchman)) {
                $this->Flash->success(__('The henchman has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The henchman could not be saved. Please, try again.'));
        }
        $accounts = $this->Henchmans->Accounts->find('list', ['limit' => 200]);
        $targets = $this->Henchmans->Targets->find('list', ['limit' => 200]);
        $this->set(compact('henchman', 'accounts', 'targets'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Henchman id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $henchman = $this->Henchmans->get($id);
        if ($this->Henchmans->delete($henchman)) {
            $this->Flash->success(__('The henchman has been deleted.'));
        } else {
            $this->Flash->error(__('The henchman could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
