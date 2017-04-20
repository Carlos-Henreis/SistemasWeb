<html><head><title>Consulta alunos</title></head><body>
    <form method="get" name="formLogin" action="atualizar.php">
        <H1 align="center">buscar aluno</H1>
        <br>Codigo  <input type="text" name="matricula">
        <br><input type="submit" value="Buscar">
        </form>
        <a href="index.php">voltar!!</a>
        <?php
            include_once ('Aluno.php');
            $aluno = new Aluno ('localhost', 'root', 'carloshenrique', 'escola');
            if (isset($_POST['curso']) and isset($_POST['nome'])){
                if ($result = $aluno->update ($_POST['matricula'], $_POST)){
                    echo "dados atualizados<br>";
                    unset($_POST['curso']);
                    unset($_POST['nome']);
                }  
            }
            if (isset($_GET['matricula']) and $_GET['matricula'] != '') {
                
                if ($result = $aluno->load($_GET['matricula']))
                    if ($row = $result->fetch_assoc() and isset ($row["curso"]) and isset ($row["nome"])) {?><br>
                        <form action="atualizar.php" method="post">
                            <input type="hidden" name="matricula" value="<?php echo $row["matricula"] ?>" /> <br/>
                            Nome......: <input type="text" name="nome" value="<?php echo $row["nome"] ?>"/> <br/>
                            curso.: <input type="text" name="curso" value="<?php echo $row["curso"]?>"/> <br/>
                            <br/>
                            <input type="submit" name="submit" /> <input type="reset" />
                        </form>
                    <?php
                }
                else {
                    echo "Aluno não encontrado";
                }
            }
            else {
                echo "Entre com os dados corretos<br>";
            }
            
        ?>
    </p>
</body></html>