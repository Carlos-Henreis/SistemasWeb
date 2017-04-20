<?php
$r_metehod = $_SERVER['REQUEST_METHOD'];
if ($r_metehod  == 'POST') {
	include_once ('Aluno.php');
	$aluno = new Aluno ('localhost', 'root', 'carloshenrique', 'escola');
	if ($_POST['matricula'] !='' and $_POST['nome'] !='' and $_POST['curso'] !='') {
		$aluno->matricula = $_POST['matricula'];
		$aluno->nome = $_POST['nome'];
		$aluno->curso = $_POST['curso'];
		if ($aluno->save() == true) {
			$r_metehod = "ALUNO INSERIDO";
		}
		else
			$r_metehod = "ALUNO NÂO INSERIDO campos duplicados";
		
		
	}
	else
		$r_metehod = "Formulario Incompleto<br>";
}
?>
<html>
<head>
	<meta charset="utf-8">
	<title>formulario</title>
</head>
<body>
	<form method="POST" action="registra.php">
		<label>Matricula<input type="text" name="matricula"></label><br>
		<label>nome<input type="text" name="nome"></label><br>	
		<label>curso<input type="text" name="curso"></label><br>	
		<input type="submit" name="enviar">
		<input type="reset" name="apagar campos">		
	</form>
	<?php
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			echo $r_metehod;
		}
	?>
	<a href="index.php">voltar!!</a>
</body>
</html>