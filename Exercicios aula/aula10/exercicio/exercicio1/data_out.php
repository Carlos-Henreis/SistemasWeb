<?php
include_once("validar.php");
?> 
<html><head><title>Consulta alunos</title></head><body>
        <h1> Banco de dados de alunos</h1>
        <p> Ordenar a lista de estudantes por
            <a href="data_out.php?ordem=matric">matricula</a>,
            <a href="data_out.php?ordem=nome">nome</a>, or
            by <a href="data_out.php?ordem=email">e-mail</a>.
        </p>
        <?php
        /* obtem alunos do banco */
        $db = new mysqli("localhost", "root", 'carloshenrique', 'escola');
        if (!isset($_GET["ordem"])){
        $sql = "SELECT * FROM aluno";
        }
        else {
            switch ($_GET["ordem"]) {
                case 'matric': $sql = "SELECT * FROM aluno ORDER BY matric";
                    break;
                case 'nome': $sql = "SELECT * FROM aluno ORDER BY nome";
                    break;
                case 'email': $sql = "SELECT * FROM aluno ORDER BY email";
                    break;
                default: $sql = "SELECT * FROM aluno";
                    break;
            }
        }
        echo $sql;
        $result = $db->query($sql);      /*  execute a query */
        while ($row = $result->fetch_assoc()) {
        echo "<h4> Nome: " . $row["nome"] . "</h4> \n";
        echo "<h5> Matricula: " . $row["matric"] . "<br/> Email: " . $row["email"] . "<br/> Endereco: " . $row["endereco"] . "</h5> \n";
        }
        $db->close();
        ?></body></html>

