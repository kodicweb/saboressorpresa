var rutaUniversal = baseurl;



function Ingresar(){
    var txtUsuario  = $("#txtUsuario").val()
    var txtPassword = $("#txtPassword").val()

    // Validación de campos vacíos
    if(txtUsuario === ''){
        alert('Campo no puede quedar vacío')
        $("#txtUsuario").focus()
    }else{
        if(txtPassword === ''){
            alert('Campo no puede quedar vacío')
            $("#txtPassword").focus()
        }else{
            // Implementamos ajax
            $.ajax({
                url: rutaUniversal + 'login_controllers/Ingresar',
				type: 'POST',
				data: {
                    'txtUsuario'  : txtUsuario,
                    'txtPassword' : txtPassword
                },
				success: function (data) {
					if (data == 1) {
						// swal('Bienvenido')
						location.href = rutaUniversal + 'principal'
					} else {
                        //swal('Error!', 'Usuario o contraseña incorrecta, ingrese nuevamente sus credenciales', 'error')
                        alert('Usuario o contraseña incorrecta, ingrese nuevamente sus credenciales')
					}
				}
            })
        }
    }
}