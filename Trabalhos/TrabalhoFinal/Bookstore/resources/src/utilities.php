<?php

function connect() {
   $link = @mysqli_connect('localhost', 'root', 'carloshenrique', 'livraria');

   if (!$link) {
      die('Erro de conexão: ' . mysqli_connect_error());
   }

   return $link;
}

?>
