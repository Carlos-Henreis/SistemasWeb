<html>
<head>
	<meta charset="utf-8">
	<title>formulario</title>
</head>
<body>
	<form method="POST" action="/index.php">
		<label>Codigo<input type="text" name="dcodigo"></label><br>
		<input type="submit" name="enviar">	
	</form>
	<a href="/index.php">voltar!!</a>
	<?php
	if ($_SERVER['REQUEST_METHOD']  == 'POST') {
		if ($this->model->delete($_POST['dcodigo']) === TRUE)
		    echo "Operação finalizada<br>"; 
		else
			echo "Aluno não excluido<br>"; 
	}
	?>
</body>
</html>