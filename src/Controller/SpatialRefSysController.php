<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * SpatialRefSys Controller
 *
 * @property \App\Model\Table\SpatialRefSysTable $SpatialRefSys
 *
 * @method \App\Model\Entity\SpatialRefSy[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class SpatialRefSysController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $spatialRefSys = $this->paginate($this->SpatialRefSys);

        $this->set(compact('spatialRefSys'));
    }

    /**
     * View method
     *
     * @param string|null $id Spatial Ref Sy id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $spatialRefSy = $this->SpatialRefSys->get($id, [
            'contain' => []
        ]);

        $this->set('spatialRefSy', $spatialRefSy);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $spatialRefSy = $this->SpatialRefSys->newEntity();
        if ($this->request->is('post')) {
            $spatialRefSy = $this->SpatialRefSys->patchEntity($spatialRefSy, $this->request->getData());
            if ($this->SpatialRefSys->save($spatialRefSy)) {
                $this->Flash->success(__('The spatial ref sy has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The spatial ref sy could not be saved. Please, try again.'));
        }
        $this->set(compact('spatialRefSy'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Spatial Ref Sy id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $spatialRefSy = $this->SpatialRefSys->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $spatialRefSy = $this->SpatialRefSys->patchEntity($spatialRefSy, $this->request->getData());
            if ($this->SpatialRefSys->save($spatialRefSy)) {
                $this->Flash->success(__('The spatial ref sy has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The spatial ref sy could not be saved. Please, try again.'));
        }
        $this->set(compact('spatialRefSy'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Spatial Ref Sy id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $spatialRefSy = $this->SpatialRefSys->get($id);
        if ($this->SpatialRefSys->delete($spatialRefSy)) {
            $this->Flash->success(__('The spatial ref sy has been deleted.'));
        } else {
            $this->Flash->error(__('The spatial ref sy could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
