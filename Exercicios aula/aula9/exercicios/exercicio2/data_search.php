<?php
// Pegar os campos do formulario acima
$codigo = $_POST["codigo"];

// Montar o SQL para pesquisar
$db = mysqli_connect("localhost", "root", "carloshenrique", "escola");
$sql = "SELECT * FROM aluno WHERE matric = '$codigo'";
$res = mysqli_query($db, $sql) or die("ERRO ao pesquisar login. " . mysqlerror());

if ($registro = mysqli_fetch_assoc($res)) {
    // Criar a sessao. Login e senha conferem
    $nome = $registro["nome"];
    echo "<h4> Nome: " . $registro["nome"] . "</h4> \n";
    echo "<h5> Matricula: " . $registro["matric"] . "<br/> Email: " . $registro["email"] . "<br/> Endereco: " . $registro["endereco"] . "</h5> \n";
} else {
    // Login e senha NAO conferem 
    header("Location:data_searchForm.php?erro=código não existe invalido.");
}
?>