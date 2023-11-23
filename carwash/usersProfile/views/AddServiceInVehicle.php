<?php
session_start();
include_once '../../webService/CRUD/CRUD.php';
header('Content-Type: application/json');
$usuarioInfo = $_SESSION['usuario_info'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $idVehiculo = $_POST['id_vehiculo'];
    $idCliente = $usuarioInfo['id_cliente'];
    $precio = $_POST['tipo_servicio'];
    $fechaActual = date('Y-m-d');

    $crud = new crud();

    $queryCheck = "SELECT * FROM registros WHERE id_vehiculo = ? AND id_cliente = ?";
    $vehiculoExistente = $crud->consultar($queryCheck, [$idVehiculo, $idCliente]);

    if ($vehiculoExistente) {
        echo json_encode(['status' => 'error', 'message' => 'El vehículo ya está registrado en registros.']);
    } else {
        $queryInsert = "INSERT INTO registros (id_vehiculo, id_cliente, precio, fecha_ingreso) VALUES (?, ?, ?, ?)";
        $params = [$idVehiculo, $idCliente, $precio, $fechaActual];
        if ($crud->insertar($queryInsert, $params)) {
            echo json_encode(['status' => 'success', 'message' => 'Registro exitoso en registros']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Error al registrar en registros']);
        }
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Método no permitido']);
}
?>