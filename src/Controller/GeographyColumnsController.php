<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * GeographyColumns Controller
 *
 * @property \App\Model\Table\GeographyColumnsTable $GeographyColumns
 *
 * @method \App\Model\Entity\GeographyColumn[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class GeographyColumnsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $geographyColumns = $this->paginate($this->GeographyColumns);

        $this->set(compact('geographyColumns'));
    }

    /**
     * View method
     *
     * @param string|null $id Geography Column id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $geographyColumn = $this->GeographyColumns->get($id, [
            'contain' => []
        ]);

        $this->set('geographyColumn', $geographyColumn);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $geographyColumn = $this->GeographyColumns->newEntity();
        if ($this->request->is('post')) {
            $geographyColumn = $this->GeographyColumns->patchEntity($geographyColumn, $this->request->getData());
            if ($this->GeographyColumns->save($geographyColumn)) {
                $this->Flash->success(__('The geography column has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The geography column could not be saved. Please, try again.'));
        }
        $this->set(compact('geographyColumn'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Geography Column id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $geographyColumn = $this->GeographyColumns->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $geographyColumn = $this->GeographyColumns->patchEntity($geographyColumn, $this->request->getData());
            if ($this->GeographyColumns->save($geographyColumn)) {
                $this->Flash->success(__('The geography column has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The geography column could not be saved. Please, try again.'));
        }
        $this->set(compact('geographyColumn'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Geography Column id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $geographyColumn = $this->GeographyColumns->get($id);
        if ($this->GeographyColumns->delete($geographyColumn)) {
            $this->Flash->success(__('The geography column has been deleted.'));
        } else {
            $this->Flash->error(__('The geography column could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
