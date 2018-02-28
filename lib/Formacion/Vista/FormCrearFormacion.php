<div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">AGREGAR FORMACION</h4>
        </div>
        <div class="modal-body">
            <table class="table table-bordered table-responsive">

                <tbody>
                    <tr>
                        <td>Centro educativo</td>
                        <td><input type="text" class="form-control" id="centro_educativo_f" name="centro_educativo_f" placeholder="CENTRO EDUCATIVO" ></td>
                    </tr>
                    <tr>
                        <td>Nivel de estudios</td>
                        <td><input type="text" class="form-control" id="nivel_estudio_f" name="nivel_estudio_f" placeholder="NIVEL ESTUDIOS" ></td>
                    </tr>
                    <tr>
                        <td>Titulo obtenido</td>
                        <td><input type="text" class="form-control" id="titulo_obtenido_f" name="titulo_obtenido_f" placeholder="TITULO_OBTENIDO" ></td>
                    </tr>
                    <tr>
                        <td>Estado del estudio</td>
                        <td>
                            <select id="estado_estudio_f"  name="estado_estudio_f" onchange="SeleccionEstadoEstudio()" class="form-control">
                                <option value="">Seleccione</option>
                                <option value="Culminado">Culminado</option>
                                <option value="Actualmente">Actualmente</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Fecha inicio</td>
                        <td><div id="fie_cont"></div></td>
                    </tr>
                    <tr>
                        <td>Fecha fin</td>
                        <td><div id="ffie_cont"></div></td>
                    </tr>
                    <tr>
                        <td>Diploma o acta de grado</td>
                        <td><input type="file" class="form-control" id="certificado_es_f" name="cartificado_es_f" placeholder="Diploma o acta" ></td>
                    </tr>
                    <tr>
                        <td colspan="2"><input type="button" class="btn btn-default" value="Agregar Formacion" onclick="AdicionarFormacion()"></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="modal-footer">
            <button type="button"  class="btn btn-default" data-dismiss="modal">Cerrar</button>
        </div>
    </div>

</div>