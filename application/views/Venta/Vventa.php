<div class="c-header">
    <h2>Venta</h2>
</div>
<div class="card">
<div class="card-header">
        <h2>Facturacion <small>Información de la venta</small></h2>
    </div>
	<div class="card-body card-padding">
		<div class="row">
			 <div class="col-sm-6 m-t-20" >
                <div class="input-group">
                    <span class="input-group-addon col-sm-1"><i class="zmdi zmdi-key zmdi-hc-fw"></i></span>
                    <div class="col-sm-3 m-b-25">
                        <select class="selectpicker" id="cbxCliente" name="cbxCliente">
                            <option value="0">Seleccione el Cliente...</option>
                        </select>
                    </div>
                </div>
            </div>
			<div class="col-sm-6 m-t-20" >
                <div class="input-group">
                    <span class="input-group-addon col-sm-1"><i class="zmdi zmdi-key zmdi-hc-fw"></i></span>
                    <div class="col-sm-3 m-b-25">
                        <select class="selectpicker" id="cbxTipoVenta" name="cbxTipoVenta">
                            <option value="0">Seleccione el tipo de Venta...</option>
                        </select>
                    </div>
                </div>
            </div>
            
		</div>
	</div>
</div>

<!-- detalle de la venta -->
<div class="card">
	<div class="card-header">
        <h2>Productos <small>Información de los productos de esta venta</small></h2>
    </div>
	 <div class="card-body card-padding">
	 	 <div id="DetalleProductoVenta">
		</div>

		<!-- Botón para ir agregando los producto de manera dinamica  -->
		 <div class="row">
		 	<div class="col-sm-12">
                <div class="btn-colors">
				<hr style="border:1px solid red;">
                    <button type="button" onclick="ListarCamposDetalleVenta()" class="btn palette-Teal btn-icon bg waves-effect waves-float pull-right"><i class="zmdi zmdi-plus"></i></button>
					
				</div>
					
            </div>
		 </diV>
		 <div class="row">
		 	<div class="col-sm-12 ">
			 	<center><h3>Detalle de valores de la venta</h3></center>
                 <hr>
			 </div>
		 	<div class="col-sm-3 col-sm-offset-1 ">
                <div class="input-group ">
                    <span ><b>Valor neto</b></span>
                    <div class="fg-line">
                        <input type="text" name="vlrTotalVenta" id="vlrTotalVenta" class="form-control" disabled>
                    </div>
                </div>
            </div>
			<div class="col-sm-3 col-sm-offset-1">
                <div class="input-group">
                    <span ><b>Valor iva</b></span>
                    <div class="fg-line">
                        <input type="text" name="vlrIva" id="vlrIva" class="form-control" disabled disabled>
                    </div>
                </div>
            </div>
			<div class="col-sm-3 col-sm-offset-1">
                <div class="input-group">
                    <span ><b>Total valor de la venta</b></span>
                    <div class="fg-line">
                        <input type="text" name="vlrTotalVentaIva" id="vlrTotalVentaIva" class="form-control" disabled >
                    </div>
                </div>
            </div>

            <div class="col-sm-12">
				<div class="btn-colors m-t-20" >
 					<button type="button" class="btn btn-danger waves-effect pull-right" onclick="cancelar()">Nuevo</button>		
					<button type="button" class="btn palette-Blue bg waves-effect pull-right" id="guardarReceta" onclick="GuardarVenta()">Guardar</button>
				</div>	
            </div>

		 </div>
	 </div>
</div>





<script> 
    var baseurl = "<?php echo base_url(); ?>"
</script>

<script src="<?php echo base_url(); ?>assets/js/Datos/Venta/Venta.js"></script>
<script src="<?php echo base_url(); ?>assets/js/Datos/TipoVenta/TipoVenta.js"></script>
