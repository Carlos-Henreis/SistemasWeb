<?php
	function validaTel ($telefone) {
		echo preg_match("/[0-9]?[0-9]{4}-?[0-9]{4}/", $telefone);
		return preg_match("/[0-9]?[0-9]{4}-?[0-9]{4}/", $telefone);
	}
	$telefone = "0001-22";
	if (validaTel($telefone)) {
		echo $telefone."Valido!";
	}else {
		echo $telefone."Invalido!";
	}

	



?>