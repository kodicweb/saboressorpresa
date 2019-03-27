<div class="c-header">
	<h2>Compras</h2>
</div>
<div class="card">
	<div class="card-body card-padding">
		<div class="row">

			<div class="col-sm-6 ">
				
				<div class="input-group">
					<p><b>Proveedor</b></p>
					
					<div class="col-sm-6">
						<select class="selectProveedor" data-live-search="true" id="cbxproveedor" name="cbxproveedor">
							
						</select>
					</div>
				</div>
			</div>

			<div class="col-sm-6 ">
				<div class="input-group">
					<p><b>Producto</b></p>
					<div class="col-sm-6">
						<select class="selectProducto" data-live-search="true" id="cbxproducto" name="cbxproducto" placeholder="Producto">
							
						</select>
					</div>
				</div>
			</div>
		</diV>
		<br>
		<div class="row">
			<div class="col-sm-4">
				<div class="input-group">
					<span class="input-group-addon"><i class="zmdi zmdi-account"></i></span>
					<input type="text" name="txtCantidad" id="txtCantidad" class="form-control cobligatorio" placeholder="Cantidad"  onkeyup="CalcularvalorTotal()">
				</div>
			</div>

			<div class="col-sm-4">
				<div class="input-group">
					<span class="input-group-addon"><i class="zmdi zmdi-account"></i></span>
					<input type="text" name="txtCostoUnitario" id="txtCostoUnitario" class="form-control cobligatorio" placeholder="Costo Unitario"  onkeyup="CalcularvalorTotal()">
				</div>
			</div>

			<div class="col-sm-4">
				<div class="input-group">
					<span class="input-group-addon"><i class="zmdi zmdi-account"></i></span>
					<input type="text" name="txtCostoTotal" id="txtCostoTotal" class="form-control cobligatorio" placeholder="Costo Total"  onkeyup="QuitarErrorCampo('txtCostoTotal')">
				</div>
			</div>
		</div>
		<br>
		<div  class="row">

			<div class="col-sm-4">
				<div class="input-group">
					<span class="input-group-addon"><i class="zmdi zmdi-account"></i></span>
					<input type="text" name="txtFactura" id="txtFactura" class="form-control cobligatorio" placeholder="Numero de factura"  onkeyup="QuitarErrorCampo('txtFactura')">
				</div>
			</div>

			<div class="col-sm-4">
				<div class="input-group">
					<span class="input-group-addon"><i class="zmdi zmdi-account"></i></span>
					<input type="text" name="txtlote" id="txtlote" class="form-control cobligatorio" placeholder="Lote"  onkeyup="QuitarErrorCampo('txtlote')">
				</div>
			</div>

			<div class="col-sm-4">
				<div class="input-group">
					<span class="input-group-addon"><i class="zmdi zmdi-account"></i></span>
					<input type="text" name="txtFechaVencimiento" id="txtFechaVencimiento" class="form-control cobligatorio" placeholder="Fecha de vencimiento"  onkeyup="QuitarErrorCampo('txtFechaVencimiento')">
				</div>
			</div>


			<div class="col-sm-12">
				<br>
				<div class="form-group">
					<div class="fg-line">
						<textarea class="form-control" rows="5" placeholder="Observación"  id="txtObservaciones" name="txtObservaciones"></textarea>
					</div>
				</div>
			</div>

			<div class="col-sm-12">
				
				<div class="btn-colors btn-demo" style="float:right !important;">
					<!--<button type="button" onclick="guardar()" class="btn palette-Cyan bg waves-effect" style="margin-right:5px !important;">Guardar</button>-->
 					<button class="btn palette-Red bg waves-effect"   id="btn-nuevo" 	onclick="nuevaCompra()">Nueva compra</button>		
					<button class="btn palette-Blue bg waves-effect"  id="btn-registrarCompra"  	onclick="guardarCompra()" id="btn-guardarProducto">Guardar</button>
				</div>
				<input type="hidden" id="txtIdCompra">	
            </div>

			<input type="hidden" id="txtIdCompra">


		</diV>
	</div>
</div>


<div class="card">
	<div class="card-body card-padding">
		<div class="row">
			<div class="col-sm-12">
				<h2>Lista de compras</h2>
			</div>
		</div>
			
		<div class="table-responsive">
			<table id="tablaCompras" class="table table-striped">
				<thead>
					<tr>
					
						<th data-column-id="nombre">Producto</th>
						<th data-column-id="marca">Proveedor</th>
						<th data-column-id="porcentaje" >Cantidad </th>
						<th data-column-id="fechaV">Costo unitario</th>
						<th data-column-id="tipoproducto">Costo total</th>
						<th data-column-id="acciones">Numero de factura</th>
						<th data-column-id="acciones">Lote</th>
						<th data-column-id="acciones">fecha de vencimiento</th>
						<th data-column-id="acciones" style="width:15% !important;">Acciones</th>
					</tr>
				</thead>
				<tbody id="tbodyCompra"></tbody>
				
			</table>
		</div>
			
	</div>
</div>

<script> 
    var baseurl = "<?php echo base_url(); ?>"
</script>

<script src="<?php echo base_url(); ?>assets/js/Datos/Compras/Compras.js"></script>
<script src="<?php echo base_url(); ?>assets/js/Datos/Proveedor/Proveedor.js"></script>
<script src="<?php echo base_url(); ?>assets/js/Datos/Producto/Producto.js"></script>


