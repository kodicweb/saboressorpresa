var ruta_universal = baseurl

function guardar(){
	var NombreMedida 	= $("#NombreMedida").val()
	var sigla 			= $("#sigla").val()

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
			url: ruta_universal + 'unidadmedidad_controllers/guardar',
			type:'POST',
			data:{
				'NombreMedida': NombreMedida,
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
						$("#tbodyUnidades").html('')
						$("#NombreMedida").val('')
						$("#sigla").val('')
						
					}
				}
			},complete:function(){
				ListarUnidades()
			}
		})
	}
}

function cancelar(){
	$("#btn-guardarUnidades").attr('onclick', 'guardar()')
	$("#NombreMedida").val('')
	$("#sigla").val('')
	$(".cobligatorio").each(function (indice, input) {
		if ($(input).val() == "") {
			$(input).css('border-bottom', '1px solid #e0e0e0')
		}
	})
}

function ListarUnidades(){
	var cont = 0
	var estadoUnidad
	var classBtn
	$.ajax({
		url: ruta_universal + 'unidadmedidad_controllers/listarUnidadmedida',
		type:'POST',
		cache:false,
		success:function(data){
			var tabla = JSON.parse(data);
			$.each(tabla, function(i, item){
				// Validar estado de la Unidad de medida
				if (item.estado == 0){
					estadoUnidad = 'Deshabilitar(\'' + item.idunidadmedida + '\')'
					classBtn = ' palette-Green'
				}else{
					if (item.estado == 1) {
						estadoUnidad = 'Habilitar(\'' + item.idunidadmedida + '\')'
						classBtn = ' palette-Orange'
					}
				}
				cont++
				$("#tbodyUnidades").append(
					'<tr>'+
					'<td>' + cont + '</td>' +
					'<td>' + item.nombreUnidadmedida + '</td>'+
					'<td>' + item.siglaUnidadMedida +'</td>' +
					'<td>'+
					'<button type="button" class="btn palette-Light-Blue bg" onclick="PasarParamVen(\'' + item.nombreUnidadmedida + '\', \'' + item.siglaUnidadMedida + '\', \'' + item.idunidadmedida + '\')"><i class="zmdi zmdi-account"></i></button>'+
					'<button type="button" class="btn ' + classBtn +' bg" onclick="' + estadoUnidad +'"><i class="zmdi zmdi-account"></i></button>' +
					'</td>' +
					'</tr>'
				)
			});
		}
	})
}
ListarUnidades()

function PasarParamVen(nombreUnidadmedida, siglaUnidadMedida, unidadId){
	$("#NombreMedida").val(nombreUnidadmedida)
	$("#sigla").val(siglaUnidadMedida)
	$("#UnidadId").val(unidadId)
	$("#btn-guardarUnidades").attr('onclick','Editar()')
	$("#NombreMedida").focus()
	$(".cobligatorio").each(function (indice, input) {
		$(input).css('border-bottom', '1px solid #e0e0e0')
	})
}

function listarComboUnidadmedida() {
	$.ajax({
		url: ruta_universal + 'unidadmedidad_controllers/listarComboUnidadmedida',
		type: 'POST',
		cache: false,
		success: function (data) {
			var datos = JSON.parse(data)
			$.each(datos, function (i, item) {
				$("#cbxUnidadMedida").append(
					'<option value="' + item.idunidadmedida + '">' + item.siglaUnidadMedida + '</option>'
				)
			})
			$(".selectpicker2").selectpicker()
		}
	})
}
listarComboUnidadmedida()

function Editar(){
	var NombreMedida 	= $("#NombreMedida").val()
	var sigla 			= $("#sigla").val()
	var UnidadId		= $("#UnidadId").val()


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
			url: ruta_universal + 'unidadmedidad_controllers/Editar',
			type:'POST',
			data:{
				'NombreMedida': NombreMedida,
				'sigla': sigla,
				'UnidadId': UnidadId
			},
			cache:false,
			success:function(data){
				alert(data)
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

					$("#NombreMedida").val('')
					$("#sigla").val('')
					$("#UnidadId").val('')
					$("#btn-guardarUnidades").attr('onclick', 'guardar()')
					$("#tbodyUnidades").html('')
				}
			},complete:function(){
				ListarUnidades()
			}
		})
	}
}

function Deshabilitar(unidadId){
	if (unidadId === ''){
		$.growl.warning({
			title: "Opps!",
			message: "Este registro no se puede deshabilitar, Consulte a soporte"
		});
	}else{
		$.ajax({
			url: ruta_universal + 'unidadmedidad_controllers/Deshabilitar',
			type:'POST',
			data:{
				'unidadId': unidadId
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
						$("#tbodyUnidades").html('')
					}
				}
			},complete:function(){
				ListarUnidades()
			}
		})
	}
}

function Habilitar(unidadId) {
	if (unidadId === '') {
		$.growl.error({
			title: "Opps!",
			message: "Este registro no se puede habilitar, Consulte a soporte"
		});
	} else {
		$.ajax({
			url: ruta_universal + 'unidadmedidad_controllers/Habilitar',
			type: 'POST',
			data: {
				'unidadId': unidadId
			},
			cache: false,
			success: function (data) {
				if(data == 2){
					$.growl.error({
						title: "Opps!",
						message: "ocurrio un problema al habiltar la unidad de medida seleccionada, intenta nuevamente, o consulta a soporte"
					});
				}else{
					if(data == 1){
						$.growl.notice({
							title: "Éxito!",
							message: "la unidad de medida seleccionada fue habilitado satisfactoriamente"
						});
						$("#tbodyUnidades").html('')
					}
				}
			}, complete:function(){
				ListarUnidades()
			}
		})
	}
}

function cargue() {
	var file = $("#file").val();
	console.log($("form-cargue"))
	if(file != ''){
		$.ajax({
			url: ruta_universal + 'unidadmedidad_controllers/cargue',
			type: 'POST',
			data: $("form-cargue").serialize(),
			cache: false,
			success: function (data) {
				alert(data)
				if(data == 2){
					
					$.growl.error({
						title: "Opps!",
						message: "ocurrio un problema al habiltar la unidad de medida seleccionada, intenta nuevamente, o consulta a soporte"
					});
				}else{
					if(data == 1){
						$.growl.notice({
							title: "Éxito!",
							message: "la unidad de medida seleccionada fue habilitado satisfactoriamente"
						});
						$("#file").val('')
					}
				}
			}, complete:function(){
				//ListarUnidades()
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