var rutaUniversal = baseurl;

function ListarMenu(){
	var menu = '';
    $.ajax({
        // url:'http://localhost/SaboresSorpresa/menu_controllers/ListarMenus',
        url: rutaUniversal + 'menu_controllers/ListarMenus',
        type:'POST',
        cache:false,
        success:function(data){
            var items = JSON.parse(data)
			$.each(items.arrayMenus, function(i, item){

					menu += '<li class="sub-menu">';
					menu += '<a  style="cursor:pointer;" data-ma-action="submenu-toggle"><i class="zmdi zmdi-' + item.icono + '"></i> ' + item.Nombre + '</a>';
					var submenusH2 = $.grep(items.arrayMenusH2, function (e) { return e.MenuIdPadre == item.MenuId; });
					console.log(submenusH2)
				menu += '<ul>';
				$.each(submenusH2, function(i, item2){
					
					menu += '<li><a  onclick="cargarPagina(\'' + item2.carpeta + '\',\'' + item2.ruta + '\')" data-ma-action="submenu-toggle" style="cursor:pointer;"><i class="zmdi zmdi-'+item2.icono+'"></i> ' + item2.Nombre + '</a></li>';
					
				})
				menu += '</ul>';

				menu += '</li>';
				// var listaTitulos = $.grep(datas.arrayPregunta, function (e) { return e.idCategoria == item.idCategoria; });
			})
			
			$("#menu").append(menu)
        }
    });

}
ListarMenu();

function cargarPagina(carpeta, ruta) {
    $.ajax({
		url: rutaUniversal + 'Principal/CargarPagina/' + carpeta + '/' + ruta,
		type: 'POST',
		success: function(data) {
			//$("#dialog").remove();
            //$("#img-cargando").css('display', 'none')
			$("#contenido").html(data)
			
		}
	})
}

/*<ul>
                            <li><a href="alternative-header.html">Altenative</a></li>
                            <li><a href="colored-header.html">Colored</a></li>
						</ul>*/
						
/*$("#menu").append(
	'<li class="sub-menu">' +
	'<a onclick="cargarPagina(\'' + item.carpeta + '\',\'' + item.ruta + '\')" style="cursor:pointer;"><i class="zmdi zmdi-' + item.icono + '"></i> ' + item.Nombre + '</a>' +
	'</li>'
)*/
