<?php
// Pegar os campos do formulario acima
$login = $_POST["txtLogin"];
$senha = $_POST["txtSenha"];

// Montar o SQL para pesquisar
include "resources/src/Connection.php";
$link = connect();
$sql = "SELECT * FROM funcionario WHERE email = '$login' AND senha = '$senha' ";
$res = mysqli_query($link, $sql) or die("ERRO ao pesquisar login. " . mysqlerror());

var_dump($_SESSION);

if ($registro = mysqli_fetch_assoc($res)) {
    // Criar a sessao. Login e senha conferem
    $nome = $registro["nome"];
    session_start();
    $_SESSION["login"] = $login;
    $_SESSION["nome"] = $nome;
    $_SESSION["senha"] = $registro["senha"];
    header("Location:principal.php");
} else {
    // Login e senha NAO conferem 
    header("Location:formlogin.php?erro=Login invalido.");
}
?>