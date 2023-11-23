<?php
session_start();
include_once '../../webService/CRUD/CRUD.php';
header('Content-Type: application/json');
$usuarioInfo = $_SESSION['usuario_info'];
// echo json_encode($usuarioInfo['id_cliente']);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $placa = $_POST['placa'];
    $tipoVehiculo = $_POST['tipoVehiculo'];

    $crud = new crud();
    $query = "INSERT INTO vehiculos (placa, tipo_vehiculo, id_cliente ) VALUES (?, ?, ?)";
    $params = [$placa, $tipoVehiculo, $usuarioInfo['id_cliente']];
    if ($crud->insertar($query, $params)) {
        echo json_encode(['status' => 'success', 'message' => 'Registro exitoso']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Error al registrar']);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Método no permitido']);
}
?>