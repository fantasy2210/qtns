<?php


App::uses('UserMgmtAppController', 'Usermgmt.Controller');

class UserGroupsController extends UserMgmtAppController {

    public $uses = array('Usermgmt.UserGroup', 'Usermgmt.User');

    /**
     * Used to view all groups by Admin
     *
     * @access public
     * @return array
     */
    public function admin_index() {
        $this->UserGroup->unbindModel(array('hasMany' => array('UserGroupPermission')));
        $userGroups = $this->UserGroup->find('all', array('order' => 'UserGroup.id'));
        $this->set('userGroups', $userGroups);
    }

    /**
     * Used to add group on the site by Admin
     *
     * @access public
     * @return void
     */
    public function admin_add() {
        if ($this->request->isPost()) {
            $this->UserGroup->set($this->data);
            if ($this->UserGroup->addValidate()) {
                $this->UserGroup->save($this->request->data, false);
                $this->Session->setFlash(__('Đã tạo nhóm thành công'));
                $this->redirect('/addGroup');
            }
        }
    }

    /**
     * Used to edit group on the site by Admin
     *
     * @access public
     * @param integer $groupId group id
     * @return void
     */
    public function admin_edit($groupId = null) {
        if (!empty($groupId)) {
            if ($this->request->isPost()) {
                $this->UserGroup->set($this->data);
                if ($this->UserGroup->addValidate()) {
                    $this->UserGroup->save($this->request->data, false);
                    $this->Session->setFlash(__('Đã cập nhật thành công.'));
                    $this->redirect(array('action' => 'index'));
                }
            } else {
                $this->request->data = $this->UserGroup->read(null, $groupId);
            }
        } else {
            $this->redirect(array('action' => 'index'));
        }
    }

    /**
     * Used to delete group on the site by Admin
     *
     * @access public
     * @param integer $userId group id
     * @return void
     */
    public function admin_delete($groupId = null) {
        if (!empty($groupId)) {
            if ($this->request->isPost()) {
                $users = $this->User->isUserAssociatedWithGroup($groupId);
                if ($users) {
                    $this->Session->setFlash('Tồn tại người dùng thuộc nhóm này. Bạn không thể xóa.');
                    $this->redirect(array('action' => 'index'));
                }
                if ($this->UserGroup->delete($groupId, false)) {
                    $this->Session->setFlash(__('Xóa nhóm thành công'));
                }
            }
            $this->redirect(array('action' => 'index'));
        } else {
            $this->redirect(array('action' => 'index'));
        }
    }

}
