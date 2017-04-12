<?php
include_once("validar.php");
?> 
<?php
// Pegar os campos do formulario acima
$codigo = $_POST["codigo"];

// Montar o SQL para pesquisar
$db = mysqli_connect("localhost", "root", "carloshenrique", "escola");
$sql = "SELECT * FROM aluno WHERE matric = '$codigo'";
$res = mysqli_query($db, $sql) or die("ERRO ao pesquisar login. " . mysqlerror());

if ($registro = mysqli_fetch_assoc($res)) {
    // Criar a sessao. Login e senha conferem
    ?>
	<form action="data_up.php" method="post">
		<input type="hidden" name="codant" value="<?php echo $registro["matric"] ?>">
        Matricula: <input type="text" name="matric" value="<?php echo $registro["matric"] ?>" /> <br/>
        Nome......: <input type="text" name="nome" value="<?php echo $registro["nome"] ?>"/> <br/>
        Endereco.: <input type="text" name="endereco" value="<?php echo $registro["endereco"]?>"/> <br/>
        email.......: <input type="text" name="email" value="<?php echo $registro["email"] ?>"/> <br/>
        <br/>
        <input type="submit" name="submit" /> <input type="reset" />
 	</form>

    <?php
} else {
    // Login e senha NAO conferem 
    header("Location:data_upaluno.php?erro=aluno não encontrado.");
}
?>
