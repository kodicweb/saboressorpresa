<div class="c-header">
	<h2>Cargos</h2>
</div>
<!-- Formulario  -->
<div class="card">
    <div class="card-body card-padding">
		<div class="row">

		 	<div class="col-sm-6">
			 	<div class="input-group">
					<span class="input-group-addon"><i class="zmdi zmdi-account"></i></span>
					 <div class="fg-line">
						 <input type="text" name="txtNombreCargo" id="txtNombreCargo" class="form-control cobligatorio" placeholder="Nombre Cargo"  onkeyup="QuitarErrorCampo('txtNombreCargo')">
					 </div>
				</div>
			</div>

			<div class="col-sm-12">
			 	<div class="input-group">
					<span class="input-group-addon"><i class="zmdi zmdi-account"></i></span>
					 <div class="fg-line">
						 <input type="text" name="txtDescripcion" id="txtDescripcion" class="form-control cobligatorio" placeholder="Descripción"  onkeyup="QuitarErrorCampo('txtDescripcion')">
					 </div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12">
				<br>
				<div class="btn-colors btn-demo" style="float:right !important;">
					<!--<button type="button" onclick="guardar()" class="btn palette-Cyan bg waves-effect" style="margin-right:5px !important;">Guardar</button>-->
 					<button class="btn palette-Red bg waves-effect" 	onclick="cancelarCargo()">Nuevo</button>		
					<button class="btn palette-Blue bg waves-effect" onclick="guardarCargo()" id="btn-guardarCargo">Guardar</button>
				</div>
				<input type="hidden" id="txtIdCargo">	
            </div>
		</div>
	</div>
</div>


<!-- Tabla con la información de los cargos creados en el sistemas -->
<div class="card">
	<div class="card-body card-padding">
		<div class="row">
			<div class="col-sm-12">
				<h2>Lista de cargos</h2>
			</div>
		</div>
			
		<div class="table-responsive">
			<table id="tablaCargo" class="table table-striped">
				<thead>
					<tr>
						<th data-column-id="id">#</th>
						<th data-column-id="nombre">Nombre</th>
						<th data-column-id="marca">Descripción</th>
						<th data-column-id="acciones">Acciones</th>
					</tr>
				</thead>
				<tbody id="tbodyCargo"></tbody>
				
			</table>
		</div>
			
	</div>
</div>


<script> 
    var baseurl = "<?php echo base_url(); ?>"
</script>

<script src="<?php echo base_url(); ?>assets/js/Datos/Cargo/Cargo.js"></script>
