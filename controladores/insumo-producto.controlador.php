<?php
class ControladorInsumoProducto{

	/*==================================
	Mostrar InsumoProducto
	================================*/

static public function ctrMostrarInsumoProducto($item, $valor){

	$tabla ="insumo_producto";

	$respuesta =ModeloInsumoProducto::mdlMostrarInsumoProducto($tabla,$item,$valor);

	return $respuesta;
}


	/*==================================
	Mostrar Mediciones
	================================*/

static public function ctrMostrarMediciones($item, $valor){

	$tabla ="medicion";
	$respuesta =ModeloInsumoProducto::mdlMostrarMediciones($tabla,$item,$valor);
	return $respuesta;
}


/*=============================================
	CREAR InsumoProducto
	=============================================*/

	
	static public function ctrCrearInsumoProducto()
	{
		if (isset($_POST["nuevoInsumo"])) {

			$tabla = "producto_insumo";
			$datos = array(				
				"id_insumo" => $_POST["nuevoInsumo"],
				"id_producto" => $_POST["nuevoProducto"],
				"insumo_minimo" =>(float) $_POST["nuevaCantidad"]
			);

			var_dump($datos);	
			

			$respuesta = ModeloInsumoProducto::mdlIngresarInsumoProducto($tabla, $datos);

			if ($respuesta == "ok") {

				echo '<script>

						swal({
							  type: "success",
							  title: "El insumo ha sido guardado correctamente",
							  showConfirmButton: true,
							  confirmButtonText: "Cerrar"
							  }).then(function(result){
										if (result.value) {

										window.location = "insumo-producto";

										}
									})

						</script>';
			}
			else{
				echo'<script>	
					swal({
						  type: "error",
						  title: "¡El producto no puede ir vacía o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {
							// window.location = "insumo-producto";
							}
						})
			  	</script>';
			}
		}
	}

/*=============================================
	EDITAR INSUMO
	=============================================*/


	static public function ctrEditarInsumoProducto()
	{

		if (isset($_POST["editarInsumo"])) {
			
		
		
			$tabla = "insumo";
			$datos = array(				
				"id_insumo" => $_POST["editarInsumo"],
				"nombre_insumo" => $_POST["editarNombre"],
				"cantidad" => (float)$_POST["editarCantidad"],
				"id_medicion" => $_POST["editarMedicion"],
				"insumo_minimo" =>(float) $_POST["editarMinimo"]
			);
			//var_dump($_POST["idInsumo"]);

			//echo var_dump($datos);
			
			//echo("<script>console.log('PHP Controlador: " . $datos["editarInsumo"] . "');</script>");

		    $respuesta = ModeloInsumoProducto::mdlEditarInsumoProducto($tabla, $datos);
			
			

			if ($respuesta == "ok") {

				

				echo '<script>
						
						
						swal({
							  type: "success",
							  title: "El insumo ha sido editado correctamente",
							  showConfirmButton: true,
							  confirmButtonText: "Cerrar"
							  }).then(function(result){
										if (result.value) {

										window.location = "insumo-producto";

										}
									})
						
					</script>';
			}
			else{
				echo'<script>
					swal({
						  type: "error",
						  title: "¡El insumo no puede ir vacía o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {
							// window.location = "insumo-producto";
							}
						})
			  	</script>';
			}
		}	
	}





	/*=============================================
	BORRAR INSUMO
	=============================================*/

	static public function ctrBorrarInsumoProducto()
	{

		if (isset($_GET["idInsumo"])) {

			$tabla = "insumo";
			$datos = array(				
				"id_insumo" => $_GET["idInsumo"],
				"id_Producto" => $_GET["idProducto"],
			);						

			$respuestaEliminar = ModeloInsumoProducto::mdlEliminarInsumoProducto($tabla, $datos);

			echo "Eliminar tabla: $tabla";
			echo "Eliminar insumo: $datos";
			if ($respuestaEliminar == "ok") {

				echo '<script>

				swal({
					  type: "success",
					  title: "El producto ha sido borrado correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar"
					  }).then(function(result){
								if (result.value) {

								window.location = "insumo-producto";

								}
							})

				</script>';

			}else{
				echo "No se elimino";
			}
		}
	}
}

	
