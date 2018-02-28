<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Experiencia
 *
 * @author JuanCamilo
 */
include_once '../../config/conexion.php';

class Experiencia {

    public function AlmacenarExperienciaLaboral($data) {

        $obj_bd = new BD();
        $link = $obj_bd->conectar();


        for ($index = 0; $index < count($data['arreglo_experiencia_empresas']); $index++) {

            $fecha_fin = null;

            if ($data['arreglo_experiencia_fecha_fin'][$index] != "no_aplica") {
                $fecha_fin = $data['arreglo_experiencia_fecha_fin'][$index];
            }

            $arreglo_experiencia = array(":id_hoja_vida" => $data['id_hoja_vida'],
                ":empresa" => $data['arreglo_experiencia_empresas'][$index],
                ":cargo" => $data['arreglo_experiencia_cargo'][$index],
                ":area" => $data['arreglo_experiencia_area'][$index],
                ":sector_empresa" => $data['arreglo_experiencia_sector'][$index],
                ":fecha_inicio" => $data['arreglo_experiencia_fecha_inicio'][$index],
                ":fecha_fin" => $fecha_fin,
                ":id_depto" => $data['arreglo_experiencia_departamento'][$index],
                ":funcion" => $data['arreglo_experiencia_funcion'][$index],
                ":estado" => $data['arreglo_experiencia_estado'][$index]);


            //return var_dump($arreglo_experiencia);
            
            $sql_insert_experiencia = "INSERT INTO experiencia(id_hoja_vida,empresa,cargo,area,sector_empresa,
                                        fecha_inicio,fecha_fin,id_depto,funcion,estado)
                                        VALUES(:id_hoja_vida,:empresa,:cargo,:area,:sector_empresa,
                                        :fecha_inicio,:fecha_fin,:id_depto,:funcion,:estado)";

            $resul_almacena_experiencia = $link->prepare($sql_insert_experiencia);
            $ejecucion_almacena_experiencia = $resul_almacena_experiencia->execute($arreglo_experiencia);
        }

        if ($ejecucion_almacena_experiencia) {
            return "bien";
        } else {
            return "mal";
        }
    }

}
