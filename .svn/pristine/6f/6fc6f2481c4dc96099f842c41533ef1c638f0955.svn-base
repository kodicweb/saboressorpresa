var ruta_universal = baseurl

function guardarCargo(){
	var txtNombreCargo = $("#txtNombreCargo").val()
	var txtDescripcion = $("#txtDescripcion").val()

	var swCamposObligatorios = 0
	$(".cobligatorio").each(function (indice, input) {
		if ($(input).val() == "") {
			swCamposObligatorios = 1
			$(input).css('border-bottom', '1px solid red')
			$(input).css('placeholder', 'Campo Obligatorio')
		}
	})

	if (swCamposObligatorios == 1) {
		$.growl.warning({
			title: "Opps!",
			message: "Hay campos obligatorios que estan vacíos, por favor llenar la información correspondiente"
		});
	}else{
		$.ajax({
			url: ruta_universal + 'cargo_controllers/guardarCargo',
			type: 'POST',
			data:{
				'nombre': txtNombreCargo,
				'descripcion': txtDescripcion
			},
			cache:false,
			success:function(data){
				if (data == 2) {
					$.growl.error({
						title: "Opps!",
						message: "ocurrio un problema al ingresar los datos, intenta nuevamente, o consulta a soporte"
					});
				}else{
					if (data == 1) {
						$("#tbodyCargo").html('')
						$.growl.notice({
							title: "Éxito!",
							message: "Se registro la información satisfactoriamente"
						});

						$("#txtNombreCargo").val('')
						$("#txtDescripcion").val('')
					}
				}
			},complete:function(){
				ListarCargo()
			}
		})
	}
}

function ListarCargo(){
	var cont = 0
	var classBtn
	var estadoProducto
	$.ajax({
		url: ruta_universal + 'cargo_controllers/ListarCargo',
		type: 'POST',
		cache:false,
		success:function(data){
			var tabla = JSON.parse(data)
			$.each(tabla, function(i, item){
				cont++
				if (item.eliminado == 0) {
					estadoProducto = 'DeshabilitarCargo(\'' + item.cargoId + '\')'
					classBtn = ' palette-Green'
				} else {
					if (item.eliminado == 1) {
						estadoProducto = 'HabilitarCargo(\'' + item.cargoId + '\')'
						classBtn = ' palette-Orange'
					}
				}
				$("#tbodyCargo").append(
					'<tr>'+
						'<td>'+ cont +'</td>'+
						'<td>' + item.Nombre +'</td>' +
						'<td>' + item.Descripcion +'</td>' +
						'<td>'+
					'<button type="button" class="btn palette-Light-Blue bg" onclick="PasarParamVenCargo(\'' + item.cargoId + '\', \'' + item.Nombre + '\', \'' + item.Descripcion + '\')"><i class="zmdi zmdi-account"></i></button>' +
					'<button type="button" class="btn ' + classBtn + ' bg" onclick="' + estadoProducto + '"><i class="zmdi zmdi-account"></i></button>' +
						'</td>' +
					'</tr>'
				)
			})
		}
	})
}

ListarCargo()

function PasarParamVenCargo(cargoId, Nombre, Descripcion){
	$("#txtNombreCargo").val(Nombre)
	$("#txtDescripcion").val(Descripcion)
	$("#txtIdCargo").val(cargoId)

	$("#btn-guardarCargo").attr('onclick','EditarCargo()')
}

function EditarCargo(){

	var txtNombreCargo = $("#txtNombreCargo").val()
	var txtDescripcion = $("#txtDescripcion").val()
	var txtIdCargo = $("#txtIdCargo").val()

	var swCamposObligatorios = 0
	$(".cobligatorio").each(function (indice, input) {
		if ($(input).val() == "") {
			swCamposObligatorios = 1
			$(input).css('border-bottom', '1px solid red')
			$(input).css('placeholder', 'Campo Obligatorio')
		}
	})

	if (swCamposObligatorios == 1) {
		$.growl.warning({
			title: "Opps!",
			message: "Hay campos obligatorios que estan vacíos, por favor llenar la información correspondiente"
		});
	} else {
		$.ajax({
			url: ruta_universal + 'cargo_controllers/EditarCargo',
			type: 'POST',
			data: {
				'nombre': txtNombreCargo,
				'descripcion': txtDescripcion,
				'txtIdCargo': txtIdCargo
			},
			cache: false,
			success: function (data) {
				if(data == 1){
					$("#tbodyCargo").html('')
					$.growl.notice({
						title: "Éxito!",
						message: "Se modificó la información satisfactoriamente"
					});
					$("#txtNombreCargo").val('')
					$("#txtDescripcion").val('')
					$("#txtIdCargo").val('')
					$("#btn-guardarCargo").attr('onclick', 'guardarCargo()')
				}else{
					$.growl.error({
						title: "Opps!",
						message: "Ocurrio un problema, consulte al administrador del sistema "
					});
				}
				
			}, complete: function () {
				ListarCargo()
			}
		})
	}

}

function DeshabilitarCargo(cargoId){
	$.ajax({
		url:ruta_universal + 'cargo_controllers/eliminarCargo',
		type:'POST',
		data:{
			'cargoId':cargoId,
			'estado': 1
		},
		cache:false,
		success:function(data){
			if (data == 1) {
				$("#tbodyCargo").html('')
				$.growl.notice({
					title: "Éxito!",
					message: "Se deshabilitó el cargo satisfactoriamente"
				});
			}
		},complete:function(){
				ListarCargo()
			}
	})
}

function HabilitarCargo(cargoId){
	$.ajax({
		url:ruta_universal + 'cargo_controllers/eliminarCargo',
		type:'POST',
		data:{
			'cargoId':cargoId,
			'estado': 0
		},
		cache:false,
		success:function(data){
			if(data == 1){
				$("#tbodyCargo").html('')
				$.growl.notice({
					title: "Éxito!",
					message: "Se habilitó el cargo satisfactoriamente"
				});
			}
		},complete:function(){
			ListarCargo()
		}
	})
}

function cancelarCargo(){
	$("#txtNombreCargo").val('')
	$("#txtDescripcion").val('')
	$("#txtIdCargo").val('')
	$("#btn-guardarCargo").attr('onclick', 'guardarCargo()')
	$("#txtNombreCargo").focus()
}
