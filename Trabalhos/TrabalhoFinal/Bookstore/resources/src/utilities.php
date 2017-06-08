<?php

function connect() {
   $link = @mysqli_connect(' ', ' ', ' ', ' ');

   if (!$link) {
      die('Erro de conexão: ' . mysqli_connect_error());
   }

   return $link;
}

?>
