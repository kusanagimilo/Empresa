<?php

//include_once '../../config/conexion.php';
//
//$sql = "SELECT * FROM tdepto
//         WHERE coddepto < '" . $_GET['last_id'] . "' ORDER BY coddepto DESC LIMIT 8";
//
//$obj_conexion = new BD();
//$link = $obj_conexion->conectar();
//
//$filas = $obj_conexion->NumeroFilas($sql, $link);
//
//if ($filas > 0) {
//    $resul = $obj_conexion->ResultSet($sql, $link);
//    include('data.php');
//} else {
//    echo "vacio";
//}

include '../Modelo/Utilidades.php';
$obj_utilidad_m = new Utilidades();
$resultado = $obj_utilidad_m->BusquedaMore($_REQUEST);
if ($resultado['filas'] > 0) {
    $resul = $resultado['datos'];
    include('data.php');
    //echo $resultado['sql'];
} else {
    echo "vacio";
}
?>