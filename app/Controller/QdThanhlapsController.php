<?php

App::uses('AppController', 'Controller');

/**
 * QdThanhlaps Controller
 *
 * @property QdThanhlap $QdThanhlap
 * @property PaginatorComponent $Paginator
 */
class QdThanhlapsController extends AppController {

    /**
     * Components
     *
     * @var array
     */
    public $uses = array('Donvi', 'QdThanhlap');

    function beforeFilter() {
        $this->Wizard->steps = array('donvi', 'quyetdinh');
        $this->Wizard->completeUrl = '/QdThanhlaps/confirm';
    }

    public function confirm() {
        
    }

    function wizard($step = null) {
        //debug($step);die;
        $this->Wizard->process($step);
    }

    function _prepareDonvi() {
        $parentDonvis = $this->QdThanhlap->Donvi->find('list');
        $this->set(compact('parentDonvis'));
    }

    function _processDonvi() {
        $this->Donvi->set($this->data);
        if ($this->Donvi->validates()) {
            return true;
        }
        return false;
    }

    function _processQuyetdinh() {
        $this->QdThanhlap->set($this->data);
        if ($this->QdThanhlap->validates()) {
            return true;
        }
        return false;
    }

    /**
     * [Wizard Completion Callback]
     */
    public function _afterComplete() {

        $wizardData = $this->Wizard->read();
        extract($wizardData);
        $donvi_data = $donvi['Donvi'];
        $qd_data = $quyetdinh['QdThanhlap'];
        debug($donvi_data);
        debug($qd_data);


        //$this->Client->save($account['Client'], false, array('first_name', 'last_name', 'phone'));
        //$this->User->save($account['User'], false, array('email', 'password'));
    }

    /**
     * index method
     *
     * @return void
     */
    public function index() {
        $this->QdThanhlap->recursive = 0;
        $this->set('qdThanhlaps', $this->Paginator->paginate());
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        if (!$this->QdThanhlap->exists($id)) {
            throw new NotFoundException(__('Invalid qd thanhlap'));
        }
        $options = array('conditions' => array('QdThanhlap.' . $this->QdThanhlap->primaryKey => $id));
        $this->set('qdThanhlap', $this->QdThanhlap->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            $this->QdThanhlap->create();
            if ($this->QdThanhlap->save($this->request->data)) {
                $this->Session->setFlash(__('The qd thanhlap has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The qd thanhlap could not be saved. Please, try again.'));
            }
        }
        $donvis = $this->QdThanhlap->Donvi->find('list');
        $this->set(compact('donvis'));
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        if (!$this->QdThanhlap->exists($id)) {
            throw new NotFoundException(__('Invalid qd thanhlap'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->QdThanhlap->save($this->request->data)) {
                $this->Session->setFlash(__('The qd thanhlap has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The qd thanhlap could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('QdThanhlap.' . $this->QdThanhlap->primaryKey => $id));
            $this->request->data = $this->QdThanhlap->find('first', $options);
        }
        $donvis = $this->QdThanhlap->Donvi->find('list');
        $this->set(compact('donvis'));
    }

    /**
     * delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function delete($id = null) {
        $this->QdThanhlap->id = $id;
        if (!$this->QdThanhlap->exists()) {
            throw new NotFoundException(__('Invalid qd thanhlap'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->QdThanhlap->delete()) {
            $this->Session->setFlash(__('The qd thanhlap has been deleted.'));
        } else {
            $this->Session->setFlash(__('The qd thanhlap could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
    }

}
