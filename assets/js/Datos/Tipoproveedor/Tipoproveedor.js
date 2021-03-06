var ruta_universal = baseurl

function listarComboTipoProveedor() {
	$.ajax({
		url: ruta_universal + 'tipoproveedor_controllers/listarComboTipoProveedor',
		type: 'POST',
		cache: false,
		success: function (data) {

			var datos = JSON.parse(data)
			$.each(datos, function (i, item) {
				$("#cbxTipoProveedor").append(
					'<option value="' + item.idTipoProveedor + '">' + item.nombreTipoProveedo + '</option>'
				)
			})
			$(".selectpickerProveedor").selectpicker()
		}
	})
}
listarComboTipoProveedor()

function listarTipoProveedor(){
	var cont = 0
	var estadoUnidad
	var classBtn
	$.ajax({
		url: ruta_universal + 'tipoproveedor_controllers/listarTipoProveedor',
		type:'POST',
		cache:false,
		success:function(data){
			var tabla = JSON.parse(data);
			$.each(tabla, function(i, item){
				// Validar estado de la Unidad de medida
				if (item.estado == 0){
					estadoUnidad = 'Deshabilitar(\'' + item.idTipoProveedor + '\')'
					classBtn = ' palette-Green'
				}else{
					if (item.estado == 1) {
						estadoUnidad = 'Habilitar(\'' + item.idTipoProveedor + '\')'
						classBtn = ' palette-Orange'
					}
				}
				cont++
				$("#tbodytipoProveedor").append(
					'<tr>'+
					'<td>' + cont + '</td>' +
					'<td>' + item.nombreTipoProveedo + '</td>'+
					'<td>' + item.Descripcion +'</td>' +
					'<td>' + item.sigla +'</td>' +
					'<td>'+
					'<button type="button" class="btn palette-Light-Blue bg" onclick="PasarParamVen(\'' + item.nombreTipoProveedo + '\', \'' + item.Descripcion + '\', \'' + item.sigla + '\', \''  + item.idTipoProveedor + '\')"><i class="zmdi zmdi-account"></i></button>'+
					'<button type="button" class="btn ' + classBtn +' bg" onclick="' + estadoUnidad +'"><i class="zmdi zmdi-account"></i></button>' +
					'</td>' +
					'</tr>'
				)
			});
		}
	})
}
listarTipoProveedor()

function PasarParamVen(tipoProveedor, descripcion, sigla, IdtipoProveedor){
	$("#tipoProveedor").val(tipoProveedor)
	$("#descripcion").val(descripcion)
	$("#sigla").val(sigla)
	$("#IdtipoProveedor").val(IdtipoProveedor)
	$("#btn-guardarTipoProveedor").attr('onclick','Editar()')
	$("#tipoProveedor").focus()
	$(".cobligatorio").each(function (indice, input) {
		$(input).css('border-bottom', '1px solid #e0e0e0')
	})
}

function guardar(){
	var tipoProveedor = $("#tipoProveedor").val()
	var descripcion = $("#descripcion").val()
	var sigla = $("#sigla").val()

	var swCamposObligatorios = 0
	$(".cobligatorio").each(function (indice, input){
		if ($(input).val() == "") {
			swCamposObligatorios = 1
			$(input).css('border-bottom','1px solid red')
			$(input).css('placeholder', 'Campo Obligatorio')
		}
	})

	if (swCamposObligatorios == 1){
		$.growl.warning({
			title: "Opps!",
			message: "Hay campos obligatorios que estan vacíos, por favor llenar la información correspondiente"
		});
	}else{

		// Agregamos ajax para guardar los datos del formulario
		$.ajax({
			url: ruta_universal + 'tipoproveedor_controllers/guardar',
			type:'POST',
			data:{
				'tipoProveedor': tipoProveedor,
				'descripcion': descripcion,
				'sigla': sigla
			},
			cache:false,
			success:function(data){
				if(data == 2){
					$.growl.error({
						title: "Opps!",
						message: "ocurrio un problema al ingresar los datos, intenta nuevamente, o consulta a soporte"
					});
				}else{
					if(data == 1){
						$.growl.notice({
							title: "Éxito!",
							message: "Se registro la información satisfactoriamente"
						});
						$("#tbodytipoProveedor").html('')
						$("#tipoProveedor").val('')
						$("#descripcion").val('')
						$("#sigla").val('')
						
					}
				}
			},complete:function(){
				listarTipoProveedor()
			}
		})
	}
}

function Editar(){
	var tipoProveedor = $("#tipoProveedor").val()
	var descripcion = $("#descripcion").val()
	var sigla = $("#sigla").val()
	var IdtipoProveedor = $("#IdtipoProveedor").val()

	var swCamposObligatorios = 0
	$(".cobligatorio").each(function (indice, input) {
		if ($(input).val() == "") {
			swCamposObligatorios = 1
			$(input).css('border-bottom', '1px solid red')
			$(input).css('placeholder', 'Campo Obligatorio')
		}
	})

	// Validamos campos vacíos 
	if (swCamposObligatorios == 1) {
		$.growl.warning({
			title: "Opps!",
			message: "Hay campos obligatorios que estan vacíos, por favor llenar la información correspondiente"
		});
		
	} else {
		$.ajax({
			url: ruta_universal + 'tipoproveedor_controllers/Editar',
			type:'POST',
			data:{
				'tipoProveedor': tipoProveedor,
				'descripcion': descripcion,
				'IdtipoProveedor': IdtipoProveedor,
				'sigla': sigla
			},
			cache:false,
			success:function(data){
				if(data == 2){
					$.growl.error({
						title: "Opps!",
						message: "ocurrio un problema al editar los datos, intenta nuevamente, o consulta a soporte"
					});
				}else{
					$.growl.notice({
						title: "Éxito!",
						message: "se modifico la información satisfactoriamente"
					});

					$("#tbodytipoProveedor").html('')
					$("#tipoProveedor").val('')
					$("#descripcion").val('')
					$("#sigla").val('')
					$("#IdtipoProveedor").val('')
					$("#btn-guardarTipoProveedor").attr('onclick', 'guardar()')
					
				}
			},complete:function(){
				listarTipoProveedor()
			}
		})
	}
}

function Deshabilitar(IdtipoProveedor){
	if (IdtipoProveedor === ''){
		$.growl.warning({
			title: "Opps!",
			message: "Este registro no se puede deshabilitar, Consulte a soporte"
		});
	}else{
		$.ajax({
			url: ruta_universal + 'tipoproveedor_controllers/Deshabilitar',
			type:'POST',
			data:{
				'IdtipoProveedor': IdtipoProveedor
			},
			cache:false,
			success:function(data){
				if(data == 2){
						$.growl.error({
							title: "Opps!",
							message: "ocurrio un problema al deshabiltar la unidad de medida seleccionada, intenta nuevamente, o consulta a soporte"
						});
				}else{
					if(data == 1){
						$.growl.notice({
							title: "Éxito!",
							message: "la unidad de medida seleccionada fue deshabilitada satisfactoriamente"
						});
						$("#tbodytipoProveedor").html('')
					}
				}
			},complete:function(){
				listarTipoProveedor()
			}
		})
	}
}

function Habilitar(IdtipoProveedor) {

	if (IdtipoProveedor === '') {
		$.growl.error({
			title: "Opps!",
			message: "Este registro no se puede habilitar, Consulte a soporte"
		});
	} else {
		$.ajax({
			url: ruta_universal + 'tipoproveedor_controllers/Habilitar',
			type: 'POST',
			data: {
				'IdtipoProveedor': IdtipoProveedor
			},
			cache: false,
			success: function (data) {
				if(data == 2){
					$.growl.error({
						title: "Opps!",
						message: "ocurrio un problema al habiltar el tipo de proveedor seleccionado, intenta nuevamente, o consulta a soporte"
					});
				}else{
					if(data == 1){
						$.growl.notice({
							title: "Éxito!",
							message: "el tipo de proveedor seleccionado fue habilitado satisfactoriamente"
						});
						$("#tbodytipoProveedor").html('')
					}
				}
			}, complete:function(){
				listarTipoProveedor()
			}
		})
	}
}

function QuitarErrorCampo(idCampo){
	
	var idCampoObligatorio = $("#"+idCampo)
	var p = idCampoObligatorio.attr('id')
	if (idCampoObligatorio.val() != ''){
		idCampoObligatorio.css('border-bottom', '1px solid #e0e0e0')
	}
}