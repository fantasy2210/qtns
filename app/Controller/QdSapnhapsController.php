<?php
App::uses('AppController', 'Controller');
/**
 * QdSapnhaps Controller
 *
 * @property QdSapnhap $QdSapnhap
 * @property PaginatorComponent $Paginator
 */
class QdSapnhapsController extends AppController {

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
		$this->QdSapnhap->recursive = 0;
		$this->set('qdSapnhaps', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->QdSapnhap->exists($id)) {
			throw new NotFoundException(__('Invalid qd sapnhap'));
		}
		$options = array('conditions' => array('QdSapnhap.' . $this->QdSapnhap->primaryKey => $id));
		$this->set('qdSapnhap', $this->QdSapnhap->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->QdSapnhap->create();
			if ($this->QdSapnhap->save($this->request->data)) {
				return $this->flash(__('The qd sapnhap has been saved.'), array('action' => 'index'));
			}
		}
		$donvi1s = $this->QdSapnhap->Donvi1->find('list');
		$donvi2s = $this->QdSapnhap->Donvi2->find('list');
		$donviMois = $this->QdSapnhap->DonviMoi->find('list');
		$this->set(compact('donvi1s', 'donvi2s', 'donviMois'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->QdSapnhap->exists($id)) {
			throw new NotFoundException(__('Invalid qd sapnhap'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->QdSapnhap->save($this->request->data)) {
				return $this->flash(__('The qd sapnhap has been saved.'), array('action' => 'index'));
			}
		} else {
			$options = array('conditions' => array('QdSapnhap.' . $this->QdSapnhap->primaryKey => $id));
			$this->request->data = $this->QdSapnhap->find('first', $options);
		}
		$donvi1s = $this->QdSapnhap->Donvi1->find('list');
		$donvi2s = $this->QdSapnhap->Donvi2->find('list');
		$donviMois = $this->QdSapnhap->DonviMoi->find('list');
		$this->set(compact('donvi1s', 'donvi2s', 'donviMois'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->QdSapnhap->id = $id;
		if (!$this->QdSapnhap->exists()) {
			throw new NotFoundException(__('Invalid qd sapnhap'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->QdSapnhap->delete()) {
			return $this->flash(__('The qd sapnhap has been deleted.'), array('action' => 'index'));
		} else {
			return $this->flash(__('The qd sapnhap could not be deleted. Please, try again.'), array('action' => 'index'));
		}
	}
}
