<div class="c-header">
    <h2>Registro de Clientes</h2>
</div>
<form id="registroClientes" role="form" data-toggle="validator">
<div class="card">
    <div class="card-body card-padding">
        <div class="row">
            <div class="col-sm-6">
                <div class="input-group">
                    <span class="input-group-addon"><i class="zmdi zmdi-account"></i></span>
                    <div class="fg-line">
                        <input type="text" name="NombreCliente" id="NombreCliente" class="form-control cobligatorio" placeholder="Primer Nombre" onkeyup="QuitarErrorCampo('NombreCliente')">
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="input-group">
                    <span class="input-group-addon"><i class="zmdi zmdi-account"></i></span>
                    <div class="fg-line">
                        <input type="text" name="SegundoNombre" id="SegundoNombre" class="form-control" placeholder="Seguhndo Nombre">
                    </div>
                </div>
            </div>
            
            <div class="col-sm-6 m-t-20">
                <div class="input-group">
                    <span class="input-group-addon"><i class="zmdi zmdi-email"></i></span>
                    <div class="fg-line">
                        <input type="text" name="ApePaterno" id="ApePaterno" class="form-control cobligatorio" placeholder="Primer Apellido" onkeyup="QuitarErrorCampo('ApePaterno')">
                    </div>
                </div>
            </div>
            <div class="col-sm-6 m-t-20">
                <div class="input-group">
                    <span class="input-group-addon"><i class="zmdi zmdi-email"></i></span>
                    <div class="fg-line">
                        <input type="text" name="ApeMaterno" id="ApeMaterno" class="form-control cobligatorio" placeholder="Segundo Apellido" onkeyup="QuitarErrorCampo('ApeMaterno')">
                    </div>
                </div>
            </div>

            <div class="col-sm-6 m-t-20">
                <div class="input-group">
                    <span class="input-group-addon"><i class="zmdi zmdi-key zmdi-hc-fw"></i></span>
                    <div class="fg-line">
                        <input type="number" name="Identificacion" id="Identificacion" class="form-control cobligatorio" placeholder="Identificacion" onkeyup="QuitarErrorCampo('Identificacion')">
                    </div>
                </div>
            </div>
            <div class="col-sm-6 m-t-20">
                <div class="input-group">
                    <span class="input-group-addon"><i class="zmdi zmdi-account"></i></span>
                    <input type="text" name="FechaNac" id="FechaNac" class="form-control" placeholder="Fecha de Nacimiento">
                </div>
            </div>
           
            <div class="col-sm-6 m-t-20">
                <div class="input-group">
                    <span class="input-group-addon"><i class="zmdi zmdi-key zmdi-hc-fw"></i></span>
                    <div class="fg-line">
                        <input type="text" name="Direccion" id="Direccion" class="form-control" placeholder="Direccion">
                    </div>
                </div>
            </div>
            <div class="col-sm-6 m-t-20">
                <div class="input-group">
                    <span class="input-group-addon"><i class="zmdi zmdi-key zmdi-hc-fw"></i></span>
                    <div class="fg-line">
                        <input type="number" name="Telefono" id="Telefono" class="form-control" placeholder="Telefono">
                    </div>
                </div>
            </div>
            
            <div class="col-sm-6 m-t-20">
                <div class="input-group">
                    <span class="input-group-addon"><i class="zmdi zmdi-key zmdi-hc-fw"></i></span>
                    <div class="fg-line">
                        <input type="email" name="Correo" id="Correo" class="form-control" placeholder="Correo">
                    </div>
                </div>
            </div>
            <div class="col-sm-6 m-t-20">
                <div class="input-group">
                    <span class="input-group-addon"><i class="zmdi zmdi-key zmdi-hc-fw"></i></span>
                    <div class="fg-line">
                        <input type="number" name="Celular" id="Celular" class="form-control" placeholder="Celular">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="card">
        <div class="card-header">
            <h2>Informacion Familiar <small>Aqui podra ingresar la informacion de los hijos dado el caso y que el cliente lo permita</small></h2>
        </div>
        <div class="card-body card-padding">
            <div class="row">
                <div class="col-sm-6">
                    <div class="col-sm-6">
                        <p class="c-black f-500">Tiene Hijos?</p>
                    </div>
                    <div class="col-sm-6">
                        <label class="radio radio-inline m-r-15">
                            <input type="radio" id="Si" name="inlineRadioOptions" value="1">
                            <i class="input-helper"></i>
                            Si
                        </label>

                        <label class="radio radio-inline m-l-10">
                            <input type="radio" checked="checked" id="No" name="inlineRadioOptions" value="2">
                            <i class="input-helper"></i>
                            No
                        </label>
                    </div>
                </div>
            </div>
            <div id="InfoHijos" class="m-t-15">
                
            </div>
                <div class="col-sm-7 m-t-10 hidden" id="add">
                    <div class="btn-colors">
                        <button type="button" onclick="AnadirHijos()" class="btn palette-Teal btn-icon bg waves-effect waves-float"><i class="zmdi zmdi-plus"></i></button>
                    </div>	
                </div>
            <div class="row m-t-15">
                    
                    <div class="col-sm-3 col-sm-offset-9">
                        <div class="btn-colors m-t-20" >
                            <button type="button" class="btn btn-danger waves-effect" onclick="cancelar()">Nuevo</button>		
                            <button type="button" class="btn palette-Blue bg waves-effect" id="guardarReceta" onclick="guardar()">Guardar</button>
                        </div>	
                    </div>
                </div>
            
        </div>
    </div>
<div>
</form>

<script> 
    var baseurl = "<?php echo base_url(); ?>"
</script>

<script src="<?php echo base_url(); ?>assets/js/Datos/Cliente/Cliente.js"></script>

