<?php

require_once "../controladores/insumo-producto.controlador.php";
require_once "../modelos/insumo-producto.modelo.php";

class AjaxInsumos{

	/*=============================================
	EDITAR CATEGORÍA
	=============================================*/	

	public $idInsumo;
	public $idProducto;

	public function ajaxEditarInsumo(){

		$item = "id_insumo";
		$valor = $this->idInsumo;

		var datos = new FormData();
		datos.append("idInsumo", idInsumo);
		datos.append("idProducto", idProducto);

		$respuesta = ControladorInsumos::ctrMostrarInsumos($item, $valor);

		echo json_encode($respuesta);

	}
}

/*=============================================
EDITAR CATEGORÍA
=============================================*/	
if(isset($_POST["idProducto"]&&$_POST["idInsumo"])){
	
	$insumo = new AjaxInsumos();
	$insumo -> idInsumo = $_POST["idInsumo"];
	$insumo -> idProducto = $_POST["Producto"];
	$insumo -> ajaxEditarInsumo();
}
