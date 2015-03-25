<?php

App::uses('UserMgmtAppController', 'Usermgmt.Controller');

class UsersController extends UserMgmtAppController {

    /**
     * This controller uses following models
     *
     * @var array
     */
    public $uses = array('Usermgmt.User', 'Usermgmt.UserGroup', 'Usermgmt.LoginToken', 'Chapter', 'Course', 'Enrollment');
    public $components = array('Paginator');

    /**
     * Called before the controller action.  You can use this method to configure and customize components
     * or perform logic that needs to happen before each controller action.
     *
     * @return void
     */
    public function beforeFilter() {
        parent::beforeFilter();
        $this->User->userAuth = $this->UserAuth;
    }

    public function manager_dashboard() {
        
    }

////////////////////////////////////////////////////////////

    public function admin_dashboard() {
        
    }

    public function admin_profile() {
        $userId = $this->UserAuth->getUserId();
        $user = $this->User->find('first', array('conditions' => array('User.id' => $userId), 'recursive' => 0));
        $this->set('user', $user);
    }

    /**
     * Used to display all users by Admin
     * @access public
     * @return array
     */
    public function admin_index() {
        $conditions = array();
        if (!empty($this->request->data['User']['last_name'])) {
            $conditions = Set::merge($conditions, array('User.last_name like' => $this->request->data['User']['last_name'] . '%'));
        }
        if (!empty($this->request->data['User']['first_name'])) {
            $conditions = Set::merge($conditions, array('User.first_name like' => '%' . $this->request->data['User']['first_name']));
        }

        if (!empty($this->request->data['User']['username'])) {
            $conditions = Set::merge($conditions, array('User.username like' => '%' . $this->request->data['User']['username'] . '%'));
        }
        if (!empty($this->request->data['User']['user_group_id'])) {
            $conditions = Set::merge($conditions, array('User.user_group_id' => $this->request->data['User']['user_group_id']));
        }
        $this->User->unbindModel(array('hasMany' => array('LoginToken')));

        $this->Paginator->settings = array('conditions' => $conditions);
        $users = $this->Paginator->paginate();
        $this->set('users', $users);
        if ($this->request->is('ajax')) {
            $this->layout = 'ajax';
            $this->viewPath.='/ajax';
        } else {
            $userGroups = $this->UserGroup->getGroups();
            $this->set(compact('userGroups'));
        }
    }

    /**
     * Used to display detail of user by Admin
     *
     * @access public
     * @param integer $userId user id of user
     * @return array
     */
    public function admin_view($userId = null) {
        if (!empty($userId)) {
            $user = $this->User->read(null, $userId);
            $this->set('user', $user);
        } else {
            $this->redirect(array('action' => 'index'));
        }
    }

    /* Hàm show thông tin sinh viên sau khi search */

    public function myprofile() {
        $this->autoRender = false;
        $this->redirect(array('action' => 'profile', $this->UserAuth->getGroupAlias() => true));
    }

    public function admin_edit($id) {
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new Exception('Lỗi không tồn tại người dùng');
        }
        if ($this->UserAuth->getUserId() != $id && ($this->UserAuth->getGroupAlias() != 'admin' && $this->UserAuth->getGroupAlias() != 'manager')) {
            $this->redirect('accessDenied');
        }
        if ($this->request->is(array('post', 'put'))) {
            $this->User->set($this->data);
            if ($this->User->RegisterValidate()) {
                $this->User->save($this->request->data, false);
                $this->Session->setFlash(__('Đã cập nhật thông tin thành công'), 'alert', array('plugin' => 'BoostCake', 'class' => 'alert-success'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('Validate không thành công'), 'alert', array('plugin' => 'BoostCake', 'class' => 'alert-success'));
            }
        } else {
            $userGroups = $this->UserGroup->getGroups();
            $this->set(compact('userGroups'));
            $user = $this->User->read(null, $id);
            $this->request->data = null;
            if (!empty($user)) {
                $user['User']['password'] = '';
                $this->request->data = $user;
            }
        }
    }

    /* Cập nhật thông tin người dùng cho manager */

    public function managerEditUser($userId = null) {
        $departments = $this->User->Department->find('list');
        $chapters = $this->User->Chapter->find('list');
        $this->set(compact('departments', 'chapters'));
        $this->User->id = $userId;
        if (!$this->User->exists()) {
            throw new Exception('Lỗi không tồn tại người dùng');
        }
        if ($this->UserAuth->getUserId() != $userId && ($this->UserAuth->getGroupAlias() != 'admin' && $this->UserAuth->getGroupAlias() != 'manager')) {
            $this->redirect('accessDenied');
        }
        if ($this->request->is(array('post', 'put'))) {
            $this->User->set($this->data);
            if ($this->User->RegisterValidate()) {
                $this->User->save($this->request->data, false);
                $this->Session->setFlash(__('Đã cập nhật thông tin thành công'), 'alert', array('plugin' => 'BoostCake', 'class' => 'alert-success'));
                $this->redirect(array('manager' => true, 'action' => 'teacher_index'));
            } else {
                $this->Session->setFlash(__('Validate không thành công'), 'alert', array('plugin' => 'BoostCake', 'class' => 'alert-success'));
            }
        } else {
            $user = $this->User->read(null, $userId);
            $this->request->data = null;
            if (!empty($user)) {
                $user['User']['password'] = '';
                $this->request->data = $user;
            }
        }
    }

    /* Quản lý cập nhật kỹ năng có thể giảng dạy của giảng viên */

    /* Hiển thị danh sách các giảng viên cho quản lý */

    /**
     * Used to logged in the site
     *
     * @access public
     * @return void
     */
    public function login() {
        $this->layout = 'login';
        if ($this->request->isPost()) {
            $this->User->set($this->data);
            if ($this->User->LoginValidate()) {
                $email = $this->data['User']['username'];
                $password = $this->data['User']['password'];
                $username = $email;
                $user = $this->User->findByUsername($email);
                if (empty($user)) {
                    $user = $this->User->findByEmail($email);
                    if (empty($user)) {
                        /* Kiểm tra tài khoản login thông qua ldap */
                        App::uses('ldap', 'Lib');
                        $ldap = new ldap();
                        if ($ldap->auth($username, $password)) {
                            /* Xử lý lưu giảng viên ở đây */
                            $ldap_user = $ldap->getInfo($username, $password);

                            $parts = explode(" ", $ldap_user['name']);
                            $first_name = array_pop($parts);
                            $salt = $this->UserAuth->makeSalt();
                            $ip = '';
                            if (isset($_SERVER['REMOTE_ADDR'])) {
                                $ip = $_SERVER['REMOTE_ADDR'];
                            }
                            $this->request->data['User']['username'] = $username;
                            $this->request->data['User']['password'] = $this->UserAuth->makePassword($password, $salt);
                            $this->request->data['User']['salt'] = $salt;
                            $this->request->data['User']['first_name'] = $first_name;
                            $this->request->data['User']['last_name'] = rtrim($ldap_user['name'], $first_name);
                            $this->request->data['User']['email'] = $ldap_user['email'];
                            $this->request->data['User']['email_verified'] = 1;
                            $this->request->data['User']['active'] = 1;
                            $this->request->data['User']['user_group_id'] = TEACHER_GROUP_ID;
                            $this->request->data['User']['ip_address'] = $ip;
                            $this->User->save($this->request->data, false);
                            $userId = $this->User->getLastInsertID();
                            $user = $this->User->findById($userId);
                            /* Kết thúc lưu giảng viên */
                        } else {
                            $this->Session->setFlash('Tài khoản đăng nhập chưa đúng', 'alert', array('plugin' => 'BoostCake', 'class' => 'alert-warning'));
                            return;
                        }
                        /* kết thúc chứng thực ldap */
                    }
                }
                // check for inactive account
                if ($user['User']['id'] != 1 and $user['User']['active'] == 0) {
                    $this->Session->setFlash('Tài khoản chưa được kích hoạt, vui lòng liên hệ Trung tâm Hỗ trợ - Phát triển Dạy và Học', 'alert', array('plugin' => 'BoostCake', 'class' => 'alert-warning'));
                    return;
                }
                // check for verified account
                if ($user['User']['id'] != 1 and $user['User']['email_verified'] == 0) {
                    $this->Session->setFlash('Bạn cần xác nhận Email trước khi đăng nhập', 'alert', array('plugin' => 'BoostCake', 'class' => 'alert-warning'));
                    return;
                }
                if (empty($user['User']['salt'])) {
                    $hashed = md5($password);
                } else {
                    $hashed = $this->UserAuth->makePassword($password, $user['User']['salt']);
                }
                if ($user['User']['password'] === $hashed) {
                    if (empty($user['User']['salt'])) {
                        $salt = $this->UserAuth->makeSalt();
                        $user['User']['salt'] = $salt;
                        $user['User']['password'] = $this->UserAuth->makePassword($password, $salt);
                        $this->User->save($user, false);
                    }
                    $this->UserAuth->login($user);
                    $this->User->id = $this->UserAuth->getUserId();
                    $this->User->saveField('last_login', date("Y-m-d H:i:s"));

                    $remember = (!empty($this->data['User']['remember']));
                    if ($remember) {
                        $this->UserAuth->persist('2 weeks');
                    }

                    $OriginAfterLogin = $this->Session->read('Usermgmt.OriginAfterLogin');
                    $this->Session->delete('Usermgmt.OriginAfterLogin');
                    $redirect = (!empty($OriginAfterLogin)) ? $OriginAfterLogin : LOGIN_REDIRECT_URL;

                    $this->redirect($redirect);
                } else {
                    $this->Session->setFlash('Tài khoản đăng nhập chưa đúng!', 'alert', array('plugin' => 'BoostCake', 'class' => 'alert-warning'));
                    return;
                }
            }
        }
    }

    /**
     * Used to logged out from the site
     *
     * @access public
     * @return void
     */
    public function logout() {
        $this->UserAuth->logout();
        $this->redirect(LOGOUT_REDIRECT_URL);
    }

    private function covertDateString($time, $format = 'd/m/Y') {
        $date = DateTime::createFromFormat($format, $time);
        if ($date) {
            return array(
                'day' => $date->format('d'),
                'month' => $date->format('m'),
                'year' => $date->format('Y')
            );
        }
        return null;
    }

    /**
     * Used to register on the site
     *
     * @access public
     * @return void
     */
    public function register() {
        //$this->theme = 'Ace';
        $this->layout = 'login';
        $bornplaces = $this->User->Province->find('list');
        $classrooms = $this->User->Classroom->find('list');
        $this->set(compact('bornplaces', 'classrooms'));
        //die;
        //Kiểm tra user đã đăng nhập chưa ?
        $userId = $this->UserAuth->getUserId();
        if ($userId) {
            $this->redirect("/dashboard");
        }
        if (SITE_REGISTRATION) {

            $userGroups = $this->UserGroup->getGroupsForRegistration();
            $this->set('userGroups', $userGroups);
            if ($this->request->isPost()) {

                $this->request->data['User']['borndate'] = $this->covertDateString($this->request->data['User']['borndate'], 'Y-m-d');
                if (USE_RECAPTCHA && !$this->RequestHandler->isAjax()) {
                    $this->request->data['User']['captcha'] = (isset($this->request->data['recaptcha_response_field'])) ? $this->request->data['recaptcha_response_field'] : "";
                }
                $this->User->set($this->data);
                if ($this->User->RegisterValidate()) {
                    if (!isset($this->data['User']['user_group_id'])) {
                        $this->request->data['User']['user_group_id'] = DEFAULT_GROUP_ID;
                    } elseif (!$this->UserGroup->isAllowedForRegistration($this->data['User']['user_group_id'])) {
                        $this->Session->setFlash(__('Please select correct register as'));
                        return;
                    }
                    $this->request->data['User']['active'] = 1;
                    if (!EMAIL_VERIFICATION) {
                        $this->request->data['User']['email_verified'] = 1;
                    }
                    $ip = '';
                    if (isset($_SERVER['REMOTE_ADDR'])) {
                        $ip = $_SERVER['REMOTE_ADDR'];
                    }
                    $this->request->data['User']['ip_address'] = $ip;
                    $salt = $this->UserAuth->makeSalt();
                    $this->request->data['User']['salt'] = $salt;
                    $this->request->data['User']['password'] = $this->UserAuth->makePassword($this->request->data['User']['password'], $salt);
                    $this->User->save($this->request->data, false);
                    $userId = $this->User->getLastInsertID();
                    $user = $this->User->findById($userId);
                    if (SEND_REGISTRATION_MAIL && !EMAIL_VERIFICATION) {
                        $this->User->sendRegistrationMail($user);
                    }
                    if (EMAIL_VERIFICATION) {
                        $this->User->sendVerificationMail($user);
                    }
                    if (isset($this->request->data['User']['email_verified']) && $this->request->data['User']['email_verified']) {
                        $this->UserAuth->login($user);
                        $this->redirect('/');
                    } else {
                        $this->Session->setFlash('Vui lòng kiểm tra email và hoàn tất đăng ký', 'alert', array('plugin' => 'BoostCake', 'class' => 'alert-success'));
                        $this->redirect('/login');
                    }
                }
            }
        } else {
            $this->Session->setFlash(__('Sorry new registration is currently disabled, please try again later'));
            $this->redirect('/login');
        }
    }

    /**
     * Used to change the password by user
     *
     * @access public
     * @return void
     */
    public function changePassword() {
        $userId = $this->UserAuth->getUserId();
        if ($this->request->isPost()) {
            $this->User->set($this->data);
            if ($this->User->RegisterValidate()) {
                $user = array();
                $user['User']['id'] = $userId;
                $salt = $this->UserAuth->makeSalt();
                $user['User']['salt'] = $salt;
                $user['User']['password'] = $this->UserAuth->makePassword($this->request->data['User']['password'], $salt);
                $this->User->save($user, false);
                $this->LoginToken->deleteAll(array('LoginToken.user_id' => $userId), false);
                $this->Session->setFlash(__('Đổi password thành công.'), 'alert', array('plugin' => 'BoostCake', 'class' => 'alert-success'));
                $this->redirect('/myprofile');
            }
        }
    }

    /**
     * Used to change the user password by Admin
     *
     * @access public
     * @param integer $userId user id of user
     * @return void
     */
    public function changeUserPassword($userId = null) {
        if (!empty($userId)) {
            $name = $this->User->getNameById($userId);
            $this->set('name', $name);
            if ($this->request->isPost()) {
                $this->User->set($this->data);
                if ($this->User->RegisterValidate()) {
                    $user = array();
                    $user['User']['id'] = $userId;
                    $salt = $this->UserAuth->makeSalt();
                    $user['User']['salt'] = $salt;
                    $user['User']['password'] = $this->UserAuth->makePassword($this->request->data['User']['password'], $salt);
                    $this->User->save($user, false);
                    $this->LoginToken->deleteAll(array('LoginToken.user_id' => $userId), false);
                    $this->Session->setFlash(__('Mật khẩu của %s đã thay đổi thành công', $name), 'alert', array('plugin' => 'BoostCake', 'class' => 'alert-success'));

                    $this->redirect(array('admin' => true, 'action' => 'index'));
                }
            }
        } else {
            $this->redirect(array('action' => 'index'));
        }
    }

    //Hàm này dùng để đổi chuyển password từ password=>md5(password.md5(salt)) sinh viên
    public function convertPassword() {
        $success = 0;
        $students = $this->User->find('all', array('conditions' => array('user_group_id' => 2), 'recursive' => -1, 'fields' => array('id', 'password')));
        //debug($students);die;
        if (!empty($students)) {
            foreach ($students as $student) {
                $user['User']['id'] = $student['User']['id'];
                $oldpassword = $student['User']['password'];
                $salt = $this->UserAuth->makeSalt();
                $user['User']['salt'] = $salt;
                $user['User']['password'] = $this->UserAuth->makePassword2($oldpassword, $salt);
                if ($this->User->save($user, false)) {
                    $success++;
                }
            }
        }
        $this->Session->setFlash('Đã chuyển đổi password thành công cho ' + $success . ' sinh viên');
        $this->redirect(array('action' => 'index'));
    }

    /**
     * Used to add user on the site by Admin
     *
     * @access public
     * @return void
     */
    public function admin_add() {
        $userGroups = $this->UserGroup->getGroups();
        $this->set(compact('userGroups'));
        if ($this->request->isPost()) {
            $this->User->set($this->data);
            if ($this->User->RegisterValidate()) {
                $this->request->data['User']['email_verified'] = 1;
                $this->request->data['User']['active'] = 1;
                $salt = $this->UserAuth->makeSalt();
                $this->request->data['User']['salt'] = $salt;
                $this->request->data['User']['password'] = $this->UserAuth->makePassword($this->request->data['User']['password'], $salt);
                $this->User->save($this->request->data, false);
                $this->Session->setFlash('Đã thêm user mới thành công', 'alert', array('plugin' => 'BoostCake', 'class' => 'alert-success'));
                $this->redirect(array('action' => 'index'));
            }
        }
    }

    /**
     * Used to delete the user by Admin
     *
     * @access public
     * @param integer $userId user id of user
     * @return void
     */
    public function admin_delete($userId = null) {
        if (!empty($userId)) {
            if ($this->request->isPost()) {
                if ($this->User->delete($userId, false)) {
                    $this->LoginToken->deleteAll(array('LoginToken.user_id' => $userId), false);
                    $this->Session->setFlash(__('Đã xóa'), 'alert', array('plugin' => 'BoostCake', 'class' => 'alert-success'));
                }
            }
            $this->redirect(array('action' => 'index'));
        } else {
            $this->redirect(array('action' => 'index'));
        }
    }

    /**
     * Used to show dashboard of the user
     *
     * @access public
     * @return array
     */
    public function dashboard() {
        $userId = $this->UserAuth->getUserId();
        $user = $this->User->findById($userId);
        $this->set('user', $user);
    }

    /**
     * Used to activate or deactivate user by Admin
     *
     * @access public
     * @param integer $userId user id of user
     * @param integer $active active or inactive
     * @return void
     */
    public function makeActiveInactive($userId = null, $active = 0) {
        if (!empty($userId)) {
            $user = array();
            $user['User']['id'] = $userId;
            $user['User']['active'] = ($active) ? 1 : 0;
            $this->User->save($user, false);
            if ($active) {
                $this->Session->setFlash(__('Đã kích hoạt thành công'), 'alert', array('plugin' => 'BoostCake', 'class' => 'alert-success'));
            } else {
                $this->Session->setFlash(__('Khóa user thành công'), 'alert', array('plugin' => 'BoostCake', 'class' => 'alert-success'));
            }
        }
        $this->redirect('/allUsers');
    }

    /**
     * Used to verify email of user by Admin
     *
     * @access public
     * @param integer $userId user id of user
     * @return void
     */
    public function verifyEmail($userId = null) {
        if (!empty($userId)) {
            $user = array();
            $user['User']['id'] = $userId;
            $user['User']['email_verified'] = 1;
            $this->User->save($user, false);
            $this->Session->setFlash(__('Đã xác nhận email của người dùng'), 'alert', array('plugin' => 'BoostCake', 'class' => 'alert-success'));
        }
        $this->redirect(array('action' => 'index'));
    }

    /**
     * Used to show access denied page if user want to view the page without permission
     *
     * @access public
     * @return void
     */
    public function accessDenied() {
        
    }

    /**
     * Used to verify user's email address
     *
     * @access public
     * @return void
     */
    public function userVerification() {
        if (isset($_GET['ident']) && isset($_GET['activate'])) {
            $userId = $_GET['ident'];
            $activateKey = $_GET['activate'];
            $user = $this->User->read(null, $userId);
            if (!empty($user)) {
                if (!$user['User']['email_verified']) {
                    $password = $user['User']['password'];
                    $theKey = $this->User->getActivationKey($password);
                    if ($activateKey == $theKey) {
                        $user['User']['email_verified'] = 1;
                        $this->User->save($user, false);
                        if (SEND_REGISTRATION_MAIL && EMAIL_VERIFICATION) {
                            $this->User->sendRegistrationMail($user);
                        }
                        $this->Session->setFlash(__('Chúc mừng, tài khoản của bạn đã được kích hoạt'), 'alert', array('plugin' => 'BoostCake', 'class' => 'alert-success'));
                    }
                } else {
                    $this->Session->setFlash(__('Thank you, your account is already activated'), 'alert', array('plugin' => 'BoostCake', 'class' => 'alert-success'));
                }
            } else {
                $this->Session->setFlash(__('Sorry something went wrong, please click on the link again'), 'alert', array('plugin' => 'BoostCake', 'class' => 'alert-warning'));
            }
        } else {
            $this->Session->setFlash(__('Sorry something went wrong, please click on the link again'), 'alert', array('plugin' => 'BoostCake', 'class' => 'alert-warning'));
        }
        $this->redirect('/login');
    }

    /**
     * Used to send forgot password email to user
     *
     * @access public
     * @return void
     */
    public function forgotPassword() {
        if ($this->request->isPost()) {
            $this->User->set($this->data);
            if ($this->User->LoginValidate()) {
                $email = $this->data['User']['email'];
                $user = $this->User->findByUsername($email);
                if (empty($user)) {
                    $user = $this->User->findByEmail($email);
                    if (empty($user)) {
                        $this->Session->setFlash(__('Email hoặc username chưa đúng'), 'alert', array('plugin' => 'BoostCake', 'class' => 'alert-warning'));
                        return;
                    }
                }
// check for inactive account
                if ($user['User']['id'] != 1 and $user['User']['email_verified'] == 0) {
                    $this->Session->setFlash(__('Your registration has not been confirmed yet please verify your email before reset password'), 'alert', array('plugin' => 'BoostCake', 'class' => 'alert-success'));
                    return;
                }
                $this->User->forgotPassword($user);
                $this->Session->setFlash(__('Vui lòng kiểm tra email để thay đổi password'), 'alert', array('plugin' => 'BoostCake', 'class' => 'alert-success'));
                $this->redirect('/login');
            }
        }
    }

    /**
     *  Used to reset password when user comes on the by clicking the password reset link from their email.
     *
     * @access public
     * @return void
     */
    public function activatePassword() {
        if ($this->request->isPost()) {
            if (!empty($this->data['User']['ident']) && !empty($this->data['User']['activate'])) {
                $this->set('ident', $this->data['User']['ident']);
                $this->set('activate', $this->data['User']['activate']);
                $this->User->set($this->data);
                if ($this->User->RegisterValidate()) {
                    $userId = $this->data['User']['ident'];
                    $activateKey = $this->data['User']['activate'];
                    $user = $this->User->read(null, $userId);
                    if (!empty($user)) {
                        $password = $user['User']['password'];
                        $thekey = $this->User->getActivationKey($password);
                        if ($thekey == $activateKey) {
                            $user['User']['password'] = $this->data['User']['password'];
                            $salt = $this->UserAuth->makeSalt();
                            $user['User']['salt'] = $salt;
                            $user['User']['password'] = $this->UserAuth->makePassword($user['User']['password'], $salt);
                            $this->User->save($user, false);
                            $this->Session->setFlash(__('Đã thay đổi password thành công'), 'alert', array('plugin' => 'BoostCake', 'class' => 'alert-success'));
                            $this->redirect('/login');
                        } else {
                            $this->Session->setFlash(__('Something went wrong, please send password reset link again'), 'alert', array('plugin' => 'BoostCake', 'class' => 'alert-success'));
                        }
                    } else {
                        $this->Session->setFlash(__('Something went wrong, please click again on the link in email'), 'alert', array('plugin' => 'BoostCake', 'class' => 'alert-success'));
                    }
                }
            } else {
                $this->Session->setFlash(__('Something went wrong, please click again on the link in email'), 'alert', array('plugin' => 'BoostCake', 'class' => 'alert-success'));
            }
        } else {
            if (isset($_GET['ident']) && isset($_GET['activate'])) {
                $this->set('ident', $_GET['ident']);
                $this->set('activate', $_GET['activate']);
            }
        }
    }

    /**
     * Used to send email verification mail to user
     *
     * @access public
     * @return void
     */
    public function emailVerification() {
        if ($this->request->isPost()) {
            $this->User->set($this->data);
            if ($this->User->LoginValidate()) {
                $email = $this->data['User']['email'];
                $user = $this->User->findByUsername($email);
                if (empty($user)) {
                    $user = $this->User->findByEmail($email);
                    if (empty($user)) {
                        $this->Session->setFlash(__('Incorrect Email/Username'));
                        return;
                    }
                }
                if ($user['User']['email_verified'] == 0) {
                    $this->User->sendVerificationMail($user);
                    $this->Session->setFlash(__('Vui lòng check mail để xác nhận email đăng ký'), 'alert', array('plugin' => 'BoostCake', 'class' => 'alert-success'));
                } else {
                    $this->Session->setFlash(__('Email của bạn đã được xác nhận'), 'alert', array('plugin' => 'BoostCake', 'class' => 'alert-success'));
                }
                $this->redirect('/login');
            }
        }
    }

    public function updatePassword() {
        
    }

    /* Hàm tìm kiếm nhân viên dựa vào username hoặc tên */

    public function search() {
        if (isset($this->request->data['username']) && !empty($this->request->data['username'])) {

            $user = $this->User->find('first', array('recursive' => -1, 'conditions' => array('OR' => array(
                        array('User.username like' => '%' . $this->request->data['username'] . '%'),
                        array('User.first_name like' => '%' . $this->request->data['username']),
                        array('User.last_name like' => $this->request->data['username'] . '%'),
                    )
            )));
            if (!empty($user)) {
                $this->redirect("/viewUser/" . $user['User']['id']);
            } else {
                $this->Session->setFlash('Không tìm thấy nhân viên', 'alert', array('class' => 'alert-info'));
                $this->redirect('/');
            }
        } else {

            $this->redirect(array('plugin' => false, 'action' => 'home', 'controller' => 'dashboards'));
        }
    }

    /* Đổi avatar */

    public function changeAvatar() {
        $id = $this->UserAuth->getUserId();
        $this->User->id = $id;
        if ($this->request->is(array('post', 'put'))) {
            if ($this->User->save($this->request->data)) {
                return $this->redirect(array('action' => 'myprofile'));
            } else {
                $this->Session->setFlash('Thao tác thất bại', 'alert', array('class' => 'alert-warning'));
            }
        } else {
            $options = array('conditions' => array('User.' . $this->User->primaryKey => $id), 'recursive' => -1, 'fields' => array('id', 'name',
                    'photo', 'photo_dir'));
            $user = $this->User->find('first', $options);
            $this->set('user', $user);
            $this->request->data = $user;
        }
    }

}
