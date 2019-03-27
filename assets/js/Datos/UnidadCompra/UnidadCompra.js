var ruta_universal = baseurl

function listarComboUnidadmedida() {
	$.ajax({
		url: ruta_universal + 'unidadmedidad_controllers/listarComboUnidadmedida',
		type: 'POST',
		cache: false,
		success: function (data) {
			var datos = JSON.parse(data)
			$.each(datos, function (i, item) {
				$("#Unidad").append(
					'<option value="' + item.idunidadmedida + '">' + item.siglaUnidadMedida + '</option>'
				)
			})
			$(".selectpickerUC").selectpicker()
		}
	})
}
listarComboUnidadmedida()

function guardaruc(){
	var NombreUnidadCompra 	= $("#NombreUnidadCompra").val();
	var siglaC = $("#siglaC").val();
	var equivalent	= $("#equivalent").val();
	var Unidad	= $("#Unidad").val();

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
			url: ruta_universal + 'unidadcompra_controllers/guardaruc',
			type:'POST',
			data:{
				'NombreUnidadCompra': NombreUnidadCompra,
				'siglaC': siglaC,
				'equivalent':equivalent,
				'Unidad':Unidad
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
						$("#tbodyUnidadesC").html('')
						$("#NombreUnidadCompra").val('')
						$("#siglaC").val('')
						$("#equivalent").val('')
    					$("#Unidad").val('default').selectpicker("refresh");
					}
				}
			},complete:function(){
				ListarUnidades()
			}
		})
	}
}

function cancelar(){
	$("#btn-guardarUnidades").attr('onclick', 'guardaruc()')
	("#NombreUnidadCompra").val('')
	$("#siglaC").val('')
	$("#equivalent").val('')
	$("#Unidad").val('default').selectpicker("refresh");

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
		url: ruta_universal + 'unidadcompra_controllers/listarUnidadcompra',
		type:'POST',
		cache:false,
		success:function(data){
			var tabla = JSON.parse(data);
			$.each(tabla, function(i, item){
				// Validar estado de la Unidad de compra
				if (item.estado == 0){
					estadoUnidad = 'Deshabilitar(\'' + item.idunidadcompra + '\')'
					classBtn = ' palette-Green'
				}else{
					if (item.estado == 1) {
						estadoUnidad = 'Habilitar(\'' + item.idunidadcompra + '\')'
						classBtn = ' palette-Orange'
					}
				}
				console.log(item.estado)
				cont++
				$("#tbodyUnidadesC").append(
					'<tr>'+
					'<td>' + cont + '</td>' +
					'<td>' + item.Sigla +'</td>' +
					'<td>' + item.nombreUnidadcompra + '</td>'+
					'<td>' + item.Equivalente +'</td>' +
					'<td>' + item.nombreunidadmedida +'</td>' +
					'<td>'+
					'<button type="button" class="btn palette-Light-Blue bg" onclick="PasarParamVen(\'' + item.nombreUnidadcompra + '\', \'' + item.Sigla + '\', \'' + item.Equivalente + '\', \'' + item.UnidadMedidaId + '\', \'' + item.idunidadcompra + '\')"><i class="zmdi zmdi-account"></i></button>'+
					'<button type="button" class="btn ' + classBtn +' bg" onclick="' + estadoUnidad +'"><i class="zmdi zmdi-account"></i></button>' +
					'</td>' +
					'</tr>'
				)
			});
		}
	})
}
ListarUnidades()

function PasarParamVen(nombreUnidadmedida, siglaUnidadMedida, equivalente, idunidadmedida, unidadId){
	$("#NombreUnidadCompra").val(nombreUnidadmedida)
	$("#siglaC").val(siglaUnidadMedida)
	$("#UnidadCId").val(unidadId)
	$("#equivalent").val(equivalente)
	$("#Unidad").val(idunidadmedida).selectpicker("refresh");
	$("#btn-guardarUnidades").attr('onclick','EditarUC()')
	$("#NombreUnidadCompra").focus()
	$(".cobligatorio").each(function (indice, input) {
		$(input).css('border-bottom', '1px solid #e0e0e0')
	})
}

function EditarUC(){
	var NombreUCompra 	= $("#NombreUnidadCompra").val()
	var sigla 			= $("#siglaC").val()
	var UnidadCId		= $("#UnidadCId").val()
	var UnidadMedidaid  = $("#Unidad").val()
	var equivalent		= $("#equivalent").val()

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
			url: ruta_universal + 'unidadcompra_controllers/Editar',
			type:'POST',
			data:{
				'NombreUCompra':NombreUCompra,
				'sigla':sigla,
				'UnidadCId':UnidadCId,
				'UnidadMedidaid':UnidadMedidaid,
				'equivalent':equivalent
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

					$("#NombreUnidadCompra").val('')
					$("#siglaC").val('')
					$("#UnidadCId").val('')
					$("#equivalent").val('')
					$("#Unidad").val('default').selectpicker("refresh");
					$("#btn-guardarUnidades").attr('onclick', 'guardaruc()')
					$("#tbodyUnidadesC").html('')
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
			url: ruta_universal + 'unidadcompra_controllers/Deshabilitar',
			type:'POST',
			data:{
				'unidadId': unidadId
			},
			cache:false,
			success:function(data){
				if(data == 2){
						$.growl.error({
							title: "Opps!",
							message: "ocurrio un problema al deshabiltar la unidad de compra seleccionada, intenta nuevamente, o consulta a soporte"
						});
				}else{
					if(data == 1){
						$.growl.notice({
							title: "Éxito!",
							message: "la unidad de compra seleccionada fue deshabilitada satisfactoriamente"
						});
						$("#tbodyUnidadesC").html('')
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
			url: ruta_universal + 'unidadcompra_controllers/Habilitar',
			type: 'POST',
			data: {
				'unidadId': unidadId
			},
			cache: false,
			success: function (data) {
				if(data == 2){
					$.growl.error({
						title: "Opps!",
						message: "ocurrio un problema al habiltar la unidad de compra seleccionada, intenta nuevamente, o consulta a soporte"
					});
				}else{
					if(data == 1){
						$.growl.notice({
							title: "Éxito!",
							message: "la unidad de compra seleccionada fue habilitado satisfactoriamente"
						});
						$("#tbodyUnidadesC").html('')
					}
				}
			}, complete:function(){
				ListarUnidades()
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