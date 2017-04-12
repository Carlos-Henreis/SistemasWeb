<?php
session_start();
if (!isset($_SESSION["login"])) {
    header("Location:formlogin.php?erro=Usuario nao logado");
}
?>