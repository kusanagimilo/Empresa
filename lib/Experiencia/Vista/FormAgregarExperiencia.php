<div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">AGREGAR EXPERIENCIA LABORAL</h4>
        </div>
        <div class="modal-body">
            <table class="table table-bordered table-responsive">

                <tbody>
                    <tr>
                        <td>Empresa</td>
                        <td><input type="text" class="form-control" id="empresa_l" name="empresa_l" placeholder="EMPRESA" ></td>
                    </tr>
                    <tr>
                        <td>Departamento</td>
                        <td>
                            <select class="form-control" id="departamento_l" name="departamento_l">
                                <option value="">Seleccione</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Sector de la empresa</td>
                        <td><input type="text" class="form-control" id="sector_l" name="sector_l" placeholder="SECTOR EMPRESA" ></td>
                    </tr>
                    <tr>
                        <td>Cargo que desempeño</td>
                        <td><input type="text" class="form-control" id="cargo_l" name="cargo_l" placeholder="CARGO" ></td>
                    </tr>
                    <tr>
                        <td>Area en la cual trabajo</td>
                        <td><input type="text" class="form-control" id="area_l" name="area_l" placeholder="AREA" ></td>
                    </tr>
                    <tr>
                        <td>Estado trabajo</td>
                        <td>
                            <select id="estado_trabajo_l" onchange="SeleccionEstadoTrabajo()" class="form-control">
                                <option value="">Seleccione</option>
                                <option value="Culminado">Culminado</option>
                                <option value="Actualmente">Actualmente</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Fecha inicio</td>
                        <td><div id="fi_cont"></div></td>
                    </tr>
                    <tr>
                        <td>Fecha fin</td>
                        <td><div id="ffi_cont"></div></td>
                    </tr>
                    <tr>
                        <td>Funcion</td>
                        <td><textarea id="funcion_l" name="funcion_l"></textarea></td>
                    </tr>
                    <tr>
                        <td>Certificado laboral</td>
                        <td><input type="file" class="form-control" id="certificado_l" name="certificado_l" placeholder="Certificado laboral" ></td>
                    </tr>
                    <tr>
                        <td colspan="2"><input type="button" class="btn btn-default" value="Agregar experiencia" onclick="AdicionarExperiencia()"></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="modal-footer">
            <button type="button"  class="btn btn-default" data-dismiss="modal">Cerrar</button>
        </div>
    </div>

</div>
<script>
    ListaDepartamentos('departamento_l');
</script>