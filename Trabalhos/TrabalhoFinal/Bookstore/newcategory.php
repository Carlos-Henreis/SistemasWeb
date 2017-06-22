<?php
include_once("validar.php");
$nome = $_SESSION["nome"];
?>  
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
                        <!--Open Header-->
                        <?php

                            $link = connect();
                            @$CategoryName = $_POST['CategoryName'];

                            if(isset($CategoryName)){
                                $sql = "INSERT INTO `bookcategories`(`CategoryName`) VALUES ('$CategoryName');";

                                $result = mysqli_query($link, $sql)
                                    or die('SQL syntax error: ' . mysqli_error($link));

                                $confirm = true;
                            }

                        ?>

                        <?php
                            if(isset($confirm)){
                                echo "<h1>Categoria salva com sucesso!</h1>";
                            }else{
                
                                echo "
                                    <form method=\"post\" action=\"newcategory.php\" autocomplete=\"on\">
                                        <div class='title2'> Nova Categoria </div>

                                        <table class=\"formTable\">
                                             <tr>
                                                <td class=\"label\" >
                                                   Nome da categoria: </td>
                                                <td>
                                                   <input type=\"text\" name=\"CategoryName\" autofocus placeholder=\"Nome da categoria\" required/>
                                                </td>
                                             </tr>


                                             <tr>
                                                <td>
                                                    <input class=\"button\" type=\"reset\" value=\"Limpar\"/>
                                                </td>
                                                <td>
                                                    <input class=\"button\" type=\"submit\" value=\"Adicionar\"/>
                                                </td>
                                             </tr>
                                        </table>
                                    </form>
                                </div>
                                ";
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