<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Persona
 *
 * @author juan.cruz
 */
include_once '../../config/conexion.php';

class Persona {

    public function AlmacenarDatosPersona($data) {
        $obj_bd = new BD();
        $link = $obj_bd->conectar();

        $fecha_nacimiento = $data['anio'] . "-" . $data['mes'] . "-" . $data['dia'];

        $id_documento = 1;

        $arreglo_editar = array(":id_persona" => $data['id_persona'],
            ":nombres" => $data['nombres'],
            ":apellidos" => $data['apellidos'],
            ":correo" => $data['correo'],
            ":fecha_nacimiento" => $fecha_nacimiento,
            ":genero" => $data['genero'],
            ":estado_civil" => $data['estado_civil'],
            ":telefono1" => $data['telefono1'],
            ":telefono2" => $data['telefono2'],
            ":direccion" => $data['direccion'],
            ":foto" => $id_documento,
            ":id_departamento" => $data['departamento'],
            ":id_municipio" => $data['municipio'],
            ":tipo_identificacion" => $data['tipo_identificacion'],
            ":identificacion" => $data['identificacion']);




        $sql_editar = "UPDATE persona SET 
                       nombres=:nombres,
                       apellidos=:apellidos,
                       correo=:correo,
                       fecha_nacimiento=:fecha_nacimiento,
                       genero=:genero,
                       estado_civil=:estado_civil,
                       telefono1=:telefono1,
                       telefono2=:telefono2,
                       direccion=:direccion,
                       foto=:foto,
                       id_departamento=:id_departamento,
                       id_municipio=:id_municipio,
                       tipo_identificacion=:tipo_identificacion,
                       identificacion=:identificacion
                       WHERE id_persona=:id_persona";

        $result = $link->prepare($sql_editar);
        $ejecucion = $result->execute($arreglo_editar);



        if ($ejecucion) {

            return $data['id_persona'];
        } else {
            return "mal";
        }
    }

}
