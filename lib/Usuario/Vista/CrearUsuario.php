<div class="panel panel-info" >
    <div class="panel-heading">
        <div class="panel-title">Crear usuario</div>

    </div>
    <div class="panel-body">
        <form style="margin: 1% 1% 1% 1%;" class="form-horizontal"  role="form" method="POST" action="#">
            <br style="clear:both">



            <div class="form-group">
                <label class="col-md-2 control-label" for="textinput">Nombres : </label>  
                <div class="col-md-7">
                    <input type="text" class="form-control" id="nombres" name="nombres" placeholder="Nombres" required>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-2 control-label" for="textinput">Apellidos : </label>  
                <div class="col-md-7">
                    <input type="text" class="form-control" id="apellidos" name="apellidos" placeholder="Apellidos" required>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-2 control-label" for="textinput">Rol : </label>  
                <div class="col-md-7">
                    <select class="form-control" id="rol" name="rol" required>
                        <option value="">--Seleccione el rol--</option>
                        <option value="Administrador">Administrador</option>
                        <option value="Operario">Operario</option>
                        <option value="Visualizador">Visualizador</option>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-2 control-label" for="textinput">Correo : </label>  
                <div class="col-md-7">
                    <input type="email" class="form-control" id="correo" name="correo" placeholder="Correo" required>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label" for="textinput">Telefono : </label>  
                <div class="col-md-7">
                    <input type="text" class="form-control" id="telefono" name="telefono" placeholder="Telefono" required>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label" for="textinput">Clave : </label>  
                <div class="col-md-7">
                    <input type="password" class="form-control" id="clave" name="clave" placeholder="Clave" required>
                </div>
            </div>

            <div class="form-group">

                <div class="col-md-10">
                    <center>
                        <input type="button" value="Crear usuario" class="btn btn-default" onclick="AlmacenarUsuario()">

                    </center>
                </div>
            </div>


        </form>
    </div>
</div>
