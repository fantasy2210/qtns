<?php
App::uses('AppController', 'Controller');
/**
 * QdChiataches Controller
 *
 * @property QdChiatach $QdChiatach
 * @property PaginatorComponent $Paginator
 */
class QdChiatachesController extends AppController {

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
		$this->QdChiatach->recursive = 0;
		$this->set('qdChiataches', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->QdChiatach->exists($id)) {
			throw new NotFoundException(__('Invalid qd chiatach'));
		}
		$options = array('conditions' => array('QdChiatach.' . $this->QdChiatach->primaryKey => $id));
		$this->set('qdChiatach', $this->QdChiatach->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->QdChiatach->create();
			if ($this->QdChiatach->save($this->request->data)) {
				$this->Session->setFlash(__('The qd chiatach has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The qd chiatach could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		}
		$donviMoi1s = $this->QdChiatach->DonviMoi1->find('list');
		$donviMoi2s = $this->QdChiatach->DonviMoi2->find('list');
		$donviCus = $this->QdChiatach->DonviCu->find('list');
		$this->set(compact('donviMoi1s', 'donviMoi2s', 'donviCus'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->QdChiatach->exists($id)) {
			throw new NotFoundException(__('Invalid qd chiatach'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->QdChiatach->save($this->request->data)) {
				$this->Session->setFlash(__('The qd chiatach has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The qd chiatach could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		} else {
			$options = array('conditions' => array('QdChiatach.' . $this->QdChiatach->primaryKey => $id));
			$this->request->data = $this->QdChiatach->find('first', $options);
		}
		$donviMoi1s = $this->QdChiatach->DonviMoi1->find('list');
		$donviMoi2s = $this->QdChiatach->DonviMoi2->find('list');
		$donviCus = $this->QdChiatach->DonviCu->find('list');
		$this->set(compact('donviMoi1s', 'donviMoi2s', 'donviCus'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->QdChiatach->id = $id;
		if (!$this->QdChiatach->exists()) {
			throw new NotFoundException(__('Invalid qd chiatach'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->QdChiatach->delete()) {
			$this->Session->setFlash(__('The qd chiatach has been deleted.'), 'default', array('class' => 'alert alert-success'));
		} else {
			$this->Session->setFlash(__('The qd chiatach could not be deleted. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
