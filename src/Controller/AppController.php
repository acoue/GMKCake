<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link      http://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   http://www.opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link http://book.cakephp.org/3.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{

    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * @return void
     */
    
    public function initialize()
    {
    	$this->loadComponent('Flash');
    	$this->loadComponent('Auth', [
    			'loginRedirect' => [
	    			'controller' => 'Pages',
	    			'action' => 'display',
    					'home'
    			],
    			'logoutRedirect' => [
	    			'controller' => 'Users',
	    			'action' => 'login'
				],
    			'authenticate' => [
    					'Form' => [
    							'scope' => ['Users.active' => 1]
    					]
    			]
    		]);
    	
    	//recuperation de la competition selectionnee -> session
    	$session = $this->request->session();
    	$this->loadModel('Competitions');
    	$competitionSelected = $this->Competitions->find('all')->where(['selected'=> '1'])->first();
    	$session->write('Competition.Id',$competitionSelected->id);
    	$session->write('Competition.Libelle',$competitionSelected->name);
    	$session->write('Competition.Date',$competitionSelected->date_competition);
    	$session->write('Competition.Lieu',$competitionSelected->lieu);
    	$session->write('Competition.Type',$competitionSelected->type);
    	
    	
    	
    }

    public function beforeFilter(Event $event)
    {
    	$this->Auth->deny();
    	$this->Auth->config('authorize', ['Controller']);
    	//$this->Auth->config('authorize', ['Actions','Controller']);


    	$this->Auth->config('authError', 'Vous ne disposez pas des droits nécessaires.');
    	$this->Auth->config('unauthorizedRedirect', $this->referer(['controller' => 'pages','action' => 'permission']));
    }
    
    public function isAuthorized($user)
    {
    	// Admin peuvent accéder à chaque action
    	if (isset($user['role']) && $user['role'] === 'admin') {
    		return true;
    	}
    
    	// Par défaut refuser
    	return false;
    }
    
}
