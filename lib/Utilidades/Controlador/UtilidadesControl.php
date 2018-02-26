<?php

include '../Modelo/Utilidades.php';
$obj_utilidades = new Utilidades();
$opcion = $_POST['opcion'];

if ($opcion == 'ListaDepartamentos') {
    $resultado = $obj_utilidades->ListaDepartamentos($_POST);
    echo $resultado;
}
if ($opcion == 'ListaMunicipio') {
    $resultado = $obj_utilidades->ListaMunicipio($_POST);
    echo $resultado;
}