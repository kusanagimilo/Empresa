<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of HojaVida
 *
 * @author juan.cruz
 */
include_once '../../config/conexion.php';
include '../../Persona/Modelo/Persona.php';

class HojaVida {

    public function InformacionHojaVida($data) {

        $arreglo_retorno = array();

        $obj_bd = new BD();
        $link = $obj_bd->conectar();

        $sql_revisa_hjv = "SELECT id_hoja_vida FROM hoja_vida WHERE id_persona = '" . $data['id_persona'] . "'";

        $filas = $obj_bd->NumeroFilas($sql_revisa_hjv, $link);

        if ($filas > 0) {
            
        } else {
            $sql_persona = "SELECT * FROM persona WHERE id_persona = '" . $data['id_persona'] . "'";
            $resul = $obj_bd->ResultSet($sql_persona, $link);

            $arreglo_retorno["id_persona"] = $resul[0]['id_persona'];
            $arreglo_retorno["id_usuario"] = $resul[0]['id_usuario'];
            $arreglo_retorno["nombres"] = $resul[0]['nombres'];
            $arreglo_retorno["apellidos"] = $resul[0]['apellidos'];
            $arreglo_retorno["correo"] = $resul[0]['correo'];
            $arreglo_retorno["hv"] = 'N';
        }


        $json = json_encode($arreglo_retorno);
        return $json;
    }

    public function AlmacenarDataHojaVida($data) {
        $obj_bd = new BD();
        $link = $obj_bd->conectar();


        $obj_persona = new Persona();
        $retorno_modifica_persona = $obj_persona->AlmacenarDatosPersona($data);


        if ($retorno_modifica_persona != 'mal') {

            $arreglo_in_hjv = array(":id_persona" => $data['id_persona'],
                ":cargo_hoja_vida" => $data['cargo'],
                ":descripcion_perfil_profesional" => $data['perfil_profesional']);
            
            $sql_almacenar_hjv = "INSERT INTO hoja_vida(id_persona,cargo_hoja_vida,descripcion_perfil_profesional)
                                  VALUES(:id_persona,:cargo_hoja_vida,:descripcion_perfil_profesional)";

            $resul_almacena_hjv = $link->prepare($sql_almacenar_hjv);
            $ejecucion_almacena_hjv = $resul_almacena_hjv->execute($arreglo_in_hjv);

            if ($ejecucion_almacena_hjv) {

                return "bien";
            } else {
                return "mal";
            }
        } else {
            return 'mal';
        }
    }

}
