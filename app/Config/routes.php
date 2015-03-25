<?php

Router::connect('/them-qd-thanh-lap', array('controller' => 'qd_thanhlaps', 'action' => 'wizard'));
Router::connect('/', array('plugin' => 'usermgmt', 'controller' => 'users', 'action' => 'dashboard', 'admin' => true));
/**
 * ...and connect the rest of 'Pages' controller's URLs.
 */
Router::connect('/pages/*', array('controller' => 'pages', 'action' => 'display'));

Router::connect('/admin', array('plugin' => 'usermgmt', 'controller' => 'users', 'action' => 'dashboard', 'admin' => true));

Router::connect('/manager', array('plugin' => 'usermgmt', 'controller' => 'users', 'action' => 'dashboard', 'manager' => true));
/**
 * Load all plugin routes. See the CakePlugin documentation on
 * how to customize the loading of plugin routes.
 */
CakePlugin::routes();

/**
 * Load the CakePHP default routes. Only remove this if you do not want to use
 * the built-in default routes.
 */
require CAKE . 'Config' . DS . 'routes.php';
