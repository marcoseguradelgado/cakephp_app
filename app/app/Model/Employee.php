<?php

App::uses('AppModel', 'Model');

class Employee extends AppModel
{

    var $name = "Employee";

    public function getRecentId($id)
    {

        return $this->query("SELECT nameEmployee, IdEmployee from employees where IdEmployee = " . $id);
    }

    public function getUpdatedId($name,$id)
    {

        return $this->query("UPDATE employees SET nameEmployee = '" . $name."' WHERE IdEmployee = ".$id);
    }
}

