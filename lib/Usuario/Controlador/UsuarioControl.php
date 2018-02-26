<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include '../Modelo/Usuario.php';
$obj_usuario = new Usuario();
$opcion = $_POST['opcion'];

if ($opcion == 'AlmacenarUsuario') {



    $resultado = $obj_usuario->CrearUsuario($_POST);
    echo $resultado;
}

//
//if ($opcion == 'AdministrarUsuario') {
//    $resultado = $obj_usuario->AdministrarUsuario($_POST);
//    echo $resultado;
//}
if ($opcion == 'LogIn') {
    $resultado = $obj_usuario->Login($_POST);
    if ($resultado == 3) {
        echo "<script>alert('Revise sus datos de acceso');window.location= '../../../login.html';</script>";
    } else if ($resultado == 2) {
        echo "<script>alert('Su usuario se encuentra inactivo');window.location= '../../../login.html';</script>";
    }
}
