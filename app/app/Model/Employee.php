<?php

App::uses('AppModel', 'Model');

class Employee extends AppModel {

    public $actsAs = array('Containable');
    var $name = "Employee";

}
