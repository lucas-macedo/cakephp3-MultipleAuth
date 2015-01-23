<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Controller\Component\AuthComponent;
use Cake\Event\Event;
use Cake\Network\Exception\NotFoundException;
use Cake\Network\Exception\UnauthorizedException;
/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link http://book.cakephp.org/3.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {

/**
 * Components this controller uses.
 *
 * Component names should not include the `Component` suffix. Components
 * declared in subclasses will be merged with components declared here.
 *
 * @var array
 */
    public $components = [
        'Auth' ,
        'Flash',
    ];
    
    public $helpers = ['Form'];

    public function beforeFilter(Event $e) {

        $this->_manageAuthConfigs();
    }
    
    protected function isPrefix($prefix)
    {
        $params = $this->request->params;
        return isset($params['prefix']) && $params['prefix'] === $prefix;
    }


    public function beforeRender(Event $e) {
        // set in the view the currentUser
        if (!empty(($this->Auth->user()))) $authUser = $this->Auth->user();
        $this->set(['authUser'=>$authUser]);

        pr($authUser);

        // set in view the body class
        $this->set('bodyClass', 
        sprintf('%s %s', strtolower($this->name), strtolower($this->name) . '-' . strtolower($this->request->params['action'])));

    }

    private function _manageAuthConfigs() {
       
        // if the customer user
        $this->Auth->authError = 'Área restrita, identifique-se primeiro.';
        $this->Auth->sessionKey = 'Auth.Customer';

        $this->Auth->loginAction = array('controller' => 'customers', 'action' => 'login', 'customer' => true);
        $this->Auth->loginRedirect = '/';
        $this->Auth->logoutRedirect = '/';
        $this->Auth->authenticate = array(
            'Form' => array(
                'userModel' => 'Customer',
                'fields' => array('username' => 'email'),
            ),
        );
        // if the user admin
        if ($this->isPrefix('admin')) {
            $this->Auth->authError = 'Área restrita, identifique-se primeiro.';
            $this->Auth->sessionKey = 'Auth.Admin';
            $this->Auth->loginAction = array('controller' => 'users', 'action' => 'login', 'admin' => true);
            $this->Auth->loginRedirect = '/admin';
            $this->Auth->logoutRedirect = '/admin/login';
            $this->Auth->authenticate = array('Form' => array('userModel' => 'User'));

            $this->Auth->allow('login');
        } elseif ($this->isPrefix('customer')) {

            $this->Auth->deny();
        } else {

            $this->Auth->allow();
        }
    }
    
}
