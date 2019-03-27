var ruta_universal = baseurl

function listarTipoReceta(){
	var cont = 0
	var estadoUnidad
	var classBtn
	$.ajax({
		url: ruta_universal + 'tiporeceta_controllers/listarTipoReceta',
		type:'POST',
		cache:false,
		success:function(data){
			var tabla = JSON.parse(data);
			$.each(tabla, function(i, item){
				// Validar estado de la Unidad de medida
				if (item.estado == 0){
					estadoUnidad = 'Deshabilitar(\'' + item.idTipoReceta + '\')'
					classBtn = ' palette-Green'
				}else{
					if (item.estado == 1) {
						estadoUnidad = 'Habilitar(\'' + item.idTipoReceta + '\')'
						classBtn = ' palette-Orange'
					}
				}
				cont++
				$("#tbodytipoReceta").append(
					'<tr>'+
					'<td>' + cont + '</td>' +
					'<td>' + item.nombreTipoReceta + '</td>'+
					'<td>' + item.sigla +'</td>' +
					'<td>'+
					'<button type="button" class="btn palette-Light-Blue bg" onclick="PasarParamVen(\'' + item.nombreTipoReceta + '\', \'' + item.sigla + '\', \''  + item.idTipoReceta + '\')"><i class="zmdi zmdi-account"></i></button>'+
					'<button type="button" class="btn ' + classBtn +' bg" onclick="' + estadoUnidad +'"><i class="zmdi zmdi-account"></i></button>' +
					'</td>' +
					'</tr>'
				)
			});
		}
	})
}
listarTipoReceta()

function PasarParamVen(tipoReceta, sigla, IdtipoReceta){
	$("#tipoReceta").val(tipoReceta)
	$("#sigla").val(sigla)
	$("#IdtipoReceta").val(IdtipoReceta)
	$("#btn-guardarTipoReceta").attr('onclick','Editar()')
	$("#tipoReceta").focus()
	$(".cobligatorio").each(function (indice, input) {
		$(input).css('border-bottom', '1px solid #e0e0e0')
	})
}

function guardar(){
	var tipoReceta = $("#tipoReceta").val()
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
			url: ruta_universal + 'tiporeceta_controllers/guardar',
			type:'POST',
			data:{
				'tipoReceta': tipoReceta,
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
						$("#tbodytipoReceta").html('')
						$("#tipoReceta").val('')
						$("#descripcion").val('')
						$("#sigla").val('')
						
					}
				}
			},complete:function(){
				listarTipoReceta()
			}
		})
	}
}

function Editar(){
	var tipoReceta = $("#tipoReceta").val()
	var sigla = $("#sigla").val()
	var IdtipoReceta = $("#IdtipoReceta").val()

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
			url: ruta_universal + 'tiporeceta_controllers/Editar',
			type:'POST',
			data:{
				'tipoReceta': tipoReceta,
				'IdtipoReceta': IdtipoReceta,
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

					$("#tbodytipoReceta").html('')
					$("#tipoReceta").val('')
					$("#descripcion").val('')
					$("#sigla").val('')
					$("#IdtipoReceta").val('')
					$("#btn-guardarTipoReceta").attr('onclick', 'guardar()')
					
				}
			},complete:function(){
				listarTipoReceta()
			}
		})
	}
}

function Deshabilitar(IdtipoReceta){
	if (IdtipoReceta === ''){
		$.growl.warning({
			title: "Opps!",
			message: "Este registro no se puede deshabilitar, Consulte a soporte"
		});
	}else{
		$.ajax({
			url: ruta_universal + 'tiporeceta_controllers/Deshabilitar',
			type:'POST',
			data:{
				'IdtipoReceta': IdtipoReceta
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
						$("#tbodytipoReceta").html('')
					}
				}
			},complete:function(){
				listarTipoReceta()
			}
		})
	}
}

function Habilitar(IdtipoReceta) {

	if (IdtipoReceta === '') {
		$.growl.error({
			title: "Opps!",
			message: "Este registro no se puede habilitar, Consulte a soporte"
		});
	} else {
		$.ajax({
			url: ruta_universal + 'tiporeceta_controllers/Habilitar',
			type: 'POST',
			data: {
				'IdtipoReceta': IdtipoReceta
			},
			cache: false,
			success: function (data) {
				if(data == 2){
					$.growl.error({
						title: "Opps!",
						message: "ocurrio un problema al habiltar el tipo de Receta seleccionado, intenta nuevamente, o consulta a soporte"
					});
				}else{
					if(data == 1){
						$.growl.notice({
							title: "Éxito!",
							message: "el tipo de Receta seleccionado fue habilitado satisfactoriamente"
						});
						$("#tbodytipoReceta").html('')
					}
				}
			}, complete:function(){
				listarTipoReceta()
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