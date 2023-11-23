<?php
session_start();
header('Content-Type: application/json');

include_once '../../webService/CRUD/CRUD.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $fullName = isset($_POST['fullName']) ? $_POST['fullName'] : '';
    $phone = isset($_POST['phone']) ? $_POST['phone'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';

    $usuario = $_SESSION['usuario'];

    // Crea una instancia de tu clase CRUD
    $crud = new crud();


    $result = $crud->actualizarDatosUsuario($usuario, $fullName, $phone, $email);

    if ($result) {
        echo json_encode(['status' => 'success', 'message' => 'Información actualizada correctamente']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'No se pudo actualizar la información']);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Método de solicitud no válido']);
}
?>