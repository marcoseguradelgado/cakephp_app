<?php
App::uses('AppController', 'Controller');

class UsersController extends AppController {

    public function beforeFilter() {
        parent::beforeFilter();
        // Allow users to register and logout.
        //$this->Auth->allow('add', 'logout');
    }

    public function login() {
        if ($this->request->is('post')) {
            if ($this->Auth->login()) {
                return $this->redirect($this->Auth->redirect());
            }
            $this->Session->setFlash(__('Usuario y password invalidos. Trate de nuevo'));
        }
    }

    public function logout() {
        return $this->redirect($this->Auth->logout());
    }

    public function index() {
        $this->User->recursive = 0;
        $this->set('users', $this->User->find('all'));
    }

/*    public function view($id = null) {
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        $this->set('user', $this->User->read(null, $id));
    }*/

    public function add() {
        if ($this->request->is('post')) {
            $this->User->create();
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('El usuario se ha salvado'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash(
                __('El usuario no pudo ser salvado. trate de nuevo')
            );
        }
    }

    public function edit($id = null) {
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Usuario invalido'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('El usuario se ha salvado'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash(
                __('El usuario no pudo ser salvado. trate de nuevo')
            );
        } else {
            $this->request->data = $this->User->read(null, $id);
            unset($this->request->data['User']['password']);
        }
    }

    public function delete($id = null) {
        // Prior to 2.5 use
        // $this->request->onlyAllow('post');

        $this->request->allowMethod('post');

        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Usuario invalido'));
        }
        if ($this->User->delete()) {
            $this->Session->setFlash(__('Usuario eliminado'));
            return $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Usuario no fue eliminado'));
        return $this->redirect(array('action' => 'index'));
    }



}