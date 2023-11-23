<?php

include_once 'conection.php';


class crud
{

    function __construct()
    {
    }


    function actualizarContra($usuario, $nuevaContraseña)
    {
        $conexion = new conexion();
        $pdo = $conexion->conect();

        // Asegúrate de hashear la nueva contraseña antes de guardarla en la base de datos
        $nuevaContraseñaHash = password_hash($nuevaContraseña, PASSWORD_DEFAULT);

        $query = "UPDATE clientes SET contrasena = ? WHERE usuario = ?";
        $params = [$nuevaContraseñaHash, $usuario];

        $sql = $pdo->prepare($query);
        $result = $sql->execute($params);

        return $result;
    }


    function getData($tableName)
    {
        $conexion = new conexion();
        $pdo = $conexion->conect();
        $sql = $pdo->prepare("SELECT * FROM $tableName");
        $sql->execute();
        $rows = $sql->fetchAll(\PDO::FETCH_ASSOC);

        // echo json_encode($rows);
        // echo '<script>console.log(' . json_encode($rows) . ');</script>';
        return $rows;
    }


    function consultar($query, $params = [])
    {
        $conexion = new conexion();
        $pdo = $conexion->conect();
        $stmt = $pdo->prepare($query);
        $stmt->execute($params);
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $rows;
    }

    function getUserInfo($username)
    {
        $crud = new crud();
        $query = "SELECT id_cliente, nombre, imagen_perfil, telefono, correo  FROM clientes WHERE usuario = ?";
        $params = [$username];
        $resultados = $crud->consultar($query, $params);

        return $resultados[0] ?? null;
    }

    function checkUserSession()
    {
        session_start();
        if (isset($_SESSION['usuario'])) {
            return $this->getUserInfo($_SESSION['usuario']);
        }
        return null;
    }

    function insertar($query, $params = [])
    {
        $conexion = new conexion();
        $pdo = $conexion->conect();
        $sql = $pdo->prepare($query);

        $result = $sql->execute($params);

        if ($result) {
            return "Registro insertado correctamente.";
        } else {
            return "Error al insertar el registro.";
        }
    }


    function actualizar($query, $params = [])
    {
        $conexion = new conexion();
        $pdo = $conexion->conect();
        $sql = $pdo->prepare($query);

        // Ejecuta la consulta con los parámetros
        $result = $sql->execute($params);

        if ($result) {
            return "Registro actualizado correctamente.";
        } else {
            return "Error al actualizar el registro.";
        }
    }

    function eliminar($sql)
    {
        $conexion = new conexion();
        $pdo = $conexion->conect();
        $sql = $pdo->prepare($sql);
        $result = $sql->execute();

        if ($result) {
            return "Registro eliminado correctamente.";
        } else {
            return "Error al eliminar el registro.";
        }
    }

    function actualizarImagenPerfil($usuario, $imagenUrl)
    {
        // echo "<script>console.log('Usuario: " . $usuario . "');</script>";
        $conexion = new conexion();
        $pdo = $conexion->conect();
        $stmt = $pdo->prepare("UPDATE clientes SET imagen_perfil = :imagenUrl WHERE usuario = :usuario");
        return $stmt->execute(['imagenUrl' => $imagenUrl, 'usuario' => $usuario]);
    }

    function actualizarDatosUsuario($usuario, $fullName, $phone, $email)
    {
        $conexion = new conexion();

        $pdo = $conexion->conect();

        $sql = "UPDATE clientes SET nombre = :fullName, telefono = :phone, correo = :email WHERE usuario = :usuario";
        $stmt = $pdo->prepare($sql);

        $stmt->bindParam(':fullName', $fullName);
        $stmt->bindParam(':phone', $phone);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':usuario', $usuario);

        return $stmt->execute();
    }


}