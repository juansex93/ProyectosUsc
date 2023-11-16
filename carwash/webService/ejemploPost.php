<?php

include 'CRUD/CRUD.php';

class EjemploPost {

    function __construct() {
        
    }

    function insertarUsuario($id_vehiculo, $tipo_vehiculo, $tipo_servicio) {
        try {
            // Comprobar si la solicitud es POST
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                // Obtener los datos enviados en la solicitud POST
                $crud = new crud();
                $sql = "INSERT INTO vehiculo (id_vehiculo, tipo_vehiculo, tipo_servicio ) VALUES ($id_vehiculo, '$tipo_vehiculo', '$tipo_servicio')";
                $response =  $crud ->insertar($sql);

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
}




// Crear una instancia de la clase 'crud'
$ejemploPost = new EjemploPost();
// Llamar a la función 'insertarUsuario' para manejar la solicitud POST

$id_vehi="11";
$tipo_vehi= "moto";
$tipo_servi= "particular";

$ejemploPost->insertarUsuario($_POST['id_vehi'], $_POST['tipo_vehi'],$_POST['tipo_servi']);
