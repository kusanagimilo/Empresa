<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include '../Modelo/HojaVida.php';
$obj_hoja_vida = new HojaVida();
$opcion = $_POST['opcion'];

if ($opcion == 'InformacionHojaVida') {
    $resultado = $obj_hoja_vida->InformacionHojaVida($_POST);
    echo $resultado;
}

if ($opcion == 'AlmacenarDataHojaVida') {
    $resultado = $obj_hoja_vida->AlmacenarDataHojaVida($_POST);
    echo $resultado;
}


