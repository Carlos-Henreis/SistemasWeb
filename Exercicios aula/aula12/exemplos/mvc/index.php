<?php

// Toda interação acontece no index e é enviada
// diretamente ao controlador

include_once("controller/Controller.php");

$controller = new Controller();
$controller->invoke();

?>
