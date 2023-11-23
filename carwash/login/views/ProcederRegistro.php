<?php
require_once '../../webService/CRUD/CRUD.php';

try {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $nombre = isset($_POST['name']) ? $_POST['name'] : '';
        $correo = isset($_POST['email']) ? $_POST['email'] : '';
        $usuario = isset($_POST['username']) ? $_POST['username'] : '';

        $crud = new crud();

        $queryVerificar = "SELECT * FROM clientes WHERE usuario = ? OR correo = ?";
        $paramsVerificar = [$usuario, $correo];
        $resultadoVerificacion = $crud->consultar($queryVerificar, $paramsVerificar);

        if (count($resultadoVerificacion) > 0) {
            echo "Usuario o correo ya registrado.";
        } else {
            $telefono = isset($_POST['phone']) ? $_POST['phone'] : '';
            $contrasena = password_hash($_POST['password'], PASSWORD_DEFAULT);

            $query = "INSERT INTO clientes (nombre, correo, usuario, telefono, contrasena) VALUES (?, ?, ?, ?, ?)";
            $params = [$nombre, $correo, $usuario, $telefono, $contrasena];

            $resultado = $crud->insertar($query, $params);
            echo $resultado;
        }
    }
} catch (PDOException $e) {
    error_log($e->getMessage()); // Guarda el error en los registros del servidor
    echo "Ha ocurrido un error al procesar su solicitud.";
}
?>