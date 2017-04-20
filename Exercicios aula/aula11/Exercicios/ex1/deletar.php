<html>
<head>
	<meta charset="utf-8">
	<title>formulario</title>
</head>
<body>
	<form method="POST" action="deletar.php">
		<label>Matricula<input type="text" name="matricula"></label><br>
		<input type="submit" name="enviar">	
	</form>
	<a href="index.php">voltar!!</a>
	<?php
	if ($_SERVER['REQUEST_METHOD']  == 'POST') {
		include_once ('Aluno.php');
		$aluno = new Aluno ('localhost', 'root', 'carloshenrique', 'escola');

		if ($aluno->delete($_POST['matricula']) === TRUE)
		    echo "Operação finalizada<br>"; 
		else
			echo "Aluno não excluido<br>"; 
	}
	?>
</body>
</html>