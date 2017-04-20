<html>
<head>
	<meta charset="utf-8">
	<title>formulario</title>
</head>
<body>
	<form method="POST" action="consultar.php">
		<label>Matricula<input type="text" name="matricula"></label><br>
		<input type="submit" name="enviar">	
	</form>
	<a href="index.php">voltar!!</a>
	<?php
	if ($_SERVER['REQUEST_METHOD']  == 'POST') {
		include_once ('Aluno.php');
		$aluno = new Aluno ('localhost', 'root', 'carloshenrique', 'escola');

		if ($result = $aluno->load($_POST['matricula']))
		    while ($row = $result->fetch_assoc()) {
		        echo "<h4> Nome: ".$row["nome"]."</h4> \n";
		        echo "<h5> Matricula: ".$row["matricula"]."<br/> curso: ".$row["curso"]."<br/> \n";
	        }	    
	}
	?>
</body>
</html>
