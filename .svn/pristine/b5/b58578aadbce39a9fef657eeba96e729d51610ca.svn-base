var ruta_universal = baseurl



function listarComboTipoProducto(){
	$.ajax({
		url: ruta_universal + 'tipoproducto_controllers/listarComboTipoProducto',
		type:'POST',
		cache:false,
		success:function(data){
			
			var datos = JSON.parse(data)
			$.each(datos, function(i, item){
				$("#cbxTipoProducto").append(
					'<option value="' + item.idTipoProducto + '">' + item.nombreTipoProducto +'</option>'
				)
			})
			$(".selectpicker").selectpicker()
		}
	})
}

listarComboTipoProducto()
// 
