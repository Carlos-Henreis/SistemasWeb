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
                            @$nameL = $_POST['nameL'];
                            @$nameF = $_POST['nameF'];

                            if(isset($nameL) && isset($nameF)){
                                $sql = "INSERT INTO bookauthors (nameF, nameL)
                                    VALUES  ('$nameF', '$nameL')";

                                $result = mysqli_query($link, $sql)
                                    or die('SQL syntax error: ' . mysqli_error($link));

                                $confirm = true;
                            }

                        ?>

                        <?php
                            if(isset($confirm)){
                                echo "<h1>Autor salvo com sucesso!</h1>";
                            }else{
                
                                echo "
                                    <form method=\"post\" action=\"newAuthor.php\" autocomplete=\"on\">
                                        <div class='title2'> Novo autor </div>

                                        <table class=\"formTable\">
                                             <tr>
                                                <td class=\"label\" >
                                                   Nome: </td>
                                                <td>
                                                   <input type=\"text\" name=\"nameF\" autofocus placeholder=\"Nome do autor\" required/>
                                                </td>
                                             </tr>

                                             <tr>
                                                <td class=\"label\">
                                                   Sobrenome: </td>
                                                <td>
                                                   <input type=\"text\" name=\"nameL\" autofocus placeholder=\"Sobrenome autor\" required/>
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