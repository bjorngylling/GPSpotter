<?php
class AppController extends Controller {
    var $components = array('Acl', 'Auth', 'Session');
    var $helpers = array('Html', 'Form', 'Session');

    function beforeFilter() {
        // Configure AuthComponent
        $this->Auth->authorize = 'actions';
        // Username is the email
        $this->Auth->fields = array('username' => 'email', 
        'password' => 'password');
        $this->Auth->loginAction = array('controller' => 'users', 
          'action' => 'login');
        // Go here after logout
        $this->Auth->logoutRedirect = array('controller' => 'users', 
          'action' => 'login');
        // Go here after login
        $this->Auth->loginRedirect = array('controller' => 'posts', 
          'action' => 'add');
    }
}
