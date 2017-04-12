<?php
include_once("validar.php");
?> 
<?php
// Pegar os campos do formulario acima
$codant = $_POST["codant"];
$codigo = $_POST["matric"];
$nome = $_POST["nome"];
$endereco = $_POST["endereco"];
$email = $_POST["email"];

// Montar o SQL para pesquisar
$db = mysqli_connect("localhost", "root", "carloshenrique", "escola");
$sql = "UPDATE aluno SET matric = '$codigo', nome = '$nome', endereco = '$endereco', email = '$email'  WHERE matric = '$codant'";
$res = mysqli_query($db, $sql);

if ($res == TRUE) {
    // Criar a sessao. Login e senha conferem?>
        Matricula: <?php echo $codigo ?><br/>
        Nome......:<?php echo $nome ?><br/>
        Endereco.: <?php echo $endereco?> <br/>
        email......:<?php echo $email ?> <br/>
        <br/>

    <?php
} else {
    // Login e senha NAO conferem 
    header("Location:data_upaluno.php?erro=Algum erro para atualizar (com certeza é com o campo código).");
}
?>