<?php

App::uses('AppController', 'Controller');

/**
 * Attachfiles Controller
 *
 * @property Attachfile $Attachfile
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class AttachfilesController extends AppController {

    /**
     * Components
     *
     * @var array
     */
    public $components = array('Paginator', 'Session');

    /**
     * index method
     *
     * @return void
     */
    public function index() {
        $this->Attachfile->recursive = 0;
        $this->set('attachfiles', $this->Paginator->paginate());
    }

    public function download($id = null) {
        if (!$this->Attachfile->exists($id)) {
            throw new NotFoundException(__('Invalid attachfile'));
        }
        $options = array('conditions' => array('Attachfile.' . $this->Attachfile->primaryKey => $id));
        $attachfile = $this->Attachfile->find('first', $options);
        $this->viewClass = 'Media';
        $params = array(
            'id' => $attachfile['Attachfile']['path'],
            'name' => $attachfile['Attachfile']['name'],
            'extension' => $attachfile['Attachfile']['ext'],
            'mimeType' => array($attachfile['Attachfile']['ext'] => $attachfile['Attachfile']['type']),
            'path' => '.'
        );
        $this->set($params);
    }

    public function upload($model = null, $fk = null) {
        debug($this->params);die;
        $this->autoRender = false;
        if ($this->request->is('post')) {
            
            $tempFile = $this->params->form['file'];
            $extension = pathinfo($tempFile['name'], PATHINFO_EXTENSION);
            $filename = pathinfo($tempFile['name'], PATHINFO_FILENAME);
            $name = md5(microtime());
            $folder = date("d.m.Y");
            $targetPath = APP . 'webroot' . "/" . 'files' . "/" . $folder . "/";
            if (!is_dir($targetPath)) {
                mkdir($targetPath);
            }
            $targetFilereal = $targetPath . $name;
            $targetFile = '/files' . "/" . $folder . "/" . $name;
            if (move_uploaded_file($tempFile['tmp_name'], $targetFilereal)) {
                $data = array();
                $data['name'] = $filename;
                if (!empty($fk)) {
                    $data['foreign_key'] = $fk;
                }
                $data['ext'] = $extension;
                $data['type'] = $tempFile['type'];
                $data['size'] = $tempFile['size'];
                $data['path'] = $targetFile;
                $data['realpath'] = $targetFilereal;
                $data['upload_by'] = $this->UserAuth->getUserId();
                $data['model'] = $model;
                $this->Attachfile->create();
                if ($this->Attachfile->save($data)) {
                    echo $this->Attachfile->getInsertID();
                    //die;
                } else {
                    echo "0";
                    //die;
                }
            }
        }
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        if (!$this->Attachfile->exists($id)) {
            throw new NotFoundException(__('Invalid attachfile'));
        }
        $options = array('conditions' => array('Attachfile.' . $this->Attachfile->primaryKey => $id));
        $this->set('attachfile', $this->Attachfile->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        print_r($this->user);
        die;
        if ($this->request->is('post')) {
            $this->Attachfile->create();
            if ($this->Attachfile->save($this->request->data)) {
                $this->Session->setFlash(__('The attachfile has been saved.'), 'default', array('class' => 'alert alert-success'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The attachfile could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
            }
        }
        $vanbandens = $this->Attachfile->Vanbanden->find('list');
        $vanbandis = $this->Attachfile->Vanbandi->find('list');
        $this->set(compact('vanbandens', 'vanbandis'));
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        if (!$this->Attachfile->exists($id)) {
            throw new NotFoundException(__('Invalid attachfile'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->Attachfile->save($this->request->data)) {
                $this->Session->setFlash(__('The attachfile has been saved.'), 'default', array('class' => 'alert alert-success'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The attachfile could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
            }
        } else {
            $options = array('conditions' => array('Attachfile.' . $this->Attachfile->primaryKey => $id));
            $this->request->data = $this->Attachfile->find('first', $options);
        }
        $vanbandens = $this->Attachfile->Vanbanden->find('list');
        $vanbandis = $this->Attachfile->Vanbandi->find('list');
        $this->set(compact('vanbandens', 'vanbandis'));
    }

    /**
     * delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function delete($id = null) {
        $this->Attachfile->id = $id;
        if (!$this->Attachfile->exists()) {
            throw new NotFoundException(__('Invalid attachfile'));
        }
        $options = array('conditions' => array('Attachfile.' . $this->Attachfile->primaryKey => $id));
        $attachfile = $this->Attachfile->find('first', $options);
        if ($this->UserAuth->getUserId() == $attachfile['Attachfile']['upload_by']) {
            unlink($attachfile['Attachfile']['realpath']);
            $this->request->onlyAllow('post', 'delete');
            if ($this->Attachfile->delete()) {
                //$this->Session->setFlash(__('The attachfile has been deleted.'), 'default', array('class' => 'alert alert-success'));
                die("1");
            } else {
                die("0");
                //$this->Session->setFlash(__('The attachfile could not be deleted. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
            }
        } else {
            die("-1");
        }
        return $this->redirect(array('action' => 'index'));
    }

    public function getpics($foreignkey, $model) {
        $this->autoRender = false;
        $pics = $this->Attachfile->find('all', array(
            'conditions' => array('Attachfile.foreign_key' => $foreignkey, 'Attachfile.model' => $model),
            'fields' => array('id', 'name', 'size', 'ext', 'path')));
        if (!empty($pics)) {

            $pics = Set::classicExtract($pics, '{n}.Attachfile');

            echo json_encode($pics);
        }
    }

    public function getFilename($id = null) {
        $this->autoRender = false;
        $this->Attachfile->id = $id;
        if ($this->Attachfile->exists()) {
            echo $this->Attachfile->field('path');
        }
    }

}
