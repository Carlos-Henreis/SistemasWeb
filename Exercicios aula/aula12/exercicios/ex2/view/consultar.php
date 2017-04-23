<html>
<head>
	<meta charset="utf-8">
	<title>formulario</title>
</head>
<body>
	<form method="POST" action="/index.php">
		<label>Titulo<input type="text" name="titulo1"></label><br>
		<input type="submit" name="enviar">	
	</form>
	<a href="/index.php">voltar!!</a>
	<?php
	if ($_SERVER['REQUEST_METHOD']  == 'POST') {
		if ($result = $this->model->load($_POST['titulo1'])){
		    while ($row = $result->fetch_assoc()) {
		        echo "<h4> Titulo: ".$row["titulo"]."</h4> \n";
		        echo "<h5> autor: ".$row["autor"]."<br/> descricao: ".$row["descricao"]."<br/> \n";
	        }	
    	}    
	}
	?>
</body>
</html>
