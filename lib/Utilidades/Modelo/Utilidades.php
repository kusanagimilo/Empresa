<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Utilidades
 *
 * @author juan.cruz
 */
include_once '../../config/conexion.php';

class Utilidades {

    public function ListaDepartamentos($data) {

        $arreglo_retorno = array();

        $obj_conexion = new BD();
        $link = $obj_conexion->conectar();

        $sql = "SELECT * FROM tdepto";
        $resul = $obj_conexion->ResultSet($sql, $link);



        $i = 0;

        foreach ($resul as $key => $value) {
            $arreglo_retorno[$i]["coddepto"] = utf8_encode($value['coddepto']);
            $arreglo_retorno[$i]["nomdepto"] = utf8_encode($value['nomdepto']);
            $i++;
        }



        $json = json_encode($arreglo_retorno);

        return $json;
    }

    public function ListaMunicipio($data) {

        $arreglo_retorno = array();

        $obj_conexion = new BD();
        $link = $obj_conexion->conectar();

        $sql = "SELECT * FROM tpolad WHERE coddepto = '" . $data['coddepto'] . "'";
        $resul = $obj_conexion->ResultSet($sql, $link);

        $i = 0;

        foreach ($resul as $key => $value) {
            $arreglo_retorno[$i]["codmuncpio"] = utf8_encode($value['codmuncpio']);
            $arreglo_retorno[$i]["nommpio"] = utf8_encode($value['nommpio']);
            $i++;
        }

        $json = json_encode($arreglo_retorno);

        return $json;
    }

    public function Busqueda($data) {

        $filtro_profesion = "";
        $filtro_disponibilidad_tiempo = "";
        $filtro_disponibilidad_viajar = "";
        $filtro_transporte = "";

        if ($data['profesion_bus'] != "") {
            $filtro_profesion = " AND hjv.cargo_hoja_vida LIKE '%" . $data['profesion_bus'] . "%' ";
        }

        if ($data['disponibilidad_tiempo_bus'] != "") {
            $filtro_disponibilidad_tiempo = " AND pref.disponibilidad_tiempo = '" . $data['disponibilidad_tiempo_bus'] . "' ";
        }

        if ($data['disponibilidad_viajar_bus'] != "") {
            $filtro_disponibilidad_viajar = " AND pref.disponible_viajar = '" . $data['disponibilidad_viajar_bus'] . "' ";
        }


        if ($data['restriccion_tran_bus'] != "") {
            $filtro_transporte = " AND pref.restriccion_transporte = '" . $data['restriccion_tran_bus'] . "' ";
        }




        $obj_conexion = new BD();
        $link = $obj_conexion->conectar();

        $sql = "SELECT per.id_persona,per.nombres,per.apellidos,hjv.cargo_hoja_vida,hjv.descripcion_perfil_profesional,
hjv.id_hoja_vida,pref.disponibilidad_tiempo,pref.disponible_viajar,pref.restriccion_transporte
FROM persona per
INNER JOIN hoja_vida hjv ON hjv.id_persona = per.id_persona
INNER JOIN preferencia pref ON pref.id_hoja_vida = hjv.id_hoja_vida
$filtro_profesion 
$filtro_disponibilidad_tiempo 
$filtro_disponibilidad_viajar 
$filtro_transporte
";



        $resul = $obj_conexion->ResultSet($sql, $link);

        return $resul;
    }

    public function BusquedaMore($data) {
        $filtro_profesion = "";
        $filtro_disponibilidad_tiempo = "";
        $filtro_disponibilidad_viajar = "";
        $filtro_transporte = "";

        if ($data['profesion_bus'] != "") {
            $filtro_profesion = " AND hjv.cargo_hoja_vida LIKE '%" . $data['profesion_bus'] . "%' ";
        }

        if ($data['disponibilidad_tiempo_bus'] != "") {
            $filtro_disponibilidad_tiempo = " AND pref.disponibilidad_tiempo = '" . $data['disponibilidad_tiempo_bus'] . "' ";
        }

        if ($data['disponibilidad_viajar_bus'] != "") {
            $filtro_disponibilidad_viajar = " AND pref.disponible_viajar = '" . $data['disponibilidad_viajar_bus'] . "' ";
        }

        if ($data['restriccion_tran_bus'] != "") {
            $filtro_transporte = " AND pref.restriccion_transporte = '" . $data['restriccion_tran_bus'] . "' ";
        }




        $obj_conexion = new BD();
        $link = $obj_conexion->conectar();

        $sql = "SELECT per.id_persona,per.nombres,per.apellidos,hjv.cargo_hoja_vida,hjv.descripcion_perfil_profesional,
hjv.id_hoja_vida,pref.disponibilidad_tiempo,pref.disponible_viajar,pref.restriccion_transporte
FROM persona per
INNER JOIN hoja_vida hjv ON hjv.id_persona = per.id_persona
INNER JOIN preferencia pref ON pref.id_hoja_vida = hjv.id_hoja_vida
WHERE hjv.id_hoja_vida < '" . $_GET['last_id'] . "' 
$filtro_profesion 
$filtro_disponibilidad_tiempo 
$filtro_disponibilidad_viajar 
$filtro_transporte
ORDER BY hjv.id_hoja_vida DESC LIMIT 8    
";




        $filas = $obj_conexion->NumeroFilas($sql, $link);


        $resul = $obj_conexion->ResultSet($sql, $link);

        $resul["datos"] = $resul;
        $resul["filas"] = $filas;
        $resul["sql"] = $sql;
        return $resul;
    }

}
