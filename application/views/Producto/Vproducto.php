<div class="c-header">
	<h2>Insumos</h2>
</div>
<div class="card">
    <div class="card-body card-padding">
		 <div class="row">
			<div class="col-lg-6">
				<div class="input-group">
					<span class="input-group-addon"><i class="zmdi zmdi-account"></i></span>
					 <div class="fg-line">
						 <input type="text" name="txtNombreProducto" id="txtNombreProducto" class="form-control cobligatorio" placeholder="Nombre de Insumo"  onkeyup="QuitarErrorCampo('txtNombreProducto')">
					 </div>
				</div>
			</div>

			<div class="col-lg-6">
				<div class="input-group">
					 <span class="input-group-addon"><i class="zmdi zmdi-account"></i></span>
					 <div class="fg-line">
						 <input type="text" name="txtMarca" id="txtMarca" class="form-control cobligatorio" placeholder="Grupo de Inventario" onkeyup="QuitarErrorCampo('txtMarca')">
					 </div>
				</div>
			</div>

			<div class="col-lg-6">
				<div class="input-group">
					 <span class="input-group-addon"><i class="zmdi zmdi-account"></i></span>
					 <div class="fg-line">
						 <input type="number" name="txtCostoUnitaria" id="txtCostoUnitaria" class="form-control cobligatorio" placeholder="Costo unitario de Insumo" onkeyup="QuitarErrorCampo('txtCostoUnitaria')">
					 </div>
				</div>
			</div>

		</div>

		<div class="row">
			<div class="col-sm-4 m-b-25" style="margin-left:50px !important;">
				<br>
				 <p class="f-500 m-b-15 c-black">Tipo de producto</p>
				<select class="selectpicker" data-live-search="true" id="cbxTipoProducto" name="cbxTipoProducto"></select>
			</div> 

			<div class="col-sm-4 m-b-20" style="margin-left:50px !important;">
				<br>
				 <p class="f-500 m-b-15 c-black">Unidad de medida</p>
				<select class="selectpicker2" data-live-search="true" id="cbxUnidadMedida" name="cbxUnidadMedida"></select>
			</div>

			<div class="col-sm-12">
				
				<div class="btn-colors btn-demo" style="float:right !important;">
					<!--<button type="button" onclick="guardar()" class="btn palette-Cyan bg waves-effect" style="margin-right:5px !important;">Guardar</button>-->
 					<button class="btn palette-Red bg waves-effect" 	onclick="cancelarp()">Cancelar</button>		
					<button class="btn palette-Blue bg waves-effect" onclick="guardarp()" id="btn-guardarProducto">Guardar</button>
				</div>
				<input type="hidden" id="txtIdProducto">	
            </div>
		</div>

	</div>
</div>

<!-- Tabla con la información de los productos creados en el sistemas -->
<div class="card">
	<div class="card-body card-padding">
		<div class="row">
			<div class="col-sm-12">
				<h2>Lista de producto</h2>
			</div>
		</div>
			
		<div class="table-responsive">
			<table id="tablaProducto" class="table table-striped">
				<thead>
					<tr>
						<th data-column-id="id">#</th>
						<th data-column-id="nombre">Nombre</th>
						<th data-column-id="marca">Grupo Inventario</th>
						<th data-column-id="porcentaje" >Unidad Medidad </th>
						<th data-column-id="fechaV">Costo unitario</th>
						<th data-column-id="tipoproducto">Tipo de producto</th>
						<th data-column-id="acciones">Acciones</th>
					</tr>
				</thead>
				<tbody id="tbodyProducto"></tbody>
				
			</table>
		</div>
			
	</div>
</div>



<script> 
	var baseurl = "<?php echo base_url(); ?>"
</script>

<script src="<?php echo base_url(); ?>assets/js/Datos/TipoProducto/TipoProducto.js"></script>
<script src="<?php echo base_url(); ?>assets/js/Datos/Producto/Producto.js"></script>
<script src="<?php echo base_url(); ?>assets/js/Datos/Unidadmedida/Unidadmedida.js"></script>
	
