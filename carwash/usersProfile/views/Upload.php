<?php
session_start();
header('Content-Type: application/json');
ini_set('display_errors', 0); // Desactiva la impresión de errores para evitar que se mezclen con la respuesta JSON
error_reporting(E_ALL);

require_once '../../Config.php';
include_once '../../webService/CRUD/CRUD.php';

try {
    if (!isset($_SESSION['usuario']) || !isset($_FILES['profileImage'])) {
        throw new Exception('No autorizado o ningún archivo enviado.');
    }

    $usuario = $_SESSION['usuario'];
    $uploadDir = '../../resources/';
    $uploadFile = $uploadDir . basename($_FILES['profileImage']['name']);
    $imageFileType = strtolower(pathinfo($uploadFile, PATHINFO_EXTENSION));
    $newFileName = $usuario . '_' . time() . '.' . $imageFileType;
    $newFilePath = $uploadDir . $newFileName;

    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }

    // Intenta mover el archivo subido al directorio de destino
    if (!move_uploaded_file($_FILES['profileImage']['tmp_name'], $newFilePath)) {
        throw new Exception('Hubo un error subiendo tu archivo.');
    }

    $crud = new crud();
    if (!$crud->actualizarImagenPerfil($usuario, $newFilePath)) {
        unlink($newFilePath);
        throw new Exception('Error al actualizar la base de datos.');
    }

    echo json_encode(['status' => 'success', 'newImagePath' => $newFilePath]);
} catch (Exception $e) {
    echo json_encode(['status' => 'error', 'message' => $e->getMessage()]);
    exit;
}
?>