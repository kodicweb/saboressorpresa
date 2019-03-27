var ruta_universal = baseurl

$("#txtFechaVencimiento").datetimepicker({
	format: 'YYYY-MM-DD'
})

function guardarCompra(){
	var cbxproveedor 		= $("#cbxproveedor").val()
	var txtCantidad 		= $("#txtCantidad").val()
	var txtCostoUnitario 	= $("#txtCostoUnitario").val()
	var txtCostoTotal 		= $("#txtCostoTotal").val()
	var txtlote 			= $("#txtlote").val()
	var txtObservaciones 	= $("#txtObservaciones").val()
	var cbxproducto 		= $("#cbxproducto").val()
	var txtFactura			= $("#txtFactura").val()
	var txtFechaVencimiento	= $("#txtFechaVencimiento").val()

	var swCamposObligatorios = 0
	$(".cobligatorio").each(function (indice, input) {
		if ($(input).val() == "") {
			swCamposObligatorios = 1
			$(input).css('border-bottom', '1px solid red')
			$(input).css('placeholder', 'Campo Obligatorio')
		}
	})

	if (swCamposObligatorios == 1){
		$.growl.warning({
			title: "Opps!",
			message: "Hay campos obligatorios que estan vacíos, por favor llenar la información correspondiente"
		});
	}else{
		$.ajax({
			url: ruta_universal + 'Compras_controllers/Guardar',
			type:'POST',
			data:{
				'cbxproveedor': cbxproveedor,
				'txtCantidad': txtCantidad,
				'txtCostoUnitario': txtCostoUnitario,
				'txtCostoTotal': txtCostoTotal,
				'txtlote': txtlote,
				'txtObservaciones': txtObservaciones,
				'cbxproducto': cbxproducto,
				'txtFactura':txtFactura,
				'txtFechaVencimiento':txtFechaVencimiento
			},
			cache:false,
			success:function(data){
				if(data == 2){
					$.growl.error({
						title: "Opps!",
						message: "ocurrio un problema al ingresar los datos, intenta nuevamente, o consulta a soporte"
					});
				}else{
					$("#tbodyCompra").html('')
					$.growl.notice({
						title: "Éxito!",
						message: "Se registro la información satisfactoriamente"
					});

					$("#cbxproveedor").val('')
					$("#txtCantidad").val('')
					$("#txtCostoUnitario").val('')
					$("#txtCostoTotal").val('')
					$("#txtlote").val('')
					$("#txtObservaciones").val('')
					$("#cbxproducto").val('')
					$("#txtFactura").val('')
					$("#txtFechaVencimiento").val('')
				}
			}, complete: function () {
				ListarCompras()
			}
		})
	}
}

function EditarCompra(){
	var cbxproveedor = $("#cbxproveedor").val()
	var txtCantidad = $("#txtCantidad").val()
	var txtCostoUnitario = $("#txtCostoUnitario").val()
	var txtCostoTotal = $("#txtCostoTotal").val()
	var txtlote = $("#txtlote").val()
	var txtObservaciones = $("#txtObservaciones").val()
	var cbxproducto = $("#cbxproducto").val()
	var txtFactura = $("#txtFactura").val()
	var txtFechaVencimiento = $("#txtFechaVencimiento").val()
	var idCompra = $("#txtIdCompra").val()

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
			url: ruta_universal + 'Compras_controllers/EditarCompra',
			type: 'POST',
			data: {
				'cbxproveedor': cbxproveedor,
				'txtCantidad': txtCantidad,
				'txtCostoUnitario': txtCostoUnitario,
				'txtCostoTotal': txtCostoTotal,
				'txtlote': txtlote,
				'txtObservaciones': txtObservaciones,
				'cbxproducto': cbxproducto,
				'txtFactura': txtFactura,
				'txtFechaVencimiento': txtFechaVencimiento,
				'idCompra': idCompra
			},
			cache:false,
			success:function(data){
				if(data == 1){
					$("#tbodyCompra").html('')
					$.growl.notice({
						title: "Éxito!",
						message: "Se modifico la información satisfactoriamente"
					});
				}
			},complete:function(){
				ListarCompras()
			}
		})
	}
}

function CalcularvalorTotal(){
	var txtCantidad 		= $("#txtCantidad").val()
	var txtCostoUnitario 	= $("#txtCostoUnitario").val()


	if (txtCantidad === '' && txtCostoUnitario != ''){
		$("#txtCostoTotal").val(0)
	}else{
		if (txtCostoUnitario === '' && txtCantidad === ''){
			$("#txtCostoTotal").val(0)
		}else{
			if (txtCantidad != '' && txtCostoUnitario === '') { 
				$("#txtCostoTotal").val(0)
			}else{
				var resultado = parseInt(txtCantidad) * parseFloat(txtCostoUnitario)
				$("#txtCostoTotal").val(resultado)
			}
		}
	}
	
	//$("#txtCostoTotal").val()

}

function ListarCompras(){
	var cont = 0
	$.ajax({
		url: ruta_universal + 'Compras_controllers/ListarCompras',
		type:'POST',
		cache:false,
		success:function(data){
			var tabla = JSON.parse(data)
			$.each(tabla, function(i, item){
				cont++
				$("#tbodyCompra").append(
					'<tr>'+
						'<td>' + item.nombreProducto +'</td>' +
						'<td>' + item.nombreProveedor +'</td>' +
						'<td>' + item.Cantidad +'</td>' +
						'<td>' + item.CostoUnitario+'</td>' +
						'<td>' + item.CostoTotal+'</td>' +
						'<td>' + item.NumeroFactura+'</td>' +
						'<td>' + item.lote+'</td>' +
						'<td>' + item.FechaVenciemiento+'</td>' +
						'<td>'+ 
						'<button type="button" class="btn palette-Light-Blue bg" onclick="PasarParamVentana(\'' + item.idCompra + '\', \'' + item.idProducto + '\', \'' + item.idProvedor + '\', \'' + item.Cantidad + '\', \'' + item.CostoUnitario + '\', \'' + item.CostoTotal + '\', \'' + item.NumeroFactura + '\', \'' + item.lote + '\', \'' + item.FechaVenciemiento + '\', \'' + item.Observaciones + '\')">  '+
							'<i class="zmdi zmdi-account"></i>'
							+'</button>'+
						'<button type="button" class="btn palette-Red bg" onclick="EliminarCompra(\'' + item.idCompra + '\')">' +
						'<i class="zmdi zmdi-close-circle"></i>'
						+ '</button>' +
						'</td>' +
					'</tr>'
				)
			})
		} //Observaciones
	})
}
ListarCompras()


function PasarParamVentana(idCompra, idProducto, idProvedor, Cantidad, CostoUnitario, CostoTotal, NumeroFactura, lote, FechaVenciemiento, Observaciones){

	$("#txtIdCompra").val(idCompra)
	$("#cbxproveedor").val(idProvedor)
	$("#txtCantidad").val(Cantidad)
	$("#txtCostoUnitario").val(CostoUnitario)
	$("#txtCostoTotal").val(CostoTotal)
	$("#txtlote").val(lote)
	$("#txtObservaciones").val(Observaciones)
	$("#cbxproducto").val(idProducto)
	$("#txtFactura").val(NumeroFactura)
	$("#txtFechaVencimiento").val(FechaVenciemiento)
	$("#btn-registrarCompra").attr('onclick','EditarCompra()')

}

function EliminarCompra(idCompra){

	if (idCompra === ''){

	}else{
		$.ajax({
			url: ruta_universal + 'Compras_controllers/EliminarCompra',
			type:'POST',
			data:{
				'idCompra': idCompra
			},
			cache:false,
			success:function(data){
				if(data == 1){
					$("#tbodyCompra").html('')
					$.growl.notice({
						title: "Éxito!",
						message: "La compra se elimino con éxito"
					});
				}
			},complete:function(){
				ListarCompras()
			}
		})
	}
}

function nuevaCompra(){
	$("#cbxproveedor").val('')
	$("#txtCantidad").val('')
	$("#txtCostoUnitario").val('')
	$("#txtCostoTotal").val('')
	$("#txtlote").val('')
	$("#txtObservaciones").val('')
	$("#cbxproducto").val('')
	$("#txtFactura").val('')
	$("#txtFechaVencimiento").val('')
	$("#txtIdCompra").val('')
	$("#btn-registrarCompra").attr('onclick', 'guardarCompra()')
}
