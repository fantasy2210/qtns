<?php

Cache::config('default', array('engine' => 'File'));

CakePlugin::load(array('Wizard','TinymceElfinder', 'BoostCake', 'Upload', 'DebugKit', 'Usermgmt' => array('routes' => true, 'bootstrap' => true)));

Configure::write('Dispatcher.filters', array(
    'AssetDispatcher',
    'CacheDispatcher'
));

/**
 * Configures default file logging options
 */
App::uses('CakeLog', 'Log');
CakeLog::config('debug', array(
    'engine' => 'File',
    'types' => array('notice', 'info', 'debug'),
    'file' => 'debug',
));
CakeLog::config('error', array(
    'engine' => 'File',
    'types' => array('warning', 'error', 'critical', 'alert', 'emergency'),
    'file' => 'error',
));

if (!defined("SUB_DIR")) {
    define("SUB_DIR", "/qtns");
}
