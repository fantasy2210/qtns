<?php

App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {

    public $components = array(
        'DebugKit.Toolbar',
        'Session',
        'RequestHandler',
        'Usermgmt.UserAuth', 'Paginator',
        'Wizard.Wizard'
    );
    public $helpers = array
        ('Session',
        'Js',
        'Usermgmt.UserAuth',
        'Html' => array('className' => 'BoostCake.BoostCakeHtml'),
        'Form' => array('className' => 'BoostCake.BoostCakeForm'),
        'Paginator' => array('className' => 'BoostCake.BoostCakePaginator')
    );
    public $theme = "Ace";

    private function userAuth() {
        $this->UserAuth->beforeFilter($this);
    }

    function beforeFilter() {
        parent::beforeFilter();
        $this->userAuth();
    }

    public function beforeRender() {
        parent::beforeRender();
        if ($this->request->is('ajax')) {
            $this->layout = 'ajax';
            return true;
        }
        if (!$this->UserAuth->isLogged() && $this->request->action != 'login') {
            $this->theme = 'Home';
        }
        if ($this->UserAuth->isLogged()) {
            $this->layout = $this->UserAuth->getGroupAlias();
        }
    }

}
