<?php

include_once 'conection.php';


class crud
{

    function __construct()
    {
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


    function consultar($sql)
    {

        $conexion = new conexion();
        $pdo = $conexion->conect();
        $sql = $pdo->prepare($sql);
        $rows = $sql->fetchAll(\PDO::FETCH_ASSOC);

        return $rows;
    }

    function insertar($sql)
    {
        $conexion = new conexion();
        $pdo = $conexion->conect();
        $sql = $pdo->prepare($sql);
        $result = $sql->execute();

        if ($result) {
            return "Registro insertado correctamente.";
        } else {
            return "Error al insertar el registro.";
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


}