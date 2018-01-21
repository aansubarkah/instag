<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Hashtaglists Controller
 *
 * @property \App\Model\Table\HashtaglistsTable $Hashtaglists
 *
 * @method \App\Model\Entity\Hashtaglist[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class HashtaglistsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Hashtags', 'Projects']
        ];
        $hashtaglists = $this->paginate($this->Hashtaglists);

        $this->set(compact('hashtaglists'));
    }

    /**
     * View method
     *
     * @param string|null $id Hashtaglist id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $hashtaglist = $this->Hashtaglists->get($id, [
            'contain' => ['Hashtags', 'Projects']
        ]);

        $this->set('hashtaglist', $hashtaglist);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $hashtaglist = $this->Hashtaglists->newEntity();
        if ($this->request->is('post')) {
            $hashtaglist = $this->Hashtaglists->patchEntity($hashtaglist, $this->request->getData());
            if ($this->Hashtaglists->save($hashtaglist)) {
                $this->Flash->success(__('The hashtaglist has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The hashtaglist could not be saved. Please, try again.'));
        }
        $hashtags = $this->Hashtaglists->Hashtags->find('list', ['limit' => 200]);
        $projects = $this->Hashtaglists->Projects->find('list', ['limit' => 200]);
        $this->set(compact('hashtaglist', 'hashtags', 'projects'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Hashtaglist id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $hashtaglist = $this->Hashtaglists->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $hashtaglist = $this->Hashtaglists->patchEntity($hashtaglist, $this->request->getData());
            if ($this->Hashtaglists->save($hashtaglist)) {
                $this->Flash->success(__('The hashtaglist has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The hashtaglist could not be saved. Please, try again.'));
        }
        $hashtags = $this->Hashtaglists->Hashtags->find('list', ['limit' => 200]);
        $projects = $this->Hashtaglists->Projects->find('list', ['limit' => 200]);
        $this->set(compact('hashtaglist', 'hashtags', 'projects'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Hashtaglist id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $hashtaglist = $this->Hashtaglists->get($id);
        if ($this->Hashtaglists->delete($hashtaglist)) {
            $this->Flash->success(__('The hashtaglist has been deleted.'));
        } else {
            $this->Flash->error(__('The hashtaglist could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
