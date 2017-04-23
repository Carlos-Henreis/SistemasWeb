<html><head><title>Consulta alunos</title></head><body>
    <form method="get" name="formLogin" action="/index.php">
        <br>Codigo  <input type="text" name="acodigo">
        <br><input type="submit" value="Buscar">
    </form>
    <a href="/index.php">voltar!!</a>
    <?php
        if (isset($_POST['titulo']) and isset($_POST['autor']) and isset($_POST['descricao'])){
            var_dump($_POST['titulo']);
            $arr = array("titulo" => $_POST['titulo'],  "autor" => $_POST['autor'],  "descricao" => $_POST['descricao']);
            if ($result = $this->model->update ($_POST['acodigo'], $arr)){
                echo "dados atualizados<br>";
            }  
        }
        if (isset($_GET['acodigo']) and $_GET['acodigo'] != '') {
            if ($result = $this->model->load1($_GET['acodigo']))
                if ($row = $result->fetch_assoc() and isset ($row["titulo"]) and isset ($row["autor"])) {?><br>
                    <form action="/index.php" method="post">
                        <input type="hidden" name="acodigo" value="<?php echo $row["codigo"] ?>" /> <br/>
                        titulo......: <input type="text" name="titulo" value="<?php echo $row["titulo"] ?>"/> <br/>
                        autor.: <input type="text" name="autor" value="<?php echo $row["autor"]?>"/> <br/>
                        <br/>
                        descricao.: <input type="text" name="descricao" value="<?php echo $row["descricao"]?>"/> <br/>
                        <br/>
                        <input type="submit" name="submit" /> <input type="reset" />
                    </form>
                <?php
                unset($_POST['autor']);
                unset($_POST['titulo']);
            }
            else {
                echo "livro não encontrado";
            }
        }
        
    ?>
    </p>
</body></html>