<!-- Tabla con la información de las Recetas creadas en el sistema -->
<div class="card">
	<div class="card-body card-padding">
		<div class="row">
			<div class="col-lg-12">
				<h2>Lista de Usuarios</h2>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12">
				<div class="table-responsive">
					<table id="tablaUsuario" class="table table-striped">
						<thead>
							<tr>
								<th data-column-id="cont" data-type="numeric">#</th>
								<th data-column-id="nombre" data-type="numeric">Nombre</th>
								<th data-column-id="ide" data-order="desc">Identificacion</th>
								<th data-column-id="username">Username</th>
								<th data-column-id="pass">Cargo</th>
							</tr>
						</thead>
						<tbody id="tbodyUsuario">
							
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

<script src="<?php echo base_url(); ?>assets/js/Datos/Usuario/Usuario.js"></script>