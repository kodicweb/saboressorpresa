<div class="c-header">
	<h2>Proveedor</h2>
</div>
<div class="card">
    <div class="card-body card-padding">
		<div class="row">
			<div class="col-lg-6">
				<div class="input-group">
					<span class="input-group-addon"><i class="zmdi zmdi-account"></i></span>
					<div class="fg-line">
							<input type="text" name="txtNombreProveedor" id="txtNombreProveedor" class="form-control cobligatorio" placeholder="Nombre de proveedor" onkeyup="QuitarErrorCampo('txtNombreProveedor')">
					</div>
				</div>
			</div>

			<div class="col-lg-6">
				<div class="input-group">
					<span class="input-group-addon"><i class="zmdi zmdi-account"></i></span>
					<div class="fg-line">
							<input type="text" name="txtNitProveedor" id="txtNitProveedor" class="form-control cobligatorio" placeholder="Nit" onkeyup="QuitarErrorCampo('txtNitProveedor')">
					</div>
				</div>
			</div>

			<div class="col-lg-6">
				<div class="input-group">
					<span class="input-group-addon"><i class="zmdi zmdi-account"></i></span>
					<div class="fg-line">
							<input type="text" name="txtDireccion" id="txtDireccion" class="form-control cobligatorio" placeholder="Dirección" onkeyup="QuitarErrorCampo('txtDireccion')">
					</div>
				</div>
			</div>


			<div class="col-lg-6">
				<div class="input-group">
					<span class="input-group-addon"><i class="zmdi zmdi-account"></i></span>
					<div class="fg-line">
							<input type="text" name="txtTelefono" id="txtTelefono" class="form-control cobligatorio" placeholder="Telefono" onkeyup="QuitarErrorCampo('txtTelefono')">
					</div>
				</div>
			</div>

			<div class="col-sm-6 m-b-25" style="margin-left:50px !important;">
				<br>
				 <p class="f-500 m-b-15 c-black">Tipo de proveedor</p>
				<select class="selectpickerProveedor" data-live-search="true" id="cbxTipoProveedor" name="cbxTipoProveedor"></select>
			</div> 

				<div class="col-sm-12">
					<div class="btn-colors btn-demo" style="float:right !important;">
						<button type="button" class="btn palette-Red bg waves-effect" 	onclick="cancelarProveedor()">Nuevo</button>		
						<button type="button" class="btn palette-Blue bg waves-effect" id="btn-guardarProveedor"   onclick="guardarProveedor()">Guardar</button>
					</div>
				</div>
				<input type="hidden" id="txtIdProvedor">
		</div>
	</div>
</div>


<!-- Tabla con la información de los productos creados en el sistemas -->
<div class="card">
	<div class="card-body card-padding">
		<div class="row">
			<div class="col-sm-12">
				<h2>Lista de proveedores</h2>
			</div>
		</div>
			
		<div class="table-responsive">
			<table id="tablaProveedor" class="table table-striped">
				<thead>
					<tr>
						<th data-column-id="id">#</th>
						<th data-column-id="nombre">Nombre</th>
						<th data-column-id="marca">Nit</th>
						<th data-column-id="porcentaje" >Dirección </th>
						<th data-column-id="fechaV">Telefono</th>
						<th data-column-id="tipoproducto">Tipo de proveedor</th>
						<th data-column-id="acciones">Acciones</th>
					</tr>
				</thead>
				<tbody id="tbodyProveedor"></tbody>
				
			</table>
		</div>
			
	</div>
</div>

<script> 
    var baseurl = "<?php echo base_url(); ?>"
</script>

<script src="<?php echo base_url(); ?>assets/js/Datos/Tipoproveedor/Tipoproveedor.js"></script>
<script src="<?php echo base_url(); ?>assets/js/Datos/Proveedor/Proveedor.js"></script>
