var rutaUniversal = baseurl;

$(".selectpicker").selectpicker();

function cancelar(){
	$("#nombre").val('');
    $("#identificacion").val('');
    $("#email").val('');
    $("#direccion").val('');
    $("#telefono").val('');
    $("#username").val('');
    $("#password").val('');
    $("#cargo").val('default').selectpicker("refresh");
}

function guardar() {
    var empleado = $("#nombre").val();
    var identificacion = $("#identificacion").val();
    var email = $("#email").val();
    var direccion = $("#direccion").val();
    var cargo = $("#cargo").val();
    var username = $("#username").val();
    var password = $("#password").val();

    if(empleado === ''){
        $.growl.error({
            title: "Atención!",
            message: "Digite el nombre del empleado"
          });
    
    } 
    else if(identificacion === '') {
        $.growl.error({
            title: "Atención!",
            message: "Digite el numero de identificacion"
          });
    } 
    else if(email === '') {
        $.growl.error({
            title: "Atención!",
            message: "Digite un correo electronico"
          });
    }
    else if(direccion === '') {
        $.growl.error({
            title: "Atención!",
            message: "Digite la direccion de residencia"
          });
    }
    else if(cargo === '0') {
        $.growl.error({
            title: "Atención!",
            message: "Digite el cargo del empleado"
          });
    }
    else if(username === '') {
        $.growl.error({
            title: "Atención!",
            message: "Digite un nombre de usuario"
          });
    }
    else if(password === '') {
        $.growl.error({
            title: "Atención!",
            message: "Digite una contraseña"
          });
    }
    else{
        $.ajax({
            url: rutaUniversal + 'Cuser/guardar',
            type: 'POST',
            data: $("#registroUsuarios").serialize(),
            success: function (data) {
                if (data) {
                    $.growl.notice({
                        title: "Exito!",
                        message: "Usuario guardado correctamente"
                      });
                    $("#nombre").val('');
                    $("#identificacion").val('');
                    $("#email").val('');
                    $("#direccion").val('');
                    $("#telefono").val('');
                    $("#username").val('');
                    $("#password").val('');
                    $("#cargo").val('default').selectpicker("refresh");
    
                } else {
                    $.growl.notice({
                        title: "Atención!",
                        message: "Ocurrio un error"
                      });
                }
            }
        })
    }
}

function Listarusuario(){
	var cont = 0
	$.ajax({
		url: rutaUniversal + 'Cuser/Listarusuario',
		type:'POST',
		cache:false,
		success:function(data){
			var tabla = JSON.parse(data);
			$.each(tabla, function(i, item){
				cont++
				$("#tbodyUsuario").append(
					'<tr>'+
					'<td>' + cont + '</td>' +
					'<td>' + item.PrimerNombre +'</td>'+
					'<td>' + item.Identificacion +'</td>' +
					'<td>' + item.NombreUsuario +'</td>' +
					'<td>' + item.cargo +'</td>' +
					'</tr>'
				)
			})
		}
	})
}

Listarusuario()