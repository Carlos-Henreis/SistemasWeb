<?php
$r_metehod = $_SERVER['REQUEST_METHOD'];
if ($r_metehod  == 'POST') { 
	if ($_POST['rcodigo'] !='' and $_POST['rtitulo'] !='' and $_POST['rautor'] !='' and $_POST['rdescricao'] !='') {
		$book->codigo = $_POST['rcodigo'];
		$book->titulo = $_POST['rtitulo'];
		$book->autor = $_POST['rautor'];
		$book->descricao = $_POST['rdescricao'];
		if ($this->model->save ($book) == true) {
			$r_metehod = "Livro INSERIDO";
		}
		else

			$r_metehod = "Livro NÂO INSERIDO campos duplicados";
		
		
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
	<form method="POST" action="/index.php">
		<label>codigo<input type="text" name="rcodigo"></label><br>
		<label>titulo<input type="text" name="rtitulo"></label><br>	
		<label>autor<input type="text" name="rautor"></label><br>	
		<label>descricao<input type="text" name="rdescricao"></label><br>
		<input type="submit" name="enviar">
		<input type="reset" name="apagar campos">		
	</form>
	<?php
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			echo $r_metehod;
		}
	?>
	<a href="/index.php">voltar!!</a>
</body>
</html>