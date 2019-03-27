<div class="c-header">
    <h2>Registro de Usuarios</h2>
</div>
<form id="registroUsuarios" role="form" data-toggle="validator">
<div class="card">
    <div class="card-body card-padding">
        <div class="row">
            <div class="input-group">
                <span class="input-group-addon"><i class="zmdi zmdi-account"></i></span>
                <div class="fg-line">
                    <input type="text" name="nombre" id="nombre" class="form-control " placeholder="Nombre del empleado" required>
                </div>
            </div>
            <br/>

            <div class="input-group">
                <span class="input-group-addon"><i class="zmdi zmdi-email"></i></span>
                <div class="fg-line">
                    <input type="number" name="identificacion" id="identificacion" class="form-control" placeholder="identificacion" required>
                </div>
            </div>
            <br/>

            <div class="input-group">
                <span class="input-group-addon"><i class="zmdi zmdi-email"></i></span>
                <div class="fg-line">
                    <input type="email" name="email" id="email" class="form-control" placeholder="Correo" required>
                </div>
            </div>
            <br/>

            <div class="input-group">
                <span class="input-group-addon"><i class="zmdi zmdi-key zmdi-hc-fw"></i></span>
                <div class="fg-line">
                    <label class="sr-only" for="exampleInputEmail2">Direccion</label>
                    <input type="text" name="direccion" id="direccion" class="form-control" placeholder="Direccion" required>
                </div>
            </div>
            
            <br/>
            <div class="input-group">
                <span class="input-group-addon"><i class="zmdi zmdi-key zmdi-hc-fw"></i></span>
                <div class="fg-line">
                    <label class="sr-only" for="exampleInputEmail2">Direccion</label>
                    <input type="text" name="telefono" id="telefono" class="form-control" placeholder="Telefono" required>
                </div>
            </div>

            <br/>
            <div class="input-group">
                
                <span class="input-group-addon col-sm-1"><i class="zmdi zmdi-key zmdi-hc-fw"></i></span>
                <div class="col-sm-3 m-b-25">
                <select class="selectpicker" id="cargo" name="cargo" placeholder="Seleccione un cargo...">
                    <option value="0">Seleccione un cargo...</option>
                    <option value="1">Administrador</option>
                    <option value="2">Auxiliar</option>
                </select>
            </div>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="card">
        <div class="card-body card-padding">
            <div class="row">
                <div class="input-group">
                    <span class="input-group-addon"><i class="zmdi zmdi-account"></i></span>
                    <div class="fg-line">
                        <label class="sr-only" for="exampleInputUsername2">Username</label>
                        <input type="text" name="username" id="username" class="form-control" placeholder="Nombre de usuario" required>
                    </div>
                </div>

                <br/>
                <div class="input-group">
                    <span class="input-group-addon"><i class="zmdi zmdi-key zmdi-hc-fw"></i></span>
                    <div class="fg-line">
                        <label class="sr-only" for="exampleInputEmail2">Contraseña</label>
                        <input type="password" name="password" id="password" class="form-control" placeholder="Contraseña" required>
                    </div>
                </div>

                <br/>
                <div class="col-sm-12">
                    <div class="btn-colors btn-demo" style="float:right !important;">
                        <button type="button" class="btn palette-Red bg" 	onclick="cancelar()">Cancelar</button>		
                        <button type="button" class="btn palette-Blue bg" onclick="guardar()">Guardar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
<div>
</form>

<script src="<?php echo base_url(); ?>assets/vendors/bootstrap-growl/bootstrap-growl2.min.js"></script>
<link href="<?php echo base_url(); ?>assets/vendors/bootstrap-growl/jquery.growl.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>assets/vendors/bower_components/bootstrap-select/dist/css/bootstrap-select.css" rel="stylesheet">
<script src="<?php echo base_url(); ?>assets/vendors/bower_components/bootstrap-select/dist/js/bootstrap-select.js"></script>
<script> 
    var baseurl = "<?php echo base_url(); ?>"
</script>

<script src="<?php echo base_url(); ?>assets/js/Datos/Usuario/Usuario.js"></script>

