/*=============================================
EDITAR INSUMOS
=============================================*/
$(".tablas").on("click", "button.btnEditarInsumo", function () {

	var idInsumo = $(this).attr("idInsumo");
	var idProducto = $(this).attr("idProducto");

	var datos = new FormData();
	datos.append("idInsumo", idInsumo);
	datos.append("idProducto", idProducto);

	console.log(datos.get("idInsumo"));
		
      
	$.ajax({
		url: "ajax/insumo-producto.ajax.php",
		method: "POST",
      	data: datos,
      	cache: false,
     	contentType: false,
     	processData: false,
     	dataType:"json",
     	success: function(respuesta){

			sconsole.log("respuesta: ",respuesta);
			//console.log("Aqui entra");

			$("#editarInsumo").val(respuesta["id_insumo"]);
			$("#editarInsumo").html(respuesta["nombre_insumo"]);
			$("#editarProducto").val(respuesta["id_producto"]);
			$("#editarProducto").html(respuesta["descripcion"]);
			$("#editarCantidad").html(respuesta["gasto_de_insumo"]);
			


		}
	})
})








/*=============================================
ELIMINAR INSUMO
=============================================*/
$(".tablas").on("click", "button.btnEliminarInsumo", function () {

	var idInsumo = $(this).attr("idInsumo");
	var idProducto = $(this).attr("idProducto");

	var datos = new FormData();
	datos.append("idInsumo", idInsumo);
	datos.append("idProducto", idProducto);


	console.log("eliminar", datos);
	swal({

		title: '¿Está seguro de borrar el insumo?',
		text: "¡Si no lo está puede cancelar la accíón!",
		type: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		cancelButtonText: 'Cancelar',
		confirmButtonText: 'Si, borrar Relacion'
	}).then(function (result) {
		if (result.value) {
			//console.log("eliminar", idInsumo);
			window.location = "index.php?ruta=insumos&idInsumo=" + datos;
			

		}


	})

})