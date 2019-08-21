<?php

class ControladorClientes{

	/*=============================================
	CREAR CLIENTES
	=============================================*/

	static public function ctrCrearCliente(){

		if(isset($_POST["nuevoCliente"])){
			
			   	$tabla = "clientes";

			   	$datos = array("numero"=>$_POST["nuevoCliente"],					           
					           "id_mesero"=>$_POST["nuevoMesero"]);

			   	$respuesta = ModeloClientes::mdlIngresarCliente($tabla, $datos);

			   	if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "El cliente ha sido guardado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "clientes";

									}
								})

					</script>';

				}else{
					echo'<script>
						swal({
							  type: "error",
							  title: "¡El cliente no puede ir vacía o llevar caracteres especiales!",
							  showConfirmButton: true,
							  confirmButtonText: "Cerrar"
							  }).then(function(result){
								if (result.value) {
								// window.location = "clientes";
								}
							})
					  </script>';
				}

		

		}

	}

	/*=============================================
	MOSTRAR CLIENTES
	=============================================*/

	static public function ctrMostrarClientes($item, $valor){

		$tabla = "clientes_usuarios";

		$respuesta = ModeloClientes::mdlMostrarClientes($tabla, $item, $valor);

		return $respuesta;

	}

	/*=============================================
	MOSTRAR MESEROS
	=============================================*/

	static public function ctrMostrarMeseros($item, $valor){

		$tabla = "meseros";

		$respuesta = ModeloClientes::mdlMostrarClientes($tabla, $item, $valor);

		return $respuesta;

	}


	/*=============================================
	MOSTRAR NUMERO DE MESAS
	=============================================*/

	static public function ctrMostrarNumeroMesas($item, $valor){

		$tabla = "numero_mesas";

		$respuesta = ModeloClientes::mdlMostrarClientes($tabla, $item, $valor);

		return $respuesta;

	}


	/*=============================================
	EDITAR CLIENTE
	=============================================*/

	static public function ctrEditarCliente(){

		if(isset($_POST["editarCliente"])){

			

			   	$tabla = "clientes";

				   $datos = array("id"=>$_POST["editarCliente"],	
				   				  			   
							      "id_mesero"=>$_POST["editarMesero"]);			

//				echo("<script>console.log('id: " . $_POST["editarCliente"] . "');</script>");
//			    echo("<script>console.log('id_mesero: " . $_POST["editarMesero"] . "');</script>");				

//				echo("<script>console.log('id: " . $datos["id"] . "');</script>");
//				echo("<script>console.log('id_mesero: " . $datos["id_mesero"] . "');</script>");

			   	$respuesta = ModeloClientes::mdlEditarCliente($tabla, $datos);

			   	if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "El cliente ha sido cambiado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "clientes";

									}
								})

					</script>';

				}else{
					echo'<script>
						swal({
							  type: "error",
							  title: "¡El cliente no puede ir vacía o llevar caracteres especiales!",
							  showConfirmButton: true,
							  confirmButtonText: "Cerrar"
							  }).then(function(result){
								if (result.value) {
								// window.location = "clientes";
								}
							})
					  </script>';
				}

			

		}

	}

	/*=============================================
	ELIMINAR CLIENTE
	=============================================*/

	static public function ctrEliminarCliente(){

		if(isset($_GET["idCliente"])){

			$tabla ="clientes";
			$datos = $_GET["idCliente"];

			$respuesta = ModeloClientes::mdlEliminarCliente($tabla, $datos);

			if($respuesta == "ok"){

				echo'<script>

				swal({
					  type: "success",
					  title: "El cliente ha sido borrado correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar",
					  closeOnConfirm: false
					  }).then(function(result){
								if (result.value) {

								window.location = "clientes";

								}
							})

				</script>';

			}else{
				echo'<script>
					swal({
						  type: "error",
						  title: "¡El cliente no puede ir vacía o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {
							// window.location = "clientes";
							}
						})
			  	</script>';
			}		

		}

	}

}

