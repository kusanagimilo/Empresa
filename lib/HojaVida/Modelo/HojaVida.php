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
include '../../Experiencia/Modelo/Experiencia.php';
include '../../Formacion/Modelo/Formacion.php';

class HojaVida {

    public function InformacionHojaVida($data) {

        $arreglo_retorno = array();

        $obj_bd = new BD();
        $link = $obj_bd->conectar();

        $sql_revisa_hjv = "SELECT id_hoja_vida FROM hoja_vida WHERE id_persona = '" . $data['id_persona'] . "'";

        $filas = $obj_bd->NumeroFilas($sql_revisa_hjv, $link);

        if ($filas > 0) {

            $sql_completo = "SELECT per.id_usuario,per.id_persona,per.nombres,per.apellidos,per.correo,per.fecha_nacimiento,per.genero,
per.estado_civil,per.telefono1,per.telefono2,per.direccion,per.id_departamento,per.id_municipio,
per.tipo_identificacion,per.identificacion,hjv.id_hoja_vida,hjv.cargo_hoja_vida,hjv.descripcion_perfil_profesional
FROM persona per
INNER JOIN hoja_vida hjv ON hjv.id_persona = per.id_persona
WHERE per.id_persona = " . $data['id_persona'] . "";
            $resul = $obj_bd->ResultSet($sql_completo, $link);

            $arreglo_retorno["id_persona"] = $resul[0]['id_persona'];
            $arreglo_retorno["id_usuario"] = $resul[0]['id_usuario'];
            $arreglo_retorno["nombres"] = utf8_encode($resul[0]['nombres']);
            $arreglo_retorno["apellidos"] = utf8_encode($resul[0]['apellidos']);
            $arreglo_retorno["correo"] = utf8_encode($resul[0]['correo']);
            $arreglo_retorno["fecha_nacimiento"] = utf8_encode($resul[0]['fecha_nacimiento']);
            $arreglo_retorno["estado_civil"] = utf8_encode($resul[0]['estado_civil']);
            $arreglo_retorno["telefono1"] = utf8_encode($resul[0]['telefono1']);
            $arreglo_retorno["telefono2"] = utf8_encode($resul[0]['telefono2']);
            $arreglo_retorno["direccion"] = utf8_encode($resul[0]['direccion']);
            $arreglo_retorno["id_departamento"] = utf8_encode($resul[0]['id_departamento']);
            $arreglo_retorno["id_municipio"] = utf8_encode($resul[0]['id_municipio']);
            $arreglo_retorno["tipo_identificacion"] = utf8_encode($resul[0]['tipo_identificacion']);
            $arreglo_retorno["identificacion"] = utf8_encode($resul[0]['identificacion']);
            $arreglo_retorno["hv"] = $resul[0]['id_hoja_vida'];
            $arreglo_retorno["cargo_hoja_vida"] = utf8_encode($resul[0]['cargo_hoja_vida']);
            $arreglo_retorno["descripcion_perfil_profesional"] = utf8_encode($resul[0]['descripcion_perfil_profesional']);
            $arreglo_retorno["genero"] = utf8_encode($resul[0]['genero']);
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

                $ultimo_id_hjv = $link->lastInsertId();
                $data["id_hoja_vida"] = $ultimo_id_hjv;


                $obj_experiencia = new Experiencia();
                $retorno_experiencia = $obj_experiencia->AlmacenarExperienciaLaboral($data);

                if ($retorno_experiencia == "bien") {

                    $obj_formacion = new Formacion();
                    $retorno_formacion = $obj_formacion->AlmacenarFormacion($data);

                    if ($retorno_formacion == "bien") {




                        $arreglo_preferencia = array(":id_hoja_vida" => $ultimo_id_hjv,
                            ":disponibilidad_tiempo" => $data['disponibilidad_tiempo'],
                            ":valor_minimo_mensual" => $data['valor_minimo_mensual'],
                            ":disponible_viajar" => $data['disponible_viajar'],
                            ":cambio_residencia" => $data['cambio_residencia'],
                            ":restriccion_transporte" => $data['restriccion_transporte']);


                        $sql_almacenar_preferencia = "INSERT INTO preferencia(id_hoja_vida,disponibilidad_tiempo,valor_minimo_mensual,disponible_viajar,cambio_residencia,restriccion_transporte)
                                  VALUES(:id_hoja_vida,:disponibilidad_tiempo,:valor_minimo_mensual,:disponible_viajar,:cambio_residencia,:restriccion_transporte)";

                        $resul_almacena_preferencia = $link->prepare($sql_almacenar_preferencia);
                        $ejecucion_almacena_preferencia = $resul_almacena_preferencia->execute($arreglo_preferencia);



                        if ($ejecucion_almacena_preferencia) {
                            return "bien";
                        } else {
                            return "mal";
                        }
                    } else {
                        return "mal";
                    }
                } else {
                    return "mal";
                }
            } else {
                return "mal";
            }
        } else {
            return 'mal';
        }
    }

}
