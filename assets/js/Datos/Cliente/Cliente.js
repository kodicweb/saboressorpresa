var ruta_universal = baseurl

$("#FechaNac").datetimepicker({
	format: 'YYYY-MM-DD'
})


$('[name="inlineRadioOptions"]').change(function (event) {
	if($("#Si").is(':checked')){
       // $("#InfoHijos").removeClass("hidden");
		$("#add").removeClass("hidden");
		AnadirHijos()
    } else{
        //$("#InfoHijos").addClass("hidden");
		$("#add").addClass("hidden");
		LimpiarInfoHijos()
    }
});

function LimpiarInfoHijos() {
	$("#InfoHijos").html('')
}

function QuitarErrorCampo(idCampo){
	var idCampoObligatorio = $("#"+idCampo)
	var p = idCampoObligatorio.attr('id')
	if (idCampoObligatorio.val() != ''){
		idCampoObligatorio.css('border-bottom', '1px solid #e0e0e0')
	}
}

function guardar(){
	var TieneHijo = 0;
	var NombreCliente = $("#NombreCliente").val()
	var SegundoNombre = $("#SegundoNombre").val()
	var ApePaterno = $("#ApePaterno").val()
	var ApeMaterno = $("#ApeMaterno").val()
	var Identificacion = $("#Identificacion").val()
	var FechaNac = $("#FechaNac").val()
	var Direccion = $("#Direccion").val()
	var Telefono = $("#Telefono").val()
	var Correo = $("#Correo").val()
	var Celular = $("#Celular").val()
	if ($("#Si").is(':checked')) {
		TieneHijo = 1

		var arrayNombreHijo = []
		$("#InfoHijos input[name=NombreHijo]").each(function(){
			arrayNombreHijo.push($(this).val())
		})
		
		var arrayFechaNcHijo = []
		$("#InfoHijos input[name=FechaNacHijo]").each(function(){
			arrayFechaNcHijo.push($(this).val())
		})
		
		var arrayEdadHijo = []
		$("#InfoHijos input[name=EdadHijo]").each(function(){
			arrayEdadHijo.push($(this).val())
		})

	}
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
			url: ruta_universal +'Cliente_controllers/guardar',
			type:'POST',
			data:{
				'NombreCliente':NombreCliente,
                'SegundoNombre':SegundoNombre,
                'ApePaterno':ApePaterno,
                'ApeMaterno':ApeMaterno,
                'Identificacion':Identificacion,
                'FechaNac':FechaNac,
                'Direccion':Direccion,
                'Telefono':Telefono,
                'Correo':Correo,
				'Celular':Celular,
				'arrayNombreHijo':arrayNombreHijo,
				'arrayFechaNcHijo':arrayFechaNcHijo,
				'arrayEdadHijo':arrayEdadHijo,
				'TieneHijo':TieneHijo
				
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
						$("#NombreCliente").val('')
                        $("#SegundoNombre").val('')
                        $("#ApePaterno").val('')
                        $("#ApeMaterno").val('')
                        $("#Identificacion").val('')
                        $("#FechaNac").val('')
                        $("#Direccion").val('')
                        $("#Telefono").val('')
                        $("#Correo").val('')
						$("#Celular").val('')
						
						$("#Si").prop('checked', false);
						$("#No").prop('checked', true);
						$('[name="inlineRadioOptions"]').change();
						
					}
				}
			},complete:function(){
				//ListarClienta()
			}
		})
	}
}

function cancelar(){
	$("#btn-guardarCliente").attr('onclick', 'guardar()')
	$("#NombreCliente").val('')
	$("#SegundoNombre").val('')
	$("#ApePaterno").val('')
	$("#ApeMaterno").val('')
	$("#Identificacion").val('')
	$("#FechaNac").val('')
	$("#Direccion").val('')
	$("#Telefono").val('')
	$("#Correo").val('')
	$("#Celular").val('')

	$("#Si").prop('checked', false);
    $("#No").prop('checked', true);
    $('[name="inlineRadioOptions"]').change();

	$(".cobligatorio").each(function (indice, input) {
		if ($(input).val() == "") {
			$(input).css('border-bottom', '1px solid #e0e0e0')
		}
	})
}

function calcularEdad() {
	var nacimiento = $("#FechaNacHijo").val();

	$.ajax({
		url: ruta_universal +'Cliente_controllers/calcularEdad',
			type:'POST',
			data:{
				'nacimiento':nacimiento
			},
			cache:false,
			success:function(data){
				
			$("#EdadHijo").val(data)
		},complete:function(){
	
		}
	})

}

var cont = 0;
function AnadirHijos(){
    cont++;
    $("#InfoHijos").append(
        '<div class="row fila" id="fila'+cont+'">'+
			'<div class="col-sm-6">'+
				'<div class="input-group">'+
					'<span class="input-group-addon"><i class="zmdi zmdi-account"></i></span>'+
					'<div class="fg-line">'+
						'<input type="text" name="NombreHijo" id="NombreHijo'+cont+'" class="form-control cobligatorio" placeholder="Nombre Completo">'+
					'</div>'+
				'</div>'+
			'</div>'+

			'<div class="col-sm-3">'+
				'<div class="input-group">'+
					'<span class="input-group-addon"><i class="zmdi zmdi-account"></i></span>'+
					'<input type="text" name="FechaNacHijo" id="FechaNacHijo'+cont+'" class="form-control cobligatorio" placeholder="Fecha de Nacimiento">'+
				'</div>'+
			'</div>'+
			'<div class="col-sm-2">'+
				'<div class="input-group">'+
					'<span class="input-group-addon"><i class="zmdi zmdi-account"></i></span>'+
					'<div class="fg-line">'+
						'<input type="text" name="EdadHijo" id="EdadHijo'+cont+'" class="form-control" disabled placeholder="Edad">'+
					'</div>'+
				'</div>'+
			'</div>'+
			'<div class="btn-colors">' +
				'<button type="button" id="eliminafila'+cont+'" onclick="EliminarFila(\'' + cont + '\', \'fila\')" class="btn btn-default btn-icon waves-effect waves-circle waves-float"><i class="zmdi zmdi-delete mdc-text-red"></i></button>' +
			'</div>'+ 
		'</div>'
	);
	
	$('[name="FechaNacHijo"]').datetimepicker({
		format: 'YYYY-MM-DD'
	}).blur( function () {
		calcularEdad()
	});
    // listarComboProducto2(cont, 'default');
}

