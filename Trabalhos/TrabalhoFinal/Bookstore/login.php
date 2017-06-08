<?php
// Pegar os campos do formulario acima
$login = $_POST["txtLogin"];
$senha = $_POST["txtSenha"];

// Montar o SQL para pesquisar
$db = mysqli_connect("localhost", "root", "", "livraria");
$sql = "SELECT * FROM funcionario WHERE login = '$login' AND senha = '$senha' ";
$res = mysqli_query($db, $sql) or die("ERRO ao pesquisar login. " . mysqlerror());

if ($registro = mysqli_fetch_assoc($res)) {
    // Criar a sessao. Login e senha conferem
    $nome = $registro["nome"];
    session_start();
    $_SESSION["login"] = $login;
    $_SESSION["nome"] = $nome;
    header("Location:principal.php");
} else {
    // Login e senha NAO conferem 
    header("Location:formlogin.php?erro=Login invalido.");
}
?>