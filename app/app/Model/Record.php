<?php

App::uses('AppModel', 'Model');

class Record extends AppModel
{

    var $name = "Record";

    public function getTables()
    {
        return $this->query("SELECT e.nameEmployee, r.uuid, GROUP_CONCAT(DISTINCT r.type ORDER BY r.type ASC SEPARATOR ',') as type, r.date, GROUP_CONCAT(DISTINCT r.hour ORDER BY r.hour ASC SEPARATOR ',') as hour FROM records r, employees e WHERE e.uuid = r.uuid GROUP BY date, uuid");
    }
}