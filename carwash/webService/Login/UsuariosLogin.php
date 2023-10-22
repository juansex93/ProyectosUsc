<?php

include '../CRUD/CRUD.php';
include '../../clases/usuarios.class.php';




$users = new usuarios();
$users->obtenerUsuarios();



?>