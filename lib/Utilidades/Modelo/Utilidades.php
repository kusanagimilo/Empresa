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

}
