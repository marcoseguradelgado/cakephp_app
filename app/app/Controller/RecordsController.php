<?php

App::uses('AppController', 'Controller');

class RecordsController extends AppController {

    public $helpers = array('Html', 'Form');
    
    public function beforeFilter() {
        parent::beforeFilter();
        // Allow users to register and logout.
        //$this->Auth->allow('add', 'logout');
    }

    public function index() {
        /*$this->Record->recursive = 0;
        $this->Record->Behaviors->load('Containable');
        $query_options = array(
            'fields' => array("Record.uuid", "Record.date", "Record.hour", "Record.type"),
            'contain' => array(
                'Employees' => array(
                    'fields' => array('Employees.nameEmployee'),
                ),
            ),
        );


        $this->set('records', $this->Record->find('all', $query_options));*/
        
         $this->loadModel("Record");
         $this->set('records', $this->Record->getTables());
        
    }

}
