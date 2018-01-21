<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Regencies Controller
 *
 * @property \App\Model\Table\RegenciesTable $Regencies
 *
 * @method \App\Model\Entity\Regency[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class RegenciesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['States', 'Hierarchies']
        ];
        $regencies = $this->paginate($this->Regencies);

        $this->set(compact('regencies'));
    }

    /**
     * View method
     *
     * @param string|null $id Regency id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $regency = $this->Regencies->get($id, [
            'contain' => ['States', 'Hierarchies']
        ]);

        $this->set('regency', $regency);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $regency = $this->Regencies->newEntity();
        if ($this->request->is('post')) {
            $regency = $this->Regencies->patchEntity($regency, $this->request->getData());
            if ($this->Regencies->save($regency)) {
                $this->Flash->success(__('The regency has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The regency could not be saved. Please, try again.'));
        }
        $states = $this->Regencies->States->find('list', ['limit' => 200]);
        $hierarchies = $this->Regencies->Hierarchies->find('list', ['limit' => 200]);
        $this->set(compact('regency', 'states', 'hierarchies'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Regency id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $regency = $this->Regencies->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $regency = $this->Regencies->patchEntity($regency, $this->request->getData());
            if ($this->Regencies->save($regency)) {
                $this->Flash->success(__('The regency has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The regency could not be saved. Please, try again.'));
        }
        $states = $this->Regencies->States->find('list', ['limit' => 200]);
        $hierarchies = $this->Regencies->Hierarchies->find('list', ['limit' => 200]);
        $this->set(compact('regency', 'states', 'hierarchies'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Regency id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $regency = $this->Regencies->get($id);
        if ($this->Regencies->delete($regency)) {
            $this->Flash->success(__('The regency has been deleted.'));
        } else {
            $this->Flash->error(__('The regency could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
