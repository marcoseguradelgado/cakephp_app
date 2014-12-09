<?php
App::uses('AppController', 'Controller');

class EmployeesController extends AppController
{

    public function beforeFilter()
    {
        parent::beforeFilter();
        // Allow Employees to register and logout.
        //$this->Auth->allow('add', 'logout');
    }

    public function index()
    {
        $this->Employee->recursive = 0;
        $this->set('employees', $this->Employee->find('all'));
    }


    public function add()
    {
        if ($this->request->is('post')) {
            $this->Employee->create();
            try {
                if ($this->Employee->save($this->request->data)) {
                    $this->Session->setFlash(__('El empleado se ha salvado'));
                    return $this->redirect(array('action' => 'index'));
                }
                $this->Session->setFlash(
                    __('El empleado no se pudo salvar. Trate de nuevo')
                );
            } catch (Exception $e) {
                $this->Session->setFlash(__('El empleado ya existe'));
                return $this->redirect(array('action' => 'index'));
            }

        }
    }

    public function edit($id = null)
    {


        if ($id == '') {
            throw new NotFoundException(__('Empleado invalido'));
        }

        $post = $this->Employee->getRecentId($id);

        if (!$post) {
            throw new NotFoundException(__('Empleado invalido'));
        }

        if ($this->request->is(array('post', 'put'))) {

            $this->Employee->query("UPDATE employees SET nameEmployee = '" . $this->request->data['Employee']['nameEmployee'] . "' WHERE IdEmployee = " . $this->request->data['Employee']['IdEmployee']);
            $this->Session->setFlash(__('El empleado ha sido actualizado'));
            return $this->redirect(array('action' => 'index'));
        }

        if (!$this->request->data) {
            $this->request->data = array('Employee' => array('nameEmployee' => $post[0]['employees']['nameEmployee'],
                'IdEmployee' => $post[0]['employees']['IdEmployee']));
        }
    }

    public function delete($id = null)
    {

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