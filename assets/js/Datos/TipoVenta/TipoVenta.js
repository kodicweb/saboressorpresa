var rutaUniversal = baseurl;


function ListarTipoVentaCombo() {
	$.ajax({
		url: rutaUniversal + 'Tipoventa_controllers/ListarTipoVentaCombo',
		type: 'POST',
		cache: false,
		success: function (data) {

			var datos = JSON.parse(data)
			$.each(datos, function (i, item) {
				$("#cbxTipoVenta").append(
					'<option value="' + item.TipoVentaId + '">' + item.nombreTipoVenta + '</option>'
				)
			})
			$("#cbxTipoVenta").selectpicker()
		}
	})
}
ListarTipoVentaCombo();
