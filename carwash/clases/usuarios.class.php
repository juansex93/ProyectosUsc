<?php

include '../webService/CRUD/CRUD.php';

class usuarios
{

    function __construct()
    {

    }

    function insertarUsuario($id_usuario, $usuario, $password)
    {
        try {
            // Comprobar si la solicitud es POST
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                // Obtener los datos enviados en la solicitud POST
                $crud = new crud();
                $sql = "INSERT INTO usuarios (id_usuario, usuario, password ) VALUES ($id_usuario, '$usuario', '$password')";
                $response = $crud->insertar($sql);

            } else {
                // Si no es una solicitud POST, devolver un mensaje de error
                header('HTTP/1.1 405 Method Not Allowed');
                echo 'Método no permitido.';
            }
        } catch (PDOException $e) {
            $response = array(
                "success" => false,
                "message" => "Error: " . $e->getMessage()
            );
            // Devolver la respuesta en formato JSON en caso de error
            header('Content-Type: application/json');
            echo json_encode($response);
        }
    }

    function obtenerUsuarios($usuario, $password)
    {


        $crud = new crud();

        $resp = $crud->consultar("select * from usuarios where usuario = " + $usuario + " password = " + $password + ";");
        header('Content-Type: application/json');
        echo json_encode($resp);
    }
}


// Crear una instancia de la clase 'crud'
$ejemploPost = new usuarios();
// Llamar a la función 'insertarUsuario' para manejar la solicitud POST

$id_vehi = "11";
$tipo_vehi = "moto";
$tipo_servi = "particular";

$ejemploPost->insertarUsuario($_POST['id_vehi'], $_POST['tipo_vehi'], $_POST['tipo_servi']);
