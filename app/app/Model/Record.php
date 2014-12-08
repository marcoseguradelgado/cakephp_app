<?php

App::uses('AppModel', 'Model');

class Record extends AppModel {

    var $name = "Record";

    public function getTables() {
        return $this->query("SELECT e.nameEmployee, r.date, r.hour, r.type, r.uuid FROM employees e, records r WHERE e.uuid = r.uuid;"); // if table name is `locations`
    }

}
