<?php

include_once("validar.php");

unset($_SESSION["login"]);
header("Location:formlogin.php?erro=Usuario deslogado");



?>