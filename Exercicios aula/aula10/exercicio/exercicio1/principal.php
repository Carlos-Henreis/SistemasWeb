<?php
include_once("validar.php");
$nome = $_SESSION["nome"];

?>  
<html>
    <head>
        <meta charset="UTF-8">
        <title>Login bem sucedido</title>
    </head>
    <body>
             <?php
                echo "<h3>" . "Bem vindo " . $nome . "</h3>";
             ?>
             <a href="data_out.php">listar</a>,
            <a href="data_in.php">Inserir</a>,
            <a href="data_searchForm.php">buscar</a>;
            by <a href="data_upaluno.php">atualizar</a>..
    </body>
</html>