<div class="c-header">
	<h2>Unidades de Medidas</h2>
</div>
<form action="<?php echo base_url(); ?>unidadmedidad_controllers/cargue" method="POST" enctype="multipart/form-data">
<!-- <form id="form-cargue" method="POST"> -->
	<div class="card">
		<div class="card-header">
			<div class="row">
				<h2 class="col-sm-10">Cargar Informacion <small>Suba la informacion al sistema por medio de un archivo en formato Excel, 
				este documento tiene que tener las caracteristicas predeterminadas para que el sistema pueda cargar la informacion.
				<br/> haga click en el siguiente hipervinculo para <a href="<?php echo base_url(); ?>assets/docs/Cargue Unidades de medida.xlsx">Descargar formato</a></small></h2>
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
						 <input type="text" name="NombreMedida" id="NombreMedida" class="form-control cobligatorio" placeholder="Unidad de medida"  onkeyup="QuitarErrorCampo('NombreMedida')">
					 </div>
				</div>
			</div>

			<div class="col-lg-6">
				<div class="input-group">
					 <span class="input-group-addon"><i class="zmdi zmdi-account"></i></span>
					 <div class="fg-line">
						 <input type="text" name="sigla" id="sigla" class="form-control cobligatorio" placeholder="Abreviatura" onkeyup="QuitarErrorCampo('sigla')">
					 </div>
				</div>
			</div>
		</div>
		<div class="row m-t-15">
			
			<div class="btn-colors btn-demo" style="float:right !important;">
				<!--<button type="button" onclick="guardar()" class="btn palette-Cyan bg waves-effect" style="margin-right:5px !important;">Guardar</button>-->
				<button class="btn palette-Red bg waves-effect" 	onclick="cancelar()">Cancelar</button>		
				<button class="btn palette-Blue bg waves-effect" onclick="guardar()" id="btn-guardarUnidades">Guardar</button>
			</div>
			<input type="hidden" id="UnidadId">	
		</div>
	</div>
</div>
<!-- Tabla con la información de las Unidades de Medidas creadas en el sistemas -->
<div class="card">
	<div class="card-body card-padding">
		<div class="row">
			<div class="col-sm-12">
				<h2>Lista de Unidades</h2>
			</div>
		</div>
			
		<div class="table-responsive">
			<table id="tablaunidades" class="table table-striped">
				<thead>
					<tr>
						<th data-column-id="id">#</th>
						<th data-column-id="nombre">Unidad Medidad</th>
						<th data-column-id="sigla">Sigla</th>
						<th data-column-id="acciones">Acciones</th>
					</tr>
				</thead>
				<tbody id="tbodyUnidades"></tbody>
				
			</table>
		</div>
			
	</div>
</div>



<script> 
    var baseurl = "<?php echo base_url(); ?>"
</script>
<script src="<?php echo base_url(); ?>assets/js/Datos/Unidadmedida/Unidadmedida.js"></script>
<script src="<?php echo base_url(); ?>assets/vendors/fileinput/fileinput.min.js"></script>

	
