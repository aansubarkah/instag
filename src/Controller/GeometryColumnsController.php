<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * GeometryColumns Controller
 *
 * @property \App\Model\Table\GeometryColumnsTable $GeometryColumns
 *
 * @method \App\Model\Entity\GeometryColumn[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class GeometryColumnsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $geometryColumns = $this->paginate($this->GeometryColumns);

        $this->set(compact('geometryColumns'));
    }

    /**
     * View method
     *
     * @param string|null $id Geometry Column id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $geometryColumn = $this->GeometryColumns->get($id, [
            'contain' => []
        ]);

        $this->set('geometryColumn', $geometryColumn);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $geometryColumn = $this->GeometryColumns->newEntity();
        if ($this->request->is('post')) {
            $geometryColumn = $this->GeometryColumns->patchEntity($geometryColumn, $this->request->getData());
            if ($this->GeometryColumns->save($geometryColumn)) {
                $this->Flash->success(__('The geometry column has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The geometry column could not be saved. Please, try again.'));
        }
        $this->set(compact('geometryColumn'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Geometry Column id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $geometryColumn = $this->GeometryColumns->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $geometryColumn = $this->GeometryColumns->patchEntity($geometryColumn, $this->request->getData());
            if ($this->GeometryColumns->save($geometryColumn)) {
                $this->Flash->success(__('The geometry column has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The geometry column could not be saved. Please, try again.'));
        }
        $this->set(compact('geometryColumn'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Geometry Column id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $geometryColumn = $this->GeometryColumns->get($id);
        if ($this->GeometryColumns->delete($geometryColumn)) {
            $this->Flash->success(__('The geometry column has been deleted.'));
        } else {
            $this->Flash->error(__('The geometry column could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
