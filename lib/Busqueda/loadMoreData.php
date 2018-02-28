<?php

include_once '../config/conexion.php';

$sql = "SELECT * FROM tdepto
         WHERE coddepto < '" . $_GET['last_id'] . "' ORDER BY coddepto DESC LIMIT 8";

$obj_conexion = new BD();
$link = $obj_conexion->conectar();

$filas = $obj_conexion->NumeroFilas($sql, $link);

if ($filas > 0) {
    $resul = $obj_conexion->ResultSet($sql, $link);
    include('data.php');
} else {
    echo "vacio";
}
?>