var rutaUniversal = baseurl;
$("#vlrTotal").css('color', 'red')
function listarComboTipoReceta(){
	$.ajax({
		url: rutaUniversal + 'Receta_controllers/listarComboTipoReceta',
		type:'POST',
		cache:false,
		success:function(data){
			
			var datos = JSON.parse(data)
			$.each(datos, function(i, item){
				$("#tiporeceta").append(
					'<option value="' + item.TipoRecetaId + '">' + item.nombreTipoReceta +'</option>'
				)
			})
			$("#tiporeceta").selectpicker()
		}
	})
}
listarComboTipoReceta()

function listarComboSubReceta(){
	$.ajax({
		url: rutaUniversal + 'Receta_controllers/listarComboSubReceta',
		type:'POST',
		cache:false,
		success:function(data){
			
			var datos = JSON.parse(data)
			// $.each(datos, function(i, item){
			// 	$("#Subreceta").append(
			// 		'<option costouni="'+ item.CostoTotal +'" value="' + item.RecetaId + '">' + item.nombreReceta +'</option>'
			// 	)
			// })
			// $("#Subreceta").selectpicker()
			
			$.each(datos, function(i, item){
				$("#listasubr").append(
					
					//'<option costouni="'+ item.CostoTotal +'" value="' + item.RecetaId + '">' + item.nombreReceta +'</option>'+
					'<div class="col-sm-6">'+
						'<div class="col-sm-8" style="padding: 0px !important;">'+
							'<label class="checkbox checkbox-inline m-r-20">'+
								'<input type="checkbox" value="option1">'+
								'<i class="input-helper"></i>'+
								  item.nombreReceta +
							'</label>'+
						'</div>'+
						'<div class="col-sm-4">'	+
							'<div class="fg-line ">'+
								'<input type="number" name="" class="form-control " placeholder="Cant" style="margin-top: -8px;">'+
							'</div>'+
						'</div>'+
					'</div>'
				)
			})

		}
	})
}
listarComboSubReceta();

$('[name="inlineRadioOptions"]').change(function (event) {
	if($("#Si").is(':checked')){
        $("#ContenedorSubReceta").removeClass("hidden");
    } else{
        $("#ContenedorSubReceta").addClass("hidden");
    }
});


/* función para pintar formularios para Añadir Ingredientes*/
num = '0';
var cont = parseInt(num)
function AnadirIngredientes(){
    cont++;
    $("#contenedorIngredientes").append(
        '<div class="row m-t-5 fila" id="fila'+cont+'">' +
            '<div class="col-sm-3">' +
                '<div class="input-group">' +
                    '<div class="m-b-25">' +
                        '<select class="selectpicker" data-live-search="true" id="cbxProducto'+cont+'" name="cbxProducto" onchange="costoUD(\'cbxProducto' + cont + '\', \'' + cont + '\')">' +
                            '<option value="0">Seleccione el producto...</option>' +
                        '</select>' +
                    '</div>' +
                '</div>' +
            '</div>' +
            '<div class="col-sm-2">' +
                '<div class="input-group">' +
                    '<span class="input-group-addon"><i class="zmdi zmdi-account"></i></span>' +
                    '<div class="fg-line">' +
                        '<input type="number" min="0" name="cantidad" id="cantidad'+cont+'" class="form-control cobligatorio" placeholder="Cantidad" onkeyup="calcularCostoDinam(\'' + cont + '\')">' +
                    '</div>' +
                '</div>' +
			'</div>' +
			'<div class="col-sm-1">' +
                '<div class="input-group">' +
                    '<div class="fg-line">' +
                        '<input type="text" name="Und" id="Und'+cont+'" class="form-control" disabled placeholder="UND" >' +
                    '</div>' +
                '</div>' +
            '</div>' +
            '<div class="col-sm-2">' +
                '<div class="input-group">' +
                    '<span class="input-group-addon"><i class="zmdi zmdi-account"></i></span>' +
                    '<div class="fg-line">' +
                        '<input type="text" name="costoPorcion" id="costoPorcion'+cont+'" class="form-control" disabled placeholder="Costo unitario por porcion" >' +
                    '</div>' +
                '</div>' +
            '</div>' +
            '<div class="col-sm-3">' +
                '<div class="input-group">' +
                    '<span class="input-group-addon"><i class="zmdi zmdi-account"></i></span>' +
                    '<div class="fg-line">' +
                        '<input type="text" name="costoPreparacion" id="costoPreparacion'+cont+'" class="form-control sumcostototal" disabled placeholder="Costo total por porcion" >' +
                    '</div>' +
                '</div>' +
            '</div>' +
            '<div class="btn-colors">' +
                '<button type="button" id="eliminafila'+cont+'" onclick="EliminarFila(\'' + cont + '\', \'fila\')" class="btn btn-danger btn-icon waves-effect waves-circle waves-float"><i class="zmdi zmdi-delete mdc-text-red"></i></button>' +
            '</div>' +
        '</div>'
    );
    listarComboProducto2(cont, 'default');
}

function EliminarFila(id, fila){
	var check = $("#"+fila+id)
	var acum = 0
	var valor = $("#costoPreparacion"+id+"")
	var valorresultado = valor.val()
	var resta = parseInt($("#vlrTotal").val()) - valorresultado
	var filaValor = check.val()
	check.remove()

	$(".sumcostototal").each(function (indice, input) {
		acum = parseInt($(input).val()) + parseInt(acum)
	})

	if (acum === ''){
		$("#vlrTotal").val(0)
	}else{
		$("#vlrTotal").css('color', 'red')
		$("#vlrTotal").val(acum)
	}
	
	
	

	// $("#vlrTotal").val()
}

function cancelar(){
    $("#guardarReceta").attr('onclick', 'guardar()')
    $("#RecetaId").val('');
    $("#IngredienteId").val('');    
	$("#nombre").val('');
    $("#descripcion").val('');
    $("#tiporeceta").val('default').selectpicker("refresh");
    $("#cbxProducto").val('default').selectpicker("refresh");  
    $("#Subreceta").val('default').selectpicker("refresh");
    $("#cantidad").val('');
    $("#Und").val('');
    $("#costoPorcion").val('');
    $("#costoPreparacion").val('');
    $("#Si").prop('checked', false);
    $("#No").prop('checked', true);
    $('[name="inlineRadioOptions"]').change();
    limpiar('fila');
    $("#vlrTotal").val('');
    $(".cobligatorio").each(function (indice, input) {
		if ($(input).val() == "") {
			$(input).css('border-bottom', '1px solid #e0e0e0')
        }
    })

    /*$("#contenedorIngredientes").html(
        '<div class="row">' +
            '<div class="col-sm-3">' +
                '<div class="input-group">' +
                    '<span class="input-group-addon col-sm-1"><i class="zmdi zmdi-key zmdi-hc-fw"></i></span>' +
                    '<div class="col-sm-3 m-b-25">' +
                        '<select class="selectpicker" data-live-search="true" id="cbxProducto" name="cbxProducto">' +
                            '<option value="0">Seleccione el producto...</option>' +
                        '</select>' +
                    '</div>' +
                '</div>' +
            '</div>' +
            '<div class="col-sm-2">' +
                '<div class="input-group">' +
                    '<span class="input-group-addon"><i class="zmdi zmdi-account"></i></span>' +
                    '<div class="fg-line">' +
                        '<input type="number" min="0" name="cantidad" id="cantidad" class="form-control cobligatorio" placeholder="Cantidad" onkeyup="calcularCosto()">' +
                    '</div>' +
                '</div>' +
            '</div>' +
            '<div class="col-sm-3">' +
                '<div class="input-group">' +
                    '<span class="input-group-addon"><i class="zmdi zmdi-account"></i></span>' +
                    '<div class="fg-line">' +
                        '<input type="text" name="costoPorcion" id="costoPorcion" class="form-control" disabled placeholder="Costo unitario por porcion" >' +
                    '</div>' +
                '</div>' +
            '</div>' +
            '<div class="col-sm-3">' +
                '<div class="input-group">' +
                    '<span class="input-group-addon"><i class="zmdi zmdi-account"></i></span>' +
                    '<div class="fg-line">' +
                        '<input type="text" name="costoPreparacion" id="costoPreparacion" class="form-control" disabled placeholder="Costo total por porcion" >' +
                    '</div>' +
                '</div>' +
            '</div>' +
        '</div>'
    ); listarComboProducto()*/
}

function listarComboProducto(){
	$.ajax({
		url: rutaUniversal + 'Receta_controllers/listarComboProducto',
		type:'POST',
		cache:false,
		success:function(data){
			
			var datos = JSON.parse(data)
			$.each(datos, function(i, item){
				$("#cbxProducto").append(
					'<option costouni="'+ item.CostoUnitario +'" und="'+ item.Sigla +'" value="' + item.ProductoId + '">' + item.nombreProducto +'</option>'
				)
			})
			$("#cbxProducto").selectpicker()
		}
	})
}
listarComboProducto()

function listarComboProducto2(chxid, defau){
	$.ajax({
		url: rutaUniversal + 'Receta_controllers/listarComboProducto',
		type:'POST',
		cache:false,
		success:function(data){
			
			var datos = JSON.parse(data)
			$.each(datos, function(i, item){
				$("#cbxProducto"+chxid).append(
					'<option costouni="'+ item.CostoUnitario +'" und="'+ item.Sigla +'" value="' + item.ProductoId + '">' + item.nombreProducto +'</option>'
				)
			})
			$("#cbxProducto" + chxid).val(defau).selectpicker('refresh');
		}
	})
}

function listarComboProductoEdit(chxid, producto) {
	$.ajax({
		url: rutaUniversal + 'Receta_controllers/listarComboProducto',
		type: 'POST',
		cache: false,
		success: function (data) {

			var datos = JSON.parse(data)
			$.each(datos, function (i, item) {
				$("#cbxProductoEdit" + chxid).append(
					'<option costouniEdit' + chxid+'="'+ item.CostoUnitario + '" undEdit' + chxid+'="'+ item.Sigla +'" value="' + item.ProductoId + '">' + item.nombreProducto + '</option>'
				)
			})
			$("#cbxProductoEdit" + chxid).val(producto).selectpicker('refresh');
		}
	})
}

//cbxProductoEdit

function limpiar(fila) {
    $("."+fila).remove();
}

function guardar() {
    var nombreReceta = $("#nombre").val();
    var descripcion = $("#descripcion").val();
    var tiporeceta = $("#tiporeceta").val();
    var costoReceta = $("#vlrTotal").val();
	var arraysub = $("#Subreceta").val()
	var arraycotoSub = []
	$("#Subreceta option:selected").each(function(){
		arraycotoSub.push($(this).attr("costouni"))
	})

    var arrayproducto = []
	$("#contenedorIngredientes select[name=cbxProducto]").each(function(){
		arrayproducto.push($(this).val())
	})
    
    var arraycantidadPorcion = []
	$("#contenedorIngredientes input[name=cantidad]").each(function(){
		arraycantidadPorcion.push($(this).val())
	})
	
	var arrayundmedida = []
	$("#contenedorIngredientes input[name=Und]").each(function(){
		arrayundmedida.push($(this).val())
    })
    
    var arraycosto = []
	$("#contenedorIngredientes input[name=costoPorcion]").each(function(){
		arraycosto.push($(this).val())
    })
    
    var arraycostoPreparacion = []
	$("#contenedorIngredientes input[name=costoPreparacion]").each(function(){
		arraycostoPreparacion.push($(this).val())
	})

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
	} else{
        $.ajax({
            url: rutaUniversal + 'Receta_controllers/guardar',
            type: 'POST',
            data: {
                'nombre':nombreReceta, 'descripcion':descripcion, 'tiporeceta':tiporeceta, 
                'cbxProducto':arrayproducto, 'cantidad':arraycantidadPorcion, 'arrayundmedida':arrayundmedida, 'costoPorcion':arraycosto, 
                'costoPreparacion':arraycostoPreparacion, 'costoReceta':costoReceta, 'arraysub':arraysub, 'arraycotoSub':arraycotoSub
            },
            success: function (data) {
                if (data) {
                    $.growl.notice({
                        title: "Éxito!",
                        message: "Se registro la información satisfactoriamente"
                    });
                      $("#tbodyReceta").html('')
                      $("#nombre").val('');
                      $("#descripcion").val('');
                      $("#tiporeceta").val('default').selectpicker("refresh");
                      $("#cbxProducto").val('default').selectpicker("refresh");
                      $("#cantidad").val('');
                      $("#Und").val('');
                      $("#costoPorcion").val('');
                      $("#costoPreparacion").val('');
                      $("#vlrTotal").val('');
                      //limpiar('fila');
					  $("#contenedorIngredientes").remove();
                } else {
                    $.growl.error({
						title: "Opps!",
						message: "ocurrio un problema al ingresar los datos, intenta nuevamente, o consulta a soporte"
					});
                }
            },complete:function(){
				ListarReceta()
			}
        })
    }
}

function ListarReceta(){
	var cont = 0
	var estadoReceta
    var classBtn
    // var precio = 0
	$.ajax({
		url: rutaUniversal + 'Receta_controllers/ListarReceta',
		type:'POST',
		cache:false,
		success:function(data){
			var tabla = JSON.parse(data);
			$.each(tabla, function(i, item){
				// Validar estado del Receta
				if (item.estado == 0){
					estadoReceta = 'Deshabilitar(\'' + item.RecetaId + '\')'
					classBtn = ' palette-Green'
				}else{
					if (item.estado == 1) {
						estadoReceta = 'Habilitar(\'' + item.RecetaId + '\')'
						classBtn = ' palette-Orange'
					}
				}
                cont++
                //precio = item.costoUD
				$("#tbodyReceta").append(
					'<tr>'+
					'<td>' + cont + '</td>' +
					'<td>' + item.nombreReceta +'</td>'+
					'<td>' + item.Descripcion +'</td>' +
                    '<td>' + item.TipoReceta +'</td>' +
                    '<td> $ '+ item.CostoTotal +'</td>' +
					'<td>'+
					'<button type="button" class="btn palette-Light-Blue bg" onclick="PasarParamVen(\'' + item.RecetaId + '\', \'' + item.nombreReceta + '\', \'' + item.Descripcion + '\', \'' + item.TipoRecetaId + '\')"><i class="zmdi zmdi-account"></i></button>'+
					'<button type="button" class="btn ' + classBtn +' bg" onclick="' + estadoReceta +'"><i class="zmdi zmdi-account"></i></button>' +
					'</td>' +
					'</tr>'
				)
			})
		}
	})
}
ListarReceta()

function Deshabilitar(RecetaId){
	
	if (RecetaId === ''){
		$.growl.warning({
			title: "Opps!",
			message: "Esta receta no se puede deshabilitar, Consulte a soporte"
		});
	}else{
		$.ajax({
			url: rutaUniversal + 'Receta_controllers/Deshabilitar',
			type:'POST',
			data:{
				'RecetaId': RecetaId
			},
			cache:false,
			success:function(data){
				if(data == 2){
						$.growl.error({
							title: "Opps!",
							message: "ocurrio un problema al deshabiltar la receta seleccionada, intenta nuevamente, o consulta a soporte"
						});
				}else{
					if(data == 1){
						$.growl.notice({
							title: "Éxito!",
							message: "La receta seleccionada fue deshabilitado satisfactoriamente"
						});
						$("#tbodyReceta").html('')
					}
				}
			},complete:function(){
				ListarReceta()
			}
		})
	}
}

function Habilitar(RecetaId) {

	if (RecetaId === '') {
		$.growl.error({
			title: "Opps!",
			message: "Esta receta no se puede deshabilitar, Consulte a soporte"
		});
	} else {
		$.ajax({
			url: rutaUniversal + 'Receta_controllers/Habilitar',
			type: 'POST',
			data: {
				'RecetaId': RecetaId
			},
			cache: false,
			success: function (data) {
				if(data == 2){
					$.growl.error({
						title: "Opps!",
						message: "ocurrio un problema al habiltar la receta seleccionada, intenta nuevamente, o consulta a soporte"
					});
				}else{
					if(data == 1){
						$.growl.notice({
							title: "Éxito!",
							message: "La receta seleccionada fue habilitado satisfactoriamente"
						});
						$("#tbodyReceta").html('')
					}
				}
			}, complete:function(){
				ListarReceta()
			}
		})
	}
}

var acum = 0
function PasarParamVen(RecetaId, nombreReceta, Descripcion, TipoRecetaId){ //, ProductoId, Cantidad, CostoPorcion, CostoPreparacion){
    //$("#IngredienteId").val(IngredienteId);
    $("#RecetaId").val(RecetaId);
    $("#nombre").val(nombreReceta);
    $("#descripcion").val(Descripcion);
    $("#tiporeceta").val(TipoRecetaId).selectpicker("refresh");
    //$("#cbxProducto").val(ProductoId).selectpicker("refresh");
    // $("#cantidad").val(Cantidad);
    // $("#costoPorcion").val(CostoPorcion);
    // $("#costoPreparacion").val(CostoPreparacion);
	$("#guardarReceta").attr('onclick','EditarReceta()')
    $("#nombre").focus()
    ListarIngredientes(RecetaId)
    
    $(".cobligatorio").each(function (indice, input) {
		$(input).css('border-bottom', '1px solid #e0e0e0')
	})			
}

function ListarIngredientes(RecetaId){
	var cont = 0
	var acum = 0
	var resul = 0
	$.ajax({
		url: rutaUniversal + 'Receta_controllers/ListarIngredientesReceta/'+ RecetaId,
		type:'POST',
		cache:false,
		success:function(data){
            var tabla = JSON.parse(data);
            $("#contenedorIngredientes").html("");
			$.each(tabla, function(i, item){
				cont++
				resu = 0
                $("#contenedorIngredientes").append(
                    '<div class="row m-t-5 fila" id="filaEdit'+cont+'">' +
                    	'<input type="hidden" value="'+ item.IngredienteId +'" name="IngredienteId" >' +
                        '<div class="col-sm-3">' +
                            '<div class="input-group">' +
                                '<div class="col-sm-3 m-b-25">' +
                                    '<select class="selectpicker" data-live-search="true" id="cbxProductoEdit'+cont+'" name="cbxProducto" onchange="costoUDEdit(\'cbxProductoEdit' + cont + '\', \'' + cont + '\')">' +
                                        '<option value="0">Seleccione el producto...</option>' +
                                    '</select>' +
                                '</div>' +
                            '</div>' +
                        '</div>' +
                        '<div class="col-sm-2">' +
                            '<div class="input-group">' +
                                '<span class="input-group-addon"><i class="zmdi zmdi-account"></i></span>' +
                                '<div class="fg-line">' +
									'<input value="' + item.Cantidad +'" type="number" min="0" name="cantidad" id="cantidadEdit'+cont+'" class="form-control cobligatorio" placeholder="Cantidad" onkeyup="calcularCostoDinamEdit(\'' + cont + '\')">' +
                                '</div>' +
                            '</div>' +
						'</div>' +
						'<div class="col-sm-1">' +
                            '<div class="input-group">' +
                                '<div class="fg-line">' +
                                    '<input type="text" value="'+ item.Undmedida +'" name="Und" id="UndEdit'+cont+'" class="form-control" disabled placeholder="UND" >' +
                                '</div>' +
							'</div>' +
						'</div>' +
                        '<div class="col-sm-2">' +
                            '<div class="input-group">' +
                                '<span class="input-group-addon"><i class="zmdi zmdi-account"></i></span>' +
                                '<div class="fg-line">' +
                                    '<input type="text" value="'+ item.Costounidad +'" name="costoPorcion" id="costoPorcionEdit'+cont+'" class="form-control" disabled placeholder="Costo unitario por porcion" >' +
                                '</div>' +
                            '</div>' +
                        '</div>' +
                        '<div class="col-sm-3">' +
                            '<div class="input-group">' +
                                '<span class="input-group-addon"><i class="zmdi zmdi-account"></i></span>' +
                                '<div class="fg-line">' +
                                    '<input type="text" value="'+ item.CostoTotalI +'"  name="costoPreparacion" id="costoPreparacionEdit'+cont+'" class="form-control sumcostototal" disabled placeholder="Costo total por porcion" >' +
                                '</div>' +
                            '</div>' +
                        '</div>' +
                        '<div class="btn-colors col-sm-1">' +
							'<button type="button" id="eliminafila' + cont + '" onclick="EliminarFilaEdit(\'' + cont + '\', \'filaEdit\')" class="btn btn-danger btn-icon waves-effect waves-circle waves-float"><i class="zmdi zmdi-delete mdc-text-red"></i></button>' +
                        '</div>' +
                    '</div>'
                );
				listarComboProductoEdit(cont, item.ProductoId);

				resu = item.CostoTotalI
				acum = parseInt(acum) + parseInt(resu)
				
			})
			$("#vlrTotal").val(acum)
		}
	})
}

function EliminarFilaEdit(id, fila){
	var check = $("#" + fila + id)
	var acum = 0
	var valor = $("#costoPreparacionEdit" + id + "")
	var valorresultado = valor.val()
	var resta = parseInt($("#vlrTotal").val()) - valorresultado
	var filaValor = check.val()
	check.remove()


	$(".sumcostototal").each(function (indice, input) {
		acum = parseInt($(input).val()) + parseInt(acum)
	})
	$("#vlrTotal").css('color', 'red')
	$("#vlrTotal").val(acum)
}

function costoUDEdit(tipo, cont){
	
	costoUEdit = $("#cbxProductoEdit" + cont + " option:selected").attr("costouniEdit"+cont+"")
	$("#costoPorcionEdit"+cont+"").val(costoUEdit);

	UndEdit = $("#cbxProductoEdit" + cont + " option:selected").attr("undEdit"+cont+"")
	$("#UndEdit"+cont+"").val(UndEdit);

	calcularCostoEdit(cont)
}

//calcularCostoDinamEdit

function EditarReceta(){
    var RecetaId = $("#RecetaId").val();
    var nombreReceta = $("#nombre").val();
    var descripcion = $("#descripcion").val();
    var tiporeceta = $("#tiporeceta").val();
    var costoReceta = $("#vlrTotal").val();

    var arrayIngredienteId = []
	$("#contenedorIngredientes input[name=IngredienteId]").each(function(){
		arrayIngredienteId.push($(this).val())
    })

    var arrayproducto = []
	$("#contenedorIngredientes select[name=cbxProducto]").each(function(){
		arrayproducto.push($(this).val())
    })
    
    var arraycantidadPorcion = []
	$("#contenedorIngredientes input[name=cantidad]").each(function(){
		arraycantidadPorcion.push($(this).val())
	})
	
	var arrayundmedida = []
	$("#contenedorIngredientes input[name=Und]").each(function(){
		arrayundmedida.push($(this).val())
    })
    
    var arraycosto = []
	$("#contenedorIngredientes input[name=costoPorcion]").each(function(){
		arraycosto.push($(this).val())
    })
    
    var arraycostoPreparacion = []
	$("#contenedorIngredientes input[name=costoPreparacion]").each(function(){
		arraycostoPreparacion.push($(this).val())
	})

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
	}
    else{
        $.ajax({
            url: rutaUniversal + 'Receta_controllers/EditarReceta',
            type: 'POST',
            data: {
                'RecetaId':RecetaId, 'nombre':nombreReceta, 'descripcion':descripcion, 'tiporeceta':tiporeceta, 
                'cbxProducto':arrayproducto, 'cantidad':arraycantidadPorcion, 'arrayundmedida':arrayundmedida, 'costoPorcion':arraycosto, 
                'costoPreparacion':arraycostoPreparacion, 'costoReceta':costoReceta, 'arrayIngredienteId':arrayIngredienteId
            },
            success: function (data) {
                if (data) {
                    $.growl.notice({
                        title: "Exito!",
                        message: "Receta Actualizada con Exito"
                    });
                    $("#tbodyReceta").html('')
                    $("#nombre").val('');
                    $("#descripcion").val('');
                    $("#tiporeceta").val('default').selectpicker("refresh");
                    $("#cbxProducto").val('default').selectpicker("refresh");
                    $("#cantidad").val('');
                    $("#Und").val('');
                    $("#costoPorcion").val('');
                    $("#costoPreparacion").val('');
					$("#guardarReceta").attr('onclick','guardar()')
					limpiar('fila');
    
                } else {
                    $.growl.error({
						title: "Opps!",
						message: "ocurrio un problema al editar los datos, intenta nuevamente, o consulta a soporte"
					});
                }
            },complete:function(){
				ListarReceta()
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

var acumula = 0;
var costoU = 0;
var Und = 0

$("#cbxProducto").change(function(){
    costoU = $("#cbxProducto option:selected").attr("costouni")
	$("#costoPorcion").val(costoU);
	
	Und = $("#cbxProducto option:selected").attr("und")
    $("#Und").val(Und);
    //acumula = parseInt(acumula) + parseInt(costoU)
    calcularCosto()
   
});


function calcularCostoDinamEdit(cont) {
	
	acumula = 0
	var acum = 0
	var costoU = $("#costoPorcionEdit"+cont+"").val()
	var cantidad = $("#cantidadEdit"+cont+"").val();
	alert(cantidad)
	var vlrTotal = costoU * cantidad;
	acumula = acumula + vlrTotal
	$("#costoPreparacionEdit"+cont+"").val(vlrTotal)
	$("#vlrTotal").val(acumula);

	$(".sumcostototal").each(function (indice, input) {
		acum = parseInt($(input).val()) + parseInt(acum)
	})
	$("#vlrTotal").css('color', 'red')
	$("#vlrTotal").val(acum);

}


//Funcion para calcular el costo total(costo * unidad)
function calcularCosto() {
	acumula = 0
	var acum = 0
    var costoU = $("#costoPorcion").val()
    var cantidad = $("#cantidad").val();
    var vlrTotal = costoU * cantidad;
    acumula = acumula + vlrTotal
    $("#costoPreparacion").val(vlrTotal)
	$("#vlrTotal").val(acumula);
}

//funcion que se invoca cafa vez que se cambia un select dinamico
function costoUD(idCampo, cont) {
    var costoU = $("#"+idCampo+" option:selected").attr("costouni")
	$("#costoPorcion"+cont).val(costoU);
	
	var Und = $("#"+idCampo+" option:selected").attr("und")
    $("#Und"+cont).val(Und);

    calcularCostoDinam(cont)
}
//Funcion para calcular el costo total(costo * unidad) de los inputs dinamicos
function calcularCostoDinam(num) {
	acum = 0
    var costoU = $("#costoPorcion"+num).val()
    var cantidad = $("#cantidad"+num).val();
    var vlrTotal = costoU * cantidad;
	$("#costoPreparacion"+num).val(vlrTotal)
	
		 $(".sumcostototal").each(function (indice, input) {
			acum = parseInt($(input).val()) + parseInt(acum)
		})
		$("#vlrTotal").css('color','red')
		$("#vlrTotal").val(acum);
}

function calcularCostoEdit(cont){
	acumula = 0
	var acum = 0
	var costoU = $("#costoPorcionEdit"+cont+"").val()
	var cantidad = $("#cantidadEdit"+cont+"").val();
	var vlrTotal = costoU * cantidad;
	acumula = acumula + vlrTotal
	$("#costoPreparacionEdit"+cont+"").val(vlrTotal)
	$(".sumcostototal").each(function (indice, input) {
		acum = parseInt($(input).val()) + parseInt(acum)
	})
	$("#vlrTotal").css('color', 'red')
	$("#vlrTotal").val(acum);
}



