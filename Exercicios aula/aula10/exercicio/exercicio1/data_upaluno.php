<?php
include_once("validar.php");
?> 
<html><head><title>Consulta alunos</title></head><body>
        <h1> Banco de dados de alunos</h1>
        <p>
        <form method="post" name="formLogin" action="data_upForm.php">
            <H1 align="center">buscar aluno</H1>
            <?php
            // Exibir mensagem de erro caso ocorra 
            if (isset($_GET["erro"])) {
                $erro = $_GET["erro"];
                echo "<CENTER><FONT color='red'> $erro</FONT></CENTER>";
            }
            ?>
            <br>Codigo  <input type="text" name="codigo">
            <br><input type="submit" value="Buscar">
        </form>
        </p>
       </body></html>