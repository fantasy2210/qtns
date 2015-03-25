<?php
App::uses('AppController', 'Controller');
/**
 * Donvis Controller
 *
 * @property Donvi $Donvi
 * @property PaginatorComponent $Paginator
 */
class DonvisController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Donvi->recursive = 0;
		$this->set('donvis', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Donvi->exists($id)) {
			throw new NotFoundException(__('Invalid donvi'));
		}
		$options = array('conditions' => array('Donvi.' . $this->Donvi->primaryKey => $id));
		$this->set('donvi', $this->Donvi->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Donvi->create();
			if ($this->Donvi->save($this->request->data)) {
				$this->Session->setFlash(__('The donvi has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The donvi could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		}
		$parentDonvis = $this->Donvi->ParentDonvi->find('list');
		$this->set(compact('parentDonvis'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Donvi->exists($id)) {
			throw new NotFoundException(__('Invalid donvi'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Donvi->save($this->request->data)) {
				$this->Session->setFlash(__('The donvi has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The donvi could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		} else {
			$options = array('conditions' => array('Donvi.' . $this->Donvi->primaryKey => $id));
			$this->request->data = $this->Donvi->find('first', $options);
		}
		$parentDonvis = $this->Donvi->ParentDonvi->find('list');
		$this->set(compact('parentDonvis'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Donvi->id = $id;
		if (!$this->Donvi->exists()) {
			throw new NotFoundException(__('Invalid donvi'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Donvi->delete()) {
			$this->Session->setFlash(__('The donvi has been deleted.'), 'default', array('class' => 'alert alert-success'));
		} else {
			$this->Session->setFlash(__('The donvi could not be deleted. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
