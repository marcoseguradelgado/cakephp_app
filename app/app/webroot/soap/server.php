<?php

header("content-type:application/json");
$today = date("d/m/Y H:i");

$link = mysql_connect('localhost', 'root', 'marco123');
mysql_select_db('cakephp_appDB', $link);

if (isset($_POST['typeFunction'])) {

    $type = $_POST['typeFunction'];

    if ($type == 'inicial') {

        if (isset($_POST['macAddress'])) {


            $query = 'SELECT nameEmployee FROM employees WHERE uuid = "' . $_POST['macAddress'] . '"';
            $result = mysql_query($query, $link);

            $name = '';
            while ($row = mysql_fetch_assoc($result)) {
                $name = $row['nameEmployee'];
                $query = 'SELECT type,hour FROM records WHERE uuid ="' . $_POST['macAddress'] . '" AND date ="' . date("d/m/Y") . '"';
                $results = mysql_query($query, $link);
                $registerIn = '0';
                $registerOut = '0';
                while ($rows = mysql_fetch_assoc($results)) {
                    if ($rows['type'] == 'in') {
                        $registerIn = date("d/m/Y") . " " . $rows['hour'];
                    }

                    if ($rows['type'] == 'out') {
                        $registerOut = date("d/m/Y") . " " . $rows['hour'];
                    }
                }
                $values = array('name' => $name, 'registerIn' => $registerIn, 'registerOut' => $registerOut);
            }
            if ($name != '')
                deliverResponse(200, $values);
            else
                deliverResponse(400, "Invalid request");


        } else {
            deliverResponse(400, "Invalid request");
        }

    } else if ($type == 'register') {

        if (isset($_POST['uuid']) && isset($_POST['idEmployee']) && isset($_POST['nameEmployee'])) {
            $query = 'INSERT INTO employees (IdEmployee,nameEmployee,uuid) VALUES (' . $_POST['idEmployee'] . ',"' . $_POST['nameEmployee'] . '","' . $_POST['uuid'] . '")';
            $result = mysql_query($query, $link);
            if ($result)
                deliverResponse(200, "Correct");
            else
                deliverResponse(400, "Cédula del empleado ya existe registrada a otro teléfono");
        }

    } else if ($type == 'registerIn') {

        $query = 'INSERT INTO records (uuid,date,type,hour) VALUES ("' . $_POST['uuid'] . '","' . date("d/m/Y") . '","in","' . date("H:i") . '")';
        $result = mysql_query($query, $link);
        deliverResponse(200, $today);

    } else if ($type == 'registerOut') {
        $query = 'INSERT INTO records (uuid,date,type,hour) VALUES ("' . $_POST['uuid'] . '","' . date("d/m/Y") . '","out","' . date("H:i") . '")';
        $result = mysql_query($query, $link);
        deliverResponse(200, $today);

    }

}
mysql_close($link);

function deliverResponse($status, $data)
{

    $response['status'] = $status;
    $response['data'] = $data;

    echo json_encode($response);

}
