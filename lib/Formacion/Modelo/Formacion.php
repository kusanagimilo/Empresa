<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Formacion
 *
 * @author JuanCamilo
 */
include_once '../../config/conexion.php';

class Formacion {

    public function AlmacenarFormacion($data) {

        $obj_bd = new BD();
        $link = $obj_bd->conectar();


        for ($index = 0; $index < count($data['arreglo_formacion_centro']); $index++) {

            $fecha_fin = null;

            if ($data['arreglo_formacion_fecha_fin'][$index] != "no_aplica") {
                $fecha_fin = $data['arreglo_formacion_fecha_fin'][$index];
            }

            $arreglo_formacion = array(":id_hoja_vida" => $data['id_hoja_vida'],
                ":centro_educativo" => $data['arreglo_formacion_centro'][$index],
                ":nivel_estudio" => $data['arreglo_formacion_nivel'][$index],
                ":titulo_obtenido" => $data['arreglo_formacion_titulo'][$index],
                ":estado" => $data['arreglo_formacion_estado'][$index],
                ":fecha_inicio" => $data['arreglo_formacion_fecha_inicio'][$index],
                ":fecha_fin" => $fecha_fin);


            //return var_dump($arreglo_experiencia);

            $sql_insert_formacion = "INSERT INTO formacion(id_hoja_vida,centro_educativo,nivel_estudio,titulo_obtenido,
                                        estado,fecha_inicio,fecha_fin)
                                        VALUES(:id_hoja_vida,:centro_educativo,:nivel_estudio,:titulo_obtenido,
                                        :estado,:fecha_inicio,:fecha_fin)";

            $resul_almacena_formacion = $link->prepare($sql_insert_formacion);
            $ejecucion_almacena_formacion = $resul_almacena_formacion->execute($arreglo_formacion);
        }

        if ($ejecucion_almacena_formacion) {
            return "bien";
        } else {
            return "mal";
        }
    }

}
