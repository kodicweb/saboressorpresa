var rutaUniversal = baseurl;


function ListarClienteCombo() {
	$.ajax({
		url: rutaUniversal + 'Venta_controllers/ListarClienteCombo',
		type: 'POST',
		cache: false,
		success: function (data) {

			var datos = JSON.parse(data)
			$.each(datos, function (i, item) {
				$("#cbxCliente").append(
					'<option value="' + item.idCliente + '">' + item.nombre + '</option>'
				)
			})
			$("#cbxCliente").selectpicker()
		}
	})
}
ListarClienteCombo();

var contProducto = 0
function ListarCamposDetalleVenta(){
	
	contProducto++
	
	$("#DetalleProductoVenta").append(
		'<div class="row m-t-5 fila" id="fila' + contProducto + '">' +
			'<div class="col-sm-4">' +
				'<div class="input-group">' +
					'<span class="input-group-addon col-sm-1"><i class="zmdi zmdi-key zmdi-hc-fw"></i></span>' +
					'<div class="col-sm-3 m-b-25">' +
						'<select class="selectpicker" data-live-search="true" id="cbxProductoDetalle' + contProducto + '" name="cbxProductoDetalle" onchange="TraerCostos(\'cbxProductoDetalle \', \'' + contProducto + '\')">' +
						'<option value="0">Seleccione el producto...</option>' +
						'</select>' +
					'</div>' +
				'</div>' +
			'</div>' +
			'<div class="col-sm-2">' +
				'<div class="input-group">' +
					'<span class="input-group-addon"><i class="zmdi zmdi-account"></i></span>' +
					'<div class="fg-line">' +
						'<input type="number" min="0" name="costoUnitarioDetalle" id="costoUnitarioDetalle' + contProducto + '" class="form-control vobligatorio" placeholder="CostoUnitario" onkeyup="calcularCostoDetalleVenta(\'' + contProducto + '\')">' +
					'</div>' +
				'</div>' +
			'</div>' +
			'<div class="col-sm-2">' +
				'<div class="input-group">' +
					'<span class="input-group-addon"><i class="zmdi zmdi-account"></i></span>' +
					'<div class="fg-line">' +
					'<input type="number" min="0" name="cantidadDetalle" id="cantidadDetalle' + contProducto + '" class="form-control vobligatorio" placeholder="Cantidad" onkeyup="calcularCostoDetalleVenta(\'' + contProducto + '\')">' +
					'</div>' +
				'</div>' +
			'</div>' +
			'<div class="col-sm-2">' +
				'<div class="input-group">' +
					'<span class="input-group-addon"><i class="zmdi zmdi-account"></i></span>' +
					'<div class="fg-line">' +
					'<input type="number" min="0" name="TotalProductoDetalle" id="TotalProductoDetalle' + contProducto + '" class="form-control sumcostototal" placeholder="Total" disabled>' +
					'</div>' +
				'</div>' +
			'</div>' +
			'<div class="col-sm-2">' +
				'<div class="btn-colors">' +
				'<button type="button" id="eliminafila' + contProducto + '" onclick="EliminarFilaVenta(\'' + contProducto + '\', \'fila\')" class="btn btn-danger btn-icon waves-effect waves-circle waves-float"><i class="zmdi zmdi-delete mdc-text-red"></i></button>' +
				'</div>' +
			'</div>' +
			'<input type="hidden" id="CantidadDis' + contProducto +'" name="cantidadDispoDetalle">'+
			'<input type="hidden" id="idStock' + contProducto + '" name="stockDetalle">' +
		'</div>'
	)
	ListarProductoVenta(contProducto, 'cbxProductoDetalle')
}

function ListarProductoVenta(cont, tipo){

	$.ajax({
		url: rutaUniversal + 'Producto_controllers/ListarProductosVentas',
		type:'POST',
		cache:false,
		success:function(data){
			
			var datos = JSON.parse(data)
			$.each(datos, function(i, item){
				$("#cbxProductoDetalle" +cont).append(
					'<option costouni="' + item.cantidadDisponible + '" stock="' + item.idStockt +'" value="' + item.idProducto + '">' + item.nombreProducto + '</option>'
				)
				$("#cbxProductoDetalle" + cont).selectpicker('refresh')
			})
		}
	})
}

function TraerCostos(tipo, cont){
	
	var cantidadDisponible = $("#cbxProductoDetalle"+cont+" option:selected").attr("costouni")
	var stock = $("#cbxProductoDetalle" + cont + " option:selected").attr("stock")
	
	var acum = 0
	var nuevacantidadstock = 0
	$("#CantidadDis" + cont).val(cantidadDisponible)
	$("#idStock" + cont).val(stock)
	
	var costoUnitario = $("#costoUnitarioDetalle"+cont)
	costoUnitario.focus()
	//var costoU = cu.attr('costouni')

	var cantidad = $("#cantidadDetalle" + cont)
	//cantidad.focus()
	if(cantidad.val() != ''){
		if (cantidad.val() <= cantidadDisponible){
			nuevacantidadstock = parseInt(cantidadDisponible) - parseInt(cantiad.val())
			$("#CantidadDis" + cont).val(nuevacantidadstock)
			var resultado = parseInt(costoUnitario.val()) * parseInt(cantidad.val())
			var TotalProductoDetalle = $("#TotalProductoDetalle" + cont)
			TotalProductoDetalle.val(resultado)
			$(".sumcostototal").each(function (indice, input) {
				acum = parseInt($(input).val()) + parseInt(acum)
			})
			
			$("#vlrTotalVenta").css('font-weight','bold')
			$("#vlrTotalVenta").css('color', '#000')
			$("#vlrTotalVenta").val(acum);

			var iva = parseInt(acum) * 0.16
			$("#vlrIva").val(iva)

			var ValorTotalVenta = parseInt(iva) + parseInt(acum)

			$("#vlrTotalVentaIva").val(ValorTotalVenta)
			$("#vlrIva").css('font-weight','bold')
			$("#vlrIva").css('color','#000')
			$("#vlrTotalVentaIva").css('color','red')
			$("#vlrTotalVentaIva").css('font-weight','bold')
			$("#vlrTotalVentaIva").css('font-size','16px')
		}else{
			alert('la cantidad solicitada es mayor a al stock del producto, cantidad:' + cantidadDisponible+'')
		}
	}

}

function calcularCostoDetalleVenta(cont){
	var costoUnitario = $("#costoUnitarioDetalle" + cont)
	var cantiad 	  = $("#cantidadDetalle"+cont)
	var acum = 0
	var resultado
	var TotalProductoDetalle
	var cantidadDisponible = $("#cbxProductoDetalle" + cont + " option:selected").attr("costouni")
	var nuevacantidadstock = 0
	
	if (cantiad.val() != ''){
		if (cantiad.val() <= cantidadDisponible) {
			nuevacantidadstock = parseInt(cantidadDisponible) - parseInt(cantiad.val())
			$("#CantidadDis" + cont).val(nuevacantidadstock)
			resultado = parseInt(costoUnitario.val()) * parseInt(cantiad.val())
			TotalProductoDetalle = $("#TotalProductoDetalle"+cont)
			TotalProductoDetalle.val(resultado)
		
			$(".sumcostototal").each(function (indice, input) {
				acum = parseInt($(input).val()) + parseInt(acum)
			})
			
			$("#vlrTotalVenta").css('font-weight','bold')
			$("#vlrTotalVenta").css('color', '#000')
			$("#vlrTotalVenta").val(acum);

			var iva = parseInt(acum) * 0.16

			$("#vlrIva").val(iva)

			var ValorTotalVenta = parseInt(iva) + parseInt(acum)

			$("#vlrTotalVentaIva").val(ValorTotalVenta)
			$("#vlrIva").css('font-weight','bold')
			$("#vlrIva").css('color','#000')
			$("#vlrTotalVentaIva").css('color','red')
			$("#vlrTotalVentaIva").css('font-weight','bold')
			$("#vlrTotalVentaIva").css('font-size','16px')
		}else{
			$.growl.warning({
				title: "Opps!",
				message: "la cantidad solicitada es mayor a al stock del producto, cantidad disponble: " + cantidadDisponible+""
			});
			cantiad.val('')
			$("#CantidadDis" + cont).val(cantidadDisponible)
			//alert('la cantidad solicitada es mayor a al stock del producto, cantidad disponble:' + cantidadDisponible + '')
		}
	}else{
		resultado = 0
		$("#CantidadDis" + cont).val(cantidadDisponible)
		TotalProductoDetalle = $("#TotalProductoDetalle" + cont)
		TotalProductoDetalle.val(resultado)
		$(".sumcostototal").each(function (indice, input) {
			acum = parseInt($(input).val()) + parseInt(acum)
		})

		$("#vlrTotalVenta").css('font-weight', 'bold')
		$("#vlrTotalVenta").css('color', '#000')
		$("#vlrTotalVenta").val(acum);

		var iva = parseInt(acum) * 0.16

		$("#vlrIva").val(iva)

		var ValorTotalVenta = parseInt(iva) + parseInt(acum)

		$("#vlrTotalVentaIva").val(ValorTotalVenta)
		$("#vlrIva").css('font-weight', 'bold')
		$("#vlrIva").css('color', '#000')
		$("#vlrTotalVentaIva").css('color', 'red')
		$("#vlrTotalVentaIva").css('font-weight', 'bold')
		$("#vlrTotalVentaIva").css('font-size', '16px')
	}
}

function EliminarFilaVenta(cont, tipo){
	var check = $("#" + tipo + cont)
	check.remove()
	var acum = 0
	$(".sumcostototal").each(function (indice, input) {
		acum = parseInt($(input).val()) + parseInt(acum)
	})
	$("#vlrTotalVenta").css('font-weight', 'bold')
	$("#vlrTotalVenta").css('color', '#000')
	$("#vlrTotalVenta").val(acum);
	var iva = parseInt(acum) * 0.16
	$("#vlrIva").val(iva)
	var ValorTotalVenta = parseInt(iva) + parseInt(acum)

	$("#vlrTotalVentaIva").val(ValorTotalVenta)
	$("#vlrIva").css('font-weight', 'bold')
	$("#vlrIva").css('color', '#000')
	$("#vlrTotalVentaIva").css('color', 'red')
	$("#vlrTotalVentaIva").css('font-weight', 'bold')
	$("#vlrTotalVentaIva").css('font-size', '16px')
}

function GuardarVenta(){

	var cbxCliente 			= $("#cbxCliente").val()
	var cbxTipoVenta 		= $("#cbxTipoVenta").val()
	var vlrTotalVenta 		= $("#vlrTotalVenta").val()
	var vlrIva 				= $("#vlrIva").val()
	var vlrTotalVentaIva 	= $("#vlrTotalVentaIva").val()

	var swCamposObligatorios = 0
	$(".vobligatorio").each(function (indice, input) {
		if ($(input).val() == "") {
			swCamposObligatorios = 1
			$(input).css('border-bottom', '1px solid red')
			$(input).css('placeholder', 'Campo Obligatorio')
			$(input).focus()
		}
	})

	var arrayproducto = []
	$("#DetalleProductoVenta select[name=cbxProductoDetalle]").each(function () {
		arrayproducto.push($(this).val())
	})

	var arrayCostoUnitario = []
	$("#DetalleProductoVenta input[name=costoUnitarioDetalle]").each(function () {
		arrayCostoUnitario.push($(this).val())
	})

	var arraycantidadDetalle = []
	$("#DetalleProductoVenta input[name=cantidadDetalle]").each(function () {
		arraycantidadDetalle.push($(this).val())
	})

	var arrayTotalProductoDetalle = []
	$("#DetalleProductoVenta input[name=TotalProductoDetalle]").each(function () {
		arrayTotalProductoDetalle.push($(this).val())
	})

	var arraycantidadDispoDetalle = []
	$("#DetalleProductoVenta input[name=cantidadDispoDetalle]").each(function () {
		arraycantidadDispoDetalle.push($(this).val())
	})

	var arraystockDetalle = []
	$("#DetalleProductoVenta input[name=stockDetalle]").each(function () {
		arraystockDetalle.push($(this).val())
	})


	if(swCamposObligatorios == 1){
		$.growl.warning({
			title: "Opps!",
			message: "Hay campos obligatorios que estan vacíos, por favor llenar la información correspondiente"
		});
	}else{

		$.ajax({
			url: rutaUniversal + 'Venta_controllers/GuardarVenta',
			type:'POST',
			data:{
				'cbxCliente': cbxCliente,
				'cbxTipoVenta': cbxTipoVenta,
				'vlrTotalVenta': vlrTotalVenta,
				'vlrIva': vlrIva,
				'vlrTotalVentaIva': vlrTotalVentaIva,
				'arrayproducto': arrayproducto,
				'arrayCostoUnitario': arrayCostoUnitario,
				'arraycantidadDetalle': arraycantidadDetalle,
				'arrayTotalProductoDetalle': arrayTotalProductoDetalle,
				'arraycantidadDispoDetalle': arraycantidadDispoDetalle,
				'arraystockDetalle': arraystockDetalle
			},
			cache:false,
			success:function(data){
				if(data == 1){
					$.growl.notice({
						title: "Éxito!",
						message: "Se registro la la venta con satisfación"
					});
					$("#cbxCliente").val('')
					$("#cbxTipoVenta").val('')
					$("#vlrTotalVenta").val('')
					$("#vlrIva").val('')
					$("#vlrTotalVentaIva").val('')
					$("#DetalleProductoVenta").html('')
				}else{
					$.growl.notice({
						title: "Opps!",
						message: "Ocurrio un problema al momento de guardar la venta, por favor comunicarse con administradpor del sistema"
					});
				}
			}
		})

	}
}


