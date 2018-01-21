<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * RasterColumns Controller
 *
 * @property \App\Model\Table\RasterColumnsTable $RasterColumns
 *
 * @method \App\Model\Entity\RasterColumn[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class RasterColumnsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $rasterColumns = $this->paginate($this->RasterColumns);

        $this->set(compact('rasterColumns'));
    }

    /**
     * View method
     *
     * @param string|null $id Raster Column id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $rasterColumn = $this->RasterColumns->get($id, [
            'contain' => []
        ]);

        $this->set('rasterColumn', $rasterColumn);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $rasterColumn = $this->RasterColumns->newEntity();
        if ($this->request->is('post')) {
            $rasterColumn = $this->RasterColumns->patchEntity($rasterColumn, $this->request->getData());
            if ($this->RasterColumns->save($rasterColumn)) {
                $this->Flash->success(__('The raster column has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The raster column could not be saved. Please, try again.'));
        }
        $this->set(compact('rasterColumn'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Raster Column id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $rasterColumn = $this->RasterColumns->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $rasterColumn = $this->RasterColumns->patchEntity($rasterColumn, $this->request->getData());
            if ($this->RasterColumns->save($rasterColumn)) {
                $this->Flash->success(__('The raster column has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The raster column could not be saved. Please, try again.'));
        }
        $this->set(compact('rasterColumn'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Raster Column id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $rasterColumn = $this->RasterColumns->get($id);
        if ($this->RasterColumns->delete($rasterColumn)) {
            $this->Flash->success(__('The raster column has been deleted.'));
        } else {
            $this->Flash->error(__('The raster column could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
