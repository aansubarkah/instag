<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Hashtags Controller
 *
 * @property \App\Model\Table\HashtagsTable $Hashtags
 *
 * @method \App\Model\Entity\Hashtag[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class HashtagsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $hashtags = $this->paginate($this->Hashtags);

        $this->set(compact('hashtags'));
    }

    /**
     * View method
     *
     * @param string|null $id Hashtag id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $hashtag = $this->Hashtags->get($id, [
            'contain' => ['Hashtaglists']
        ]);

        $this->set('hashtag', $hashtag);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $hashtag = $this->Hashtags->newEntity();
        if ($this->request->is('post')) {
            $hashtag = $this->Hashtags->patchEntity($hashtag, $this->request->getData());
            if ($this->Hashtags->save($hashtag)) {
                $this->Flash->success(__('The hashtag has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The hashtag could not be saved. Please, try again.'));
        }
        $this->set(compact('hashtag'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Hashtag id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $hashtag = $this->Hashtags->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $hashtag = $this->Hashtags->patchEntity($hashtag, $this->request->getData());
            if ($this->Hashtags->save($hashtag)) {
                $this->Flash->success(__('The hashtag has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The hashtag could not be saved. Please, try again.'));
        }
        $this->set(compact('hashtag'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Hashtag id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $hashtag = $this->Hashtags->get($id);
        if ($this->Hashtags->delete($hashtag)) {
            $this->Flash->success(__('The hashtag has been deleted.'));
        } else {
            $this->Flash->error(__('The hashtag could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
