<?php
// src/Controller/UsersController.php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Network\Exception\NotFoundException;

class UsersController extends AppController
{

	//Actions publiques
	public function beforeFilter(Event $event)
	{
		parent::beforeFilter($event);
		$this->Auth->allow(['login', 'password']);
	}
	
	public function isAuthorized($user)
	{
			
		// Droits de tous les utilisateurs connectes sur les actions
		if(in_array($this->request->action, ['logout','compte'])){
			return true;
		}
	
		if(in_array($this->request->action, ['index'])){
			if (isset($user['role']) && $user['role'] === 'gestionnaire') {
				return true;
			}
		}
	
		return parent::isAuthorized($user);
	}
	
	public function initialize()
	{
		parent::initialize();
	}
	
	public function login()
	{

		//Destruction de la session
		$session = $this->request->session();
		$session->destroy();
		
		if ($this->request->is('post')) {
			$user = $this->Auth->identify();
			if ($user) {
				$this->Auth->setUser($user);
				return $this->redirect($this->Auth->redirectUrl());
			}
			$this->Flash->error(__("Nom d'utilisateur ou mot de passe incorrect, essayez à nouveau."));
		}
	}
	
	public function logout()
	{
		return $this->redirect($this->Auth->logout());
	}
	public function index()
	{
	//	$this->set('users', $this->Users->find('all'));

		$this->set('users', $this->paginate($this->Users));
		$this->set('_serialize', ['users']);
	}

	public function view($id)
	{
		if (!$id) {
			throw new NotFoundException(__('utilisateur non valide'));
		}

		$user = $this->Users->get($id);
		$this->set(compact('user'));
	}

	public function add()
	{
		$user = $this->Users->newEntity();
		if ($this->request->is('post')) {
			$user = $this->Users->patchEntity($user, $this->request->data);
			if ($this->Users->save($user)) {
				$this->Flash->success(__("L'utilisateur a été sauvegardé."));
				return $this->redirect(['action' => 'index']);
			}
			$this->Flash->error(__("Impossible d'ajouter l'utilisateur."));
		}
		$this->set('user', $user);
	}

	/**
	 * Edit method
	 *
	 * @param string|null $id User id.
	 * @return void Redirects on successful edit, renders view otherwise.
	 * @throws \Cake\Network\Exception\NotFoundException When record not found.
	 */
	public function edit($id = null)
	{
		$user = $this->Users->get($id, [
				'contain' => []
				]);
		if ($this->request->is(['patch', 'post', 'put'])) {
			$user = $this->Users->patchEntity($user, $this->request->data);
			if ($this->Users->save($user)) {
				$this->Flash->success('L\'utilisateur a bien été sauvegardé.');
				return $this->redirect(['action' => 'index']);
			} else {
				$this->Flash->error('Erreur lors de la sauvegarde de l\'utilisateur.');
			}
		}
		$this->set(compact('user'));
		$this->set('_serialize', ['user']);
	}
}