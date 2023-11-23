<?php
require_once '../../webService/CRUD/CRUD.php';

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST['username'];
    $contrasena = $_POST['password'];

    $crud = new crud();

    $query = "SELECT * FROM clientes WHERE usuario = ?";
    $params = [$usuario];
    $resultados = $crud->consultar($query, $params);

    if (count($resultados) > 0) {
        $usuarioData = $resultados[0];

        if (password_verify($contrasena, $usuarioData['contrasena'])) {
            $query = "SELECT nombre, imagen_perfil, id_cliente FROM clientes WHERE usuario = ?";
            $params = [$usuario];
            $informacionUsuario = $crud->consultar($query, $params);

            $_SESSION['usuario'] = $usuarioData['usuario'];
            if (count($informacionUsuario) > 0) {
                $_SESSION['usuario_info'] = $informacionUsuario[0];
                // echo "<script>console.log('Usuario logueado: " . json_encode($informacionUsuario) . "');</script>";

            }
            echo "Inicio de sesión exitoso.";
        } else {
            echo "Usuario o contraseña incorrecta.";
        }
    } else {
        echo "Usuario o contraseña incorrecta.";
    }
}
?>