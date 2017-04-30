<?php
   $query = $_GET['query'];
   $db = new mysqli("localhost", "root", "carloshenrique", "Usuario");
	$sql = "SELECT * FROM Usuario WHERE nome LIKE '%".$query."%'";
  $result = $db->query($sql);      /*  execute a query */
  
  $endereco;
  $parcial;
  $final = array();
  while ($row = $result->fetch_assoc()) {
    $endereco = explode(",", $row["endereco"]);
    $endereco = array("rua" => $endereco[0], "numero" =>  $endereco[1], "bairro" =>$endereco[2], "cidade" =>$endereco[3]);
    $parcial = array ("id" => $row["codigo"], "nome" => $row["nome"], "endereco" => $endereco);
    array_push($final, $parcial);
  }

  $data = array("query" => "HE", "result" => $final);
  $db->close(); 
     
  echo (json_encode($data));
?>