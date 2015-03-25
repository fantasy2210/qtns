<?php
App::uses('AppController', 'Controller');
/**
 * QdDoitens Controller
 *
 * @property QdDoiten $QdDoiten
 * @property PaginatorComponent $Paginator
 */
class QdDoitensController extends AppController {

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
		$this->QdDoiten->recursive = 0;
		$this->set('qdDoitens', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->QdDoiten->exists($id)) {
			throw new NotFoundException(__('Invalid qd doiten'));
		}
		$options = array('conditions' => array('QdDoiten.' . $this->QdDoiten->primaryKey => $id));
		$this->set('qdDoiten', $this->QdDoiten->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->QdDoiten->create();
			if ($this->QdDoiten->save($this->request->data)) {
				return $this->flash(__('The qd doiten has been saved.'), array('action' => 'index'));
			}
		}
		$donvicus = $this->QdDoiten->Donvicu->find('list');
		$donvimois = $this->QdDoiten->Donvimoi->find('list');
		$this->set(compact('donvicus', 'donvimois'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->QdDoiten->exists($id)) {
			throw new NotFoundException(__('Invalid qd doiten'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->QdDoiten->save($this->request->data)) {
				return $this->flash(__('The qd doiten has been saved.'), array('action' => 'index'));
			}
		} else {
			$options = array('conditions' => array('QdDoiten.' . $this->QdDoiten->primaryKey => $id));
			$this->request->data = $this->QdDoiten->find('first', $options);
		}
		$donvicus = $this->QdDoiten->Donvicu->find('list');
		$donvimois = $this->QdDoiten->Donvimoi->find('list');
		$this->set(compact('donvicus', 'donvimois'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->QdDoiten->id = $id;
		if (!$this->QdDoiten->exists()) {
			throw new NotFoundException(__('Invalid qd doiten'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->QdDoiten->delete()) {
			return $this->flash(__('The qd doiten has been deleted.'), array('action' => 'index'));
		} else {
			return $this->flash(__('The qd doiten could not be deleted. Please, try again.'), array('action' => 'index'));
		}
	}
}
