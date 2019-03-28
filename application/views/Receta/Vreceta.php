<div class="c-header">
    <h2>Recetas</h2>
</div>
<form id="registroRecetas" role="form" >
    <input type="hidden" id="RecetaId" name="RecetaId">
    <input type="hidden" id="IngredienteId" name="IngredienteId">
<div class="card">
    <div class="card-body card-padding">
        <div class="row">
            <div class="col-sm-6">
                <div class="input-group">
                    <span class="input-group-addon"><i class="zmdi zmdi-account"></i></span>
                    <div class="fg-line">
                        <input type="text" name="nombre" id="nombre" class="form-control cobligatorio" placeholder="Nombre de la receta" onkeyup="QuitarErrorCampo('nombre')" >
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="input-group">
                    <span class="input-group-addon"><i class="zmdi zmdi-account"></i></span>
                    <div class="fg-line">
                        <input type="number" name="descripcion" id="descripcion" class="form-control " placeholder="Porciones" >
                    </div>
                </div>
            </div>
            <br/>
            <div class="col-sm-6 m-t-20" >
                <div class="input-group">
                    <span class="input-group-addon col-sm-1"><i class="zmdi zmdi-key zmdi-hc-fw"></i></span>
                    <div class="col-sm-3 m-b-25">
                        <select class="selectpicker" id="tiporeceta" name="tiporeceta" title="Seleccione el tipo de receta...">
                            <!-- <option value="0">Seleccione el tipo de receta...</option> -->
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 m-t-25">
                <div class="col-sm-5">
                    <p class="c-black f-500">Contiene SubReceta?</p>
                </div>
                <div class="col-sm-6">
                    <label class="radio radio-inline m-r-20">
                        <input type="radio" id="Si" name="inlineRadioOptions" data-toggle="modal" href="#modalNarrower"  value="1">
                        <i class="input-helper"></i>
                        Si
                    </label>

                    <label class="radio radio-inline m-r-20">
                        <input type="radio" checked="checked" id="No" name="inlineRadioOptions" value="2">
                        <i class="input-helper"></i>
                        No
                    </label>
                </div>
            </div>

            <div class="modal fade" id="modalNarrower" tabindex="-1" role="dialog" aria-hidden="true" style="margin-top: 9% !important;">
                <div class="modal-dialog modal-md ">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Lista de SubRecetas</h4>
                        </div>
                        <div class="modal-body">
                            <div class="row" id="listasubr">
    
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-link">Save changes</button>
                            <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>

            <div id="ContenedorSubReceta" class="col-sm-6 hidden">
                <div class="input-group">
                    <span class="input-group-addon col-sm-1"><i class="zmdi zmdi-key zmdi-hc-fw"></i></span>
                    <div class="col-sm-3 m-b-25">
                        <select class="selectpicker" id="Subreceta" name="Subreceta" multiple title="Seleccione una SubReceta...">
                            <!-- <option value="">Seleccione una SubReceta...</option> -->
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        <h2>Ingredientes <small>Información de los ingredientes que se utilizan para llevar a cabo esta receta</small></h2>
    </div>
    <div class="card-body card-padding">
        <div id="contenedorIngredientes">
           
        </div>
        <div class="row">
			<div class="col-sm-7">
                <div class="btn-colors">
                    <button type="button" onclick="AnadirIngredientes()" class="btn palette-Teal btn-icon bg waves-effect waves-float"><i class="zmdi zmdi-plus"></i></button>
				</div>	
            </div>
            <div class="col-sm-3 col-sm-offset-1">
                <div class="input-group">
                    <span class="input-group-addon"><i class="zmdi zmdi-account"></i></span>
                    <div class="fg-line">
                        <input type="text" name="vlrTotal" id="vlrTotal" class="form-control" disabled placeholder="Costo de la receta" >
                    </div>
                </div>
            </div>
            <div class="col-sm-3 col-sm-offset-9">
				<div class="btn-colors m-t-20" >
 					<button type="button" class="btn btn-danger waves-effect" onclick="cancelar()">Nuevo</button>		
					<button type="button" class="btn palette-Blue bg waves-effect" id="guardarReceta" onclick="guardar()">Guardar</button>
				</div>	
            </div>
		</div>
	</div>
</div>
</form>

<!-- Tabla con la información de las Recetas creadas en el sistema -->
<div class="card">
	<div class="card-body card-padding">
        <!-- <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
            RECETAS
        </button> -->
		<div class="row">
			<div class="col-xs-6 col-sm-3">
				<h2>Lista de Recetas</h2>
			</div>
            <div class="btn-colors col-xs-2 pull-right">
                <button type="button" data-toggle="collapse" href="#collapseExample" class="btn btn-sm palette-Pink bg btn-float waves-effect waves-circle waves-float"><i class="zmdi zmdi-eye mdc-text-red"></i></button>
            </div>
		</div>
		<div class="row collapse" id="collapseExample">
			<div class="col-lg-12">
				<div class="table-responsive">
					<table id="tablaReceta" class="table table-striped">
						<thead>
							<tr>
								<th data-column-id="cont" data-type="numeric">#</th>
								<th data-column-id="nombre" data-type="numeric">Nombre</th>
								<th data-column-id="descripcion" data-order="desc">Porciones</th>
								<th data-column-id="tiporeceta">Tipo Receta</th>
								<th data-column-id="costoTotal">Costo Total</th>
								<th>Acciones</th>
							</tr>
						</thead>
						<tbody id="tbodyReceta">
							
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>

<script> 
    var baseurl = "<?php echo base_url(); ?>"
</script>

<script src="<?php echo base_url(); ?>assets/js/Datos/Receta/Receta.js"></script>
