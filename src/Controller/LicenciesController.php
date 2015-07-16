<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Licencies Controller
 *
 * @property \App\Model\Table\LicenciesTable $Licencies
 */
class LicenciesController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Clubs']
        ];
        $this->set('licencies', $this->paginate($this->Licencies));
        $this->set('_serialize', ['licencies']);
    }

    /**
     * View method
     *
     * @param string|null $id Licency id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $licency = $this->Licencies->get($id, [
            'contain' => ['Clubs']
        ]);
        $this->set('licency', $licency);
        $this->set('_serialize', ['licency']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $licency = $this->Licencies->newEntity();
        if ($this->request->is('post')) {
            $licency = $this->Licencies->patchEntity($licency, $this->request->data);
            if ($this->Licencies->save($licency)) {
                $this->Flash->success('The licency has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The licency could not be saved. Please, try again.');
            }
        }
        $clubs = $this->Licencies->Clubs->find('list', ['limit' => 200]);
        $this->set(compact('licency', 'clubs'));
        $this->set('_serialize', ['licency']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Licency id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $licency = $this->Licencies->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $licency = $this->Licencies->patchEntity($licency, $this->request->data);
            if ($this->Licencies->save($licency)) {
                $this->Flash->success('The licency has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The licency could not be saved. Please, try again.');
            }
        }
        $clubs = $this->Licencies->Clubs->find('list', ['limit' => 200]);
        $this->set(compact('licency', 'clubs'));
        $this->set('_serialize', ['licency']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Licency id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $licency = $this->Licencies->get($id);
        if ($this->Licencies->delete($licency)) {
            $this->Flash->success('The licency has been deleted.');
        } else {
            $this->Flash->error('The licency could not be deleted. Please, try again.');
        }
        return $this->redirect(['action' => 'index']);
    }
}
