<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Competitions Controller
 *
 * @property \App\Model\Table\CompetitionsTable $Competitions
 */
class CompetitionsController extends AppController
{

	public function isAuthorized($user)
	{
		// Tous les utilisateurs enregistrés peuvent ajouter des competition
		if ($this->request->action === 'add') {
			return true;
		}
	
		// Le propriétaire d'un article peut l'éditer et le supprimer
		if (in_array($this->request->action, ['edit', 'delete'])) {
			$articleId = (int)$this->request->params['pass'][0];
			if ($this->Articles->isOwnedBy($articleId, $user['id'])) {
				return true;
			}
		}
	
		return parent::isAuthorized($user);
	}
	
    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {

    	//debug($this->SESSION);
    	//die();
        $this->set('competitions', $this->paginate($this->Competitions));
        $this->set('_serialize', ['competitions']);
    }

    /**
     * View method
     *
     * @param string|null $id Competition id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $competition = $this->Competitions->get($id, [
            'contain' => []
        ]);
        $this->set('competition', $competition);
        $this->set('_serialize', ['competition']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $competition = $this->Competitions->newEntity();
        if ($this->request->is('post')) {
            $competition = $this->Competitions->patchEntity($competition, $this->request->data);
            if ($this->Competitions->save($competition)) {
                $this->Flash->success('The competition has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The competition could not be saved. Please, try again.');
            }
        }
        $this->set(compact('competition'));
        $this->set('_serialize', ['competition']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Competition id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $competition = $this->Competitions->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $competition = $this->Competitions->patchEntity($competition, $this->request->data);
            if ($this->Competitions->save($competition)) {
                $this->Flash->success('The competition has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The competition could not be saved. Please, try again.');
            }
        }
        $this->set(compact('competition'));
        $this->set('_serialize', ['competition']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Competition id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $competition = $this->Competitions->get($id);
        if ($this->Competitions->delete($competition)) {
            $this->Flash->success('The competition has been deleted.');
        } else {
            $this->Flash->error('The competition could not be deleted. Please, try again.');
        }
        return $this->redirect(['action' => 'index']);
    }
}
