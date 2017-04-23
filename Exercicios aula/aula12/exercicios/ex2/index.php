<?php

// Toda interação acontece no index e é enviada
// diretamente ao controlador

include_once("controller/Controller.php");
$controller = new Controller();
if ($_SERVER['REQUEST_METHOD']  == 'POST'){
	if (isset($_POST['titulo1'])) {
		$controller->consultar();
	}
	if (isset($_POST['rcodigo']) and isset($_POST['rtitulo']) and isset($_POST['rautor']) and isset($_POST['rdescricao'])){
		$controller->registrar();
	}
	if (isset($_POST['dcodigo'])) {
		$controller->deletar();
	}
	if (isset($_POST['titulo']) and isset($_POST['autor']) and isset($_POST['descricao'])) {
		$controller->atualizar();
	}
}
else{
	if (isset($_GET["acodigo"])) {
		$controller->atualizar();
	}
	if(!isset($_GET["op"])) {
		$controller->invoke();
	}else {
		if ($_GET["op"] == "consultar") {
			$controller->consultar();
		}else {
			if ($_GET["op"] == "registrar") {
				$controller->registrar();
			}else {
				if ($_GET["op"] == "deletar") {
					$controller->deletar();
				}else {
					$controller->atualizar();
				}
			}
		}	
	}
}

?>
