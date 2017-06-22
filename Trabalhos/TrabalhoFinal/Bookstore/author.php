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

                            @$authorID = $_GET['authorID'];
                            @$nameF = $_POST['nameF'];
                            @$nameL = $_POST['nameL'];

                            if(isset($nameL) && isset($nameF)){
                                $sql = "UPDATE bookauthors
                                    SET nameF = '$nameF', nameL = '$nameL'
                                    WHERE AuthorID = $authorID";

                                $result = mysqli_query($link, $sql)
                                    or die('SQL syntax error: ' . mysqli_error($link));

                                echo '<div class="alertsuccess">
                                                  Dados alterados com sucesso!!
                                                </div>';
                            }

                            
                            $sql = "SELECT AuthorID, nameF, nameL
                                    FROM bookauthors
                                    WHERE AuthorID = $authorID";

                            $result = mysqli_query($link, $sql)
                                    or die('SQL syntax error: ' . mysqli_error($link));

                            $row = mysqli_fetch_array($result);

                        ?>

                        <?php

                            echo "
                                    <form method=\"post\" action=\"author.php?authorID=$row[AuthorID]\" autocomplete=\"on\">
                                        <div class='title2'> Alterar autor </div>

                                        <table class=\"formTable\">
                                             <tr>
                                                <td class=\"label\" >
                                                   Nome: </td>
                                                <td>
                                                   <input type=\"text\" name=\"nameF\" value='$row[nameF]' required/>
                                                </td>
                                             </tr>

                                             <tr>
                                                <td class=\"label\">
                                                   Sobrenome: </td>
                                                <td>
                                                   <input type=\"text\" name=\"nameL\" value='$row[nameL]' required/>
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
                            if(isset($confirm)){
                                echo "<h1>$confirm</h1>";
                            }
                        ?>
                            
                        
                    </div>

                        



                </div>

            </div>

            <!--Open Footer-->
        
            <!--Close Footer-->
        </div>
    </body>
</html>