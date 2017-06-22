<?php
include_once("validar.php");
$nome = $_SESSION["nome"];
?>  
<!DOCTYPE HTML>
<html>
    <head>
        <meta http-equiv="Content-Language" content="pt-br">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title> COM222 - Area Restrita </title>
        <link href="resources/styles/style.css" rel="stylesheet" type="text/css" />
        <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.2.1.min.js"></script>
    </head>

    <body>
        <div id="templatemo_container">

            <!--Open Header-->
            <?php
                include 'resources/includes/header.html';
            ?>
            <!--Close Header-->

            <div id="templatemo_content">
                <div id="templatemo_content_left"> 
                    <div class="templatemo_content_left_section">
                        <h1>Buscar</h1>
                        <form action="categories.php" method="GET">
                            <input class="searchField" type="text" name="search" autofocus placeholder="Buscar" /> 
                        </form>
                    </div>      
                    <div class="templatemo_content_left_section">
                        <h1>Opções</h1>
                        <ul>
                            <li><h2><a href="authors.php"> Autores </a></h2></li>
                            <li><h2><a href="categories.php"> Categorias </a></h2></li>
                            <li><h2><a href="books.php"> Livros </a></h2></li>                
                        </ul>
                    </div>
                    
                    
                </div> <!-- end of content left -->

                <div id="templatemo_content_right">
                    <div class="templatemo_product_box">
                        <h1>Bem vindo <strong> <?php echo $nome?></strong>(<a href="sair.php">SAIR</a>)</h1>
                    </div>
                    <div class="templatemo_product_box">
                        <!--Open Header-->
                        <div class='buy_now_button'><a href='newcategory.php'>Add Categoria</a></div>

                        <?php

                            $link = connect();

                            @$search = $_GET['search'];
                            @$deleteID = $_POST['deleteID'];



                            if(isset($deleteID)){
                                $sql = "DELETE FROM bookcategories WHERE CategoryID = '$deleteID'";

                                $result = mysqli_query($link, $sql)
                                    or die('SQL syntax error: ' . mysqli_error($link));
                                $sql = "DELETE FROM bookcategoriesbooks
                                    WHERE CategoryID='$deleteID';";

                                 $result = mysqli_query($link, $sql)
                                    or die('SQL syntax error: ' . mysqli_error($link));
                                if($result){
                                echo '<div class="alertsuccess">
                                      Livro deletado com sucesso!
                                    </div>';
                                }else{
                                    echo '<div class="alerterror">
                                          Livro não foi deletado. Tente novamente!
                                        </div>';
                                }
                            }

                            if(isset($search)) {
                                $sql = "SELECT CategoryID, CategoryName
                                        FROM bookcategories
                                        WHERE (CategoryID = '$search' OR CategoryName like '%$search%')
                                        ORDER BY CategoryName;";
                            }else{
                                $sql = "SELECT CategoryID, CategoryName
                                   FROM bookcategories
                                   ORDER BY CategoryName;";
                            }

                            $result = mysqli_query($link, $sql)
                                    or die('SQL syntax error: ' . mysqli_error($link));

                           
                        ?>

                        
                        <?php
                            while ($row = mysqli_fetch_array($result)) {

                                


                                echo "<div class='templatemo_product_box'>
                                        <table>
                                            <tr>
                                            <td><div class='Author'> <h2>$row[CategoryName]</h2></div></td>
                                            <td>
                                            <div class='buy_now_button'><a href='category.php?categoryID=$row[CategoryID]'>Editar</a></div>

                                            <td> <form action='categories.php' method='post'>
                                          <input name='deleteID' value='$row[CategoryID]' hidden />
                                          <div class='delete_button'><button type='submit'>Deletar</button></div>
                                        </form></td>
                                        </tr>
                                        </table>
                                        
                                         
                                        
                                      </div>";
                            }
                        ?>
                        
                    </div>

                        



                </div>

            </div>

            <!--Open Footer-->
            <?php
                include 'resources/includes/footer.html';
            ?>
            <!--Close Footer-->
        </div>
    </body>
</html>

<script type="text/javascript">
    $( "form" ).submit(function( event ) {
        var c = confirm("Deseja mesmo excluir este livro? Esta ação não pode ser desfeita.");
        
        if(c){
            var login = "";
            while(login == ""){
                login = prompt("Login:", "");
                if(login == null){
                    event.preventDefault();
                    return -1;
                }
            }
            var password = "";
            while(password == ""){
                password = prompt("Senha:", "");
                if(password == null){
                    event.preventDefault();
                    return -1;
                }
            }

            var l = '<?php echo $_SESSION["login"]; ?>';
            var p = '<?php echo $_SESSION["senha"]; ?>';
            if(login == l && password == p){
                return c;
            }else{
                alert("Login inválido. Tente novamente!");
               event.preventDefault(); 
            }
        }else{
            event.preventDefault();
        }
    });
</script>
