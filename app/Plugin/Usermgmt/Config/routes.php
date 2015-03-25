<?php

// Routes for standard actions
Router::connect('/users/login', array('plugin' => 'usermgmt', 'controller' => 'users', 'action' => 'login'));
Router::connect('/users/search', array('plugin' => 'usermgmt', 'controller' => 'users', 'action' => 'search'));
Router::connect('/login', array('plugin' => 'usermgmt', 'controller' => 'users', 'action' => 'login'));
Router::connect('/logout', array('plugin' => 'usermgmt', 'controller' => 'users', 'action' => 'logout'));
Router::connect('/forgotPassword', array('plugin' => 'usermgmt', 'controller' => 'users', 'action' => 'forgotPassword'));
Router::connect('/activatePassword/*', array('plugin' => 'usermgmt', 'controller' => 'users', 'action' => 'activatePassword'));
Router::connect('/register', array('plugin' => 'usermgmt', 'controller' => 'users', 'action' => 'register'));
Router::connect('/changePassword', array('plugin' => 'usermgmt', 'controller' => 'users', 'action' => 'changePassword'));
Router::connect('/changeUserPassword/*', array('plugin' => 'usermgmt', 'controller' => 'users', 'action' => 'changeUserPassword'));
Router::connect('/addUser', array('admin' => true, 'plugin' => 'usermgmt', 'controller' => 'users', 'action' => 'add'));
Router::connect('/viewUser/*', array('admin' => true, 'plugin' => 'usermgmt', 'controller' => 'users', 'action' => 'view'));
Router::connect('/userVerification/*', array('plugin' => 'usermgmt', 'controller' => 'users', 'action' => 'userVerification'));
Router::connect('/users', array('plugin' => 'usermgmt', 'controller' => 'users', 'action' => 'index'));
Router::connect('/dashboard', array('plugin' => 'usermgmt', 'controller' => 'users', 'action' => 'dashboard'));
Router::connect('/permissions', array('admin' => true, 'plugin' => 'usermgmt', 'controller' => 'user_group_permissions', 'action' => 'index'));
Router::connect('/update_permission', array('plugin' => 'usermgmt', 'controller' => 'user_group_permissions', 'action' => 'update'));
Router::connect('/accessDenied', array('plugin' => 'usermgmt', 'controller' => 'users', 'action' => 'accessDenied'));
Router::connect('/myprofile', array('plugin' => 'usermgmt', 'controller' => 'users', 'action' => 'myprofile'));
Router::connect('/changeAvatar', array('plugin' => 'usermgmt', 'controller' => 'users', 'action' => 'changeAvatar'));
Router::connect('/allGroups', array('admin' => true, 'plugin' => 'usermgmt', 'controller' => 'user_groups', 'action' => 'index'));
Router::connect('/addGroup', array('admin' => true, 'plugin' => 'usermgmt', 'controller' => 'user_groups', 'action' => 'add'));
Router::connect('/editGroup/*', array('plugin' => 'usermgmt', 'controller' => 'user_groups', 'action' => 'edit', 'admin' => true));
Router::connect('/deleteGroup/*', array('admin' => true, 'plugin' => 'usermgmt', 'controller' => 'user_groups', 'action' => 'delete'));
Router::connect('/emailVerification', array('plugin' => 'usermgmt', 'controller' => 'users', 'action' => 'emailVerification'));
Router::connect('/users/convert_password', array('plugin' => 'usermgmt', 'controller' => 'users', 'action' => 'convertPassword'));
Router::connect('/allUsers', array('admin' => true, 'plugin' => 'usermgmt', 'controller' => 'users', 'action' => 'index'));

