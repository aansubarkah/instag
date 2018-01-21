<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * RasterOverviews Controller
 *
 * @property \App\Model\Table\RasterOverviewsTable $RasterOverviews
 *
 * @method \App\Model\Entity\RasterOverview[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class RasterOverviewsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $rasterOverviews = $this->paginate($this->RasterOverviews);

        $this->set(compact('rasterOverviews'));
    }

    /**
     * View method
     *
     * @param string|null $id Raster Overview id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $rasterOverview = $this->RasterOverviews->get($id, [
            'contain' => []
        ]);

        $this->set('rasterOverview', $rasterOverview);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $rasterOverview = $this->RasterOverviews->newEntity();
        if ($this->request->is('post')) {
            $rasterOverview = $this->RasterOverviews->patchEntity($rasterOverview, $this->request->getData());
            if ($this->RasterOverviews->save($rasterOverview)) {
                $this->Flash->success(__('The raster overview has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The raster overview could not be saved. Please, try again.'));
        }
        $this->set(compact('rasterOverview'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Raster Overview id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $rasterOverview = $this->RasterOverviews->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $rasterOverview = $this->RasterOverviews->patchEntity($rasterOverview, $this->request->getData());
            if ($this->RasterOverviews->save($rasterOverview)) {
                $this->Flash->success(__('The raster overview has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The raster overview could not be saved. Please, try again.'));
        }
        $this->set(compact('rasterOverview'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Raster Overview id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $rasterOverview = $this->RasterOverviews->get($id);
        if ($this->RasterOverviews->delete($rasterOverview)) {
            $this->Flash->success(__('The raster overview has been deleted.'));
        } else {
            $this->Flash->error(__('The raster overview could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
