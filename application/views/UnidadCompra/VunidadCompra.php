<div class="c-header">
	<h2>EQUIVALENCIA DE UNIDADES</h2>
</div>
<form action="<?php echo base_url(); ?>unidadcompra_controllers/cargue" method="POST" enctype="multipart/form-data">
<!-- <form id="form-cargue" method="POST"> -->
	<div class="card">
		<div class="card-header">
			<div class="row">
				<h2 class="col-sm-10">Cargar Informacion <small>Suba la informacion al sistema por medio de un archivo en formato Excel, 
				este documento tiene que tener las caracteristicas predeterminadas para que el sistema pueda cargar la informacion.
				<br/> haga click en el siguiente hipervinculo para <a href="<?php echo base_url(); ?>assets/docs/Cargue Unidades de compra.xlsx">Descargar formato</a></small></h2>
			</div>
		</div>
		<div class="card-body card-padding">
			<div class="row m-t-15">
				<div class="col-sm-6">
					<div class="fileinput fileinput-new col-sm-12" data-provides="fileinput">
						<span class="btn btn-primary waves-effect btn-file m-r-10">
							<span class="fileinput-new">Seleccione un Archivo</span>
							<span class="fileinput-exists">Cambiar Archivo</span>
							<input type="file" accept=".xlsx" name="file" id="file">
						</span>
						<span class="fileinput-filename"></span>
						<a href="#" class="close fileinput-exists" data-dismiss="fileinput">&times;</a>
					</div>
				</div>
				<div class="col-sm-4">
				
					<!-- <button type="button" onclick="cargue()" class="btn palette-Red col-sm-6 bg waves-effect" id="btn-cargue">Subir Info</button> -->
					<button type="submit" class="btn palette-Teal col-sm-6 bg waves-effect" id="btn-cargue">Subir Info</button>
				</div>
			</div>
		</div>
	</div>
</form>
<div class="card">
    <div class="card-body card-padding">
		<div class="row">
			<div class="col-lg-6">
				<div class="input-group">
					<span class="input-group-addon"><i class="zmdi zmdi-account"></i></span>
					 <div class="fg-line">
						 <input type="text" name="NombreUnidadCompra" id="NombreUnidadCompra" class="form-control cobligatorio" placeholder="Unidad de Compra"  onkeyup="QuitarErrorCampo('NombreUnidadCompra')">
					 </div>
				</div>
			</div>

			<div class="col-lg-6">
				<div class="input-group">
					 <span class="input-group-addon"><i class="zmdi zmdi-account"></i></span>
					 <div class="fg-line">
						 <input type="text" name="siglaC" id="siglaC" class="form-control cobligatorio" placeholder="Codigo" onkeyup="QuitarErrorCampo('siglaC')">
					 </div>
				</div>
			</div>

			<div class="col-lg-6">
				<div class="input-group">
					 <span class="input-group-addon"><i class="zmdi zmdi-account"></i></span>
					 <div class="fg-line">
						 <input type="number" name="equivalent" id="equivalent" class="form-control cobligatorio" placeholder="Equivalente" onkeyup="QuitarErrorCampo('equivalent')">
					 </div>
				</div>
			</div>

			<div class="col-lg-6">
				<br>
				<select class="selectpickerUC" data-live-search="true" id="Unidad" name="Unidad"></select>
			</div>
		</div>
		<div class="row m-t-15">
			
			<div class="btn-colors btn-demo" style="float:right !important;">
				<!--<button type="button" onclick="guardar()" class="btn palette-Cyan bg waves-effect" style="margin-right:5px !important;">Guardar</button>-->
				<button class="btn palette-Red bg waves-effect" 	onclick="cancelaruc()">Cancelar</button>		
				<button class="btn palette-Blue bg waves-effect" onclick="guardaruc()" id="btn-guardarUnidades">Guardar</button>
			</div>
			<input type="hidden" id="UnidadCId">	
		</div>
	</div>
</div>
<!-- Tabla con la información de las Unidades de Compras creadas en el sistemas -->
<div class="card">
	<div class="card-body card-padding">
		<div class="row">
			<div class="col-sm-12">
				<h2>Equivalencias Unidad Compra</h2>
			</div>
		</div>
			
		<div class="table-responsive">
			<table id="tablaunidadesC" class="table table-striped">
				<thead>
					<tr>
						<th data-column-id="id">#</th>
						<th data-column-id="sigla">Codigo</th>
						<th data-column-id="nombre">Nombre</th>
						<th data-column-id="equiv">Equivalente</th>
						<th data-column-id="und">Unidad</th>
						<th data-column-id="acciones">Acciones</th>
					</tr>
				</thead>
				<tbody id="tbodyUnidadesC"></tbody>
				
			</table>
		</div>
			
	</div>
</div>



<script> 
    var baseurl = "<?php echo base_url(); ?>"
</script>
<script src="<?php echo base_url(); ?>assets/js/Datos/UnidadCompra/UnidadCompra.js"></script>
<script src="<?php echo base_url(); ?>assets/vendors/fileinput/fileinput.min.js"></script>

	
