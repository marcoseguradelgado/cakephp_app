<?php
App::uses('AppController', 'Controller');

class EmployeesController extends AppController {

    public function beforeFilter() {
        parent::beforeFilter();
        // Allow Employees to register and logout.
        //$this->Auth->allow('add', 'logout');
    }
    
    public function index() {
        $this->Employee->recursive = 0;
        $this->set('employees', $this->Employee->find('all'));
    }
    

    public function add() {
        if ($this->request->is('post')) {
            $this->Employee->create();
            if ($this->Employee->save($this->request->data)) {
                $this->Session->setFlash(__('The Employee has been saved'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash(
                __('The Employee could not be saved. Please, try again.')
            );
        }
    }

    public function edit($id = null) {
        $this->Employee->id = $id;
        if (!$this->Employee->exists()) {
            throw new NotFoundException(__('Invalid Employee'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Employee->save($this->request->data)) {
                $this->Session->setFlash(__('The Employee has been saved'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash(
                __('The Employee could not be saved. Please, try again.')
            );
        } else {
            $this->request->data = $this->Employee->read(null, $id);
            unset($this->request->data['Employee']['password']);
        }
    }

    public function delete($id = null) {

        $this->request->allowMethod('post');

        $this->Employee->IdEmployee = $id;

        if (!$this->Employee->exists()) {
            throw new NotFoundException(__('Invalid Employee'));
        }
        if ($this->Employee->delete()) {
            $this->Session->setFlash(__('Employee deleted'));
            return $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Employee was not deleted'));
        return $this->redirect(array('action' => 'index'));
    }



}