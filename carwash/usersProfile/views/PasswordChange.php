<?php

include_once '../../webService/CRUD/CRUD.php';

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $crud = new crud();
    $usuario = $_SESSION['usuario'];
    $nuevaContraseña = $_POST['newpassword'];

    if ($crud->actualizarContra($usuario, $nuevaContraseña)) {
        echo "Completado";
    } else {
        echo "Ha ocurrido un error al actualizar la contraseña.";
    }

}
?>