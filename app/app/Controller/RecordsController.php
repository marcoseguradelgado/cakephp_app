<?php
App::uses('AppController', 'Controller');

class RecordsController extends AppController {

    public function beforeFilter() {
        parent::beforeFilter();
        // Allow users to register and logout.
        //$this->Auth->allow('add', 'logout');
    }


    public function index() {
        $this->Record->recursive = 0;
        $this->set('records', $this->Record->find('all'));
    }





}