<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Usuario
 *
 * @author JuanCamilo
 */
include_once '../../config/conexion.php';

class Usuario {

    public function CrearUsuario($data) {


        $obj_bd = new BD();
        $link = $obj_bd->conectar();

        $sql_revisa_usuarios = "SELECT id_usuario FROM usuario WHERE nombre_usuario = '" . $data['correo'] . "'";

        $filas = $obj_bd->NumeroFilas($sql_revisa_usuarios, $link);

        if ($filas > 0) {
            return 2;
        } else {

            $clave = hash('sha512', $data['clave']);

            $arreglo_in = array(":nombre_usuario" => $data['correo'],
                ":clave" => $clave,
                ":estado" => 'AC');


            //return var_dump($arreglo_in);

            $sql_insert = "INSERT INTO usuario(
            nombre_usuario,clave,estado)
            VALUES(:nombre_usuario,:clave,:estado);";

            $result = $link->prepare($sql_insert);
            $ejecucion = $result->execute($arreglo_in);


            if ($ejecucion) {

                $ultimo_id_usr = $link->lastInsertId();

                $arreglo_in_persona = array(":nombres" => $data['nombres'],
                    ":apellidos" => $data['apellidos'],
                    ":correo" => $data['correo'],
                    ":id_usuario" => $ultimo_id_usr);


                //return var_dump($arreglo_in_persona);

                $sql_insert_persona = "INSERT INTO persona(nombres,apellidos,correo,id_usuario)
                    VALUES(:nombres,:apellidos,:correo,:id_usuario);";
                $resul_persona = $link->prepare($sql_insert_persona);
                $ejecucion_persona = $resul_persona->execute($arreglo_in_persona);

                if ($ejecucion_persona) {
                    return 1;
                } else {
                    return 3;
                }
            } else {
                return 3;
            }
        }
    }

//    public function AdministrarUsuario() {
//
//        $arreglo_retorno = array();
//
//        $obj_bd = new BD();
//
//        $conexion_bd = $obj_bd->conectar();
//
//
//        $sql_admin_usuarios = "SELECT * FROM usuario";
//        $resul_admin_usuarios = mysqli_query($conexion_bd, $sql_admin_usuarios);
//
//        while ($value = mysqli_fetch_array($resul_admin_usuarios)) {
//            $arreglo_interior = array(utf8_encode($value['nombres']) . " " . utf8_encode($value['apellidos']),
//                $value['correo'],
//                $value['telefono'],
//                $value['rol'],
//                "<input type='button' value='Modificar' onclick='' class='btn btn-default'>
//                <input type='button' value='Eliminar' onclick='' class='btn btn-default'>");
//            array_push($arreglo_retorno, $arreglo_interior);
//        }
//        $json = json_encode($arreglo_retorno);
//
//        return $json;
//    }
    public function Login($data) {
        $obj_bd = new BD();
        $link = $obj_bd->conectar();
        $clave = hash('sha512', $data['clave']);


        $sql = "SELECT us.id_usuario,us.nombre_usuario,per.nombres,per.apellidos,us.estado,us.clave
FROM usuario us
INNER JOIN persona per ON per.id_usuario = us.id_usuario
WHERE us.nombre_usuario = '" . htmlspecialchars($data['correo']) . "'
AND us.clave = '" . $clave . "'";




        $filas = $obj_bd->NumeroFilas($sql, $link);

        if ($filas > 0) {
            $arreglo_usuario = $obj_bd->ResultSet($sql, $link);

            //return var_dump($arreglo_usuario);


            if ($arreglo_usuario[0]['estado'] == 'AC') {

                if ($arreglo_usuario[0]['nombre_usuario'] == $data['correo'] && $arreglo_usuario[0]['clave'] == $clave) {

                    session_start();
                    unset($arreglo_usuario[0]['clave']);
                    $_SESSION['usuario'] = $arreglo_usuario[0];

                    header('Location: ../../../Aplicacion.php');
                } else {
                    return 3;
                }
            } else {
                return 2;
            }
        } else {
            return 3;
        }
    }

}
