<?php

include 'CRUD/CRUD.php';

class gettest {

    function __construct() {
        
    }

    function consultar_test() {

        $crud = new crud();

        $resp = $crud->consultar("select * from empleado;");
        header('Content-Type: application/json');
        echo json_encode($resp);
        
        
        foreach ($resp as $row) {
            print_r("\n\n");
            print($row->id_empleado);
            print "\n";
            print($row->nombres);
            print "\n";
        }
    }

}

$getest = new gettest();
$getest->consultar_test();
?>