<div class="c-header">
	<h2>Tipo de Proveedores</h2>
</div>
<div class="card">
    <div class="card-body card-padding">
		<div class="row">
			<div class="col-lg-6">
				<div class="input-group">
					<span class="input-group-addon"><i class="zmdi zmdi-account"></i></span>
					 <div class="fg-line">
						 <input type="text" name="tipoProveedor" id="tipoProveedor" class="form-control cobligatorio" placeholder="Nombre"  onkeyup="QuitarErrorCampo('tipoProveedor')">
					 </div>
				</div>
			</div>

			<div class="col-lg-6">
				<div class="input-group">
					 <span class="input-group-addon"><i class="zmdi zmdi-account"></i></span>
					 <div class="fg-line">
						 <input type="text" name="descripcion" id="descripcion" class="form-control" placeholder="Descripcion" onkeyup="QuitarErrorCampo('descripcion')">
					 </div>
				</div>
			</div>

            <div class="col-lg-6 m-t-10">
				<div class="input-group">
					 <span class="input-group-addon"><i class="zmdi zmdi-account"></i></span>
					 <div class="fg-line">
						 <input type="text" name="sigla" id="sigla" class="form-control cobligatorio" placeholder="Abreviatura" onkeyup="QuitarErrorCampo('sigla')">
					 </div>
				</div>
			</div>
		</div>
		<div class="row m-t-10">
			<div class="btn-colors btn-demo" style="float:right !important;">
				<button class="btn palette-Red bg waves-effect" 	onclick="cancelar()">Cancelar</button>		
				<button class="btn palette-Blue bg waves-effect" onclick="guardar()" id="btn-guardarTipoProveedor">Guardar</button>
			</div>
			<input type="hidden" id="IdtipoProveedor">	
		</div>
	</div>
</div>

<!-- Tabla con la información de las Unidades de Medidas creadas en el sistemas -->
<div class="card">
	<div class="card-body card-padding">
		<div class="row">
			<div class="col-sm-12">
				<h2>Lista Tipo de Proveedores</h2>
			</div>
		</div>
			
		<div class="table-responsive">
			<table id="tablatipoProveedor" class="table table-striped">
				<thead>
					<tr>
						<th data-column-id="id">#</th>
						<th data-column-id="nombre">Nombre</th>
						<th data-column-id="sigla">Descripcion</th>
						<th data-column-id="acciones">abreviatura</th>
						<th data-column-id="acciones">Acciones</th>
					</tr>
				</thead>
				<tbody id="tbodytipoProveedor"></tbody>
				
			</table>
		</div>
			
	</div>
</div>

<script> 
    var baseurl = "<?php echo base_url(); ?>"
</script>

<script src="<?php echo base_url(); ?>assets/js/Datos/TipoProveedor/Tipoproveedor.js"></script>
	
