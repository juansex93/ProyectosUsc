<?php

include_once '../../webService/CRUD/CRUD.php';

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $crud = new crud();
    $usuario = $_SESSION['usuario'];
    $imagen_default = "https://www.gravatar.com/avatar/" . md5(strtolower(trim($usuario))) . "?d=mp";

    $query = "UPDATE clientes SET imagen_perfil = ? WHERE usuario = ?";
    $params = [$imagen_default, $usuario];

    if ($crud->actualizar($query, $params)) {
        echo "Completado";
    } else {
        echo "Ha ocurrido un error al actualizar la contraseña.";
    }

}
?>