<?php
include_once("validar.php");
$nome = $_SESSION["nome"];
?>  
<!DOCTYPE HTML>
<html>
    <head>
        <title> Bookstore </title>
        <link rel="stylesheet" href="resources/styles/style.css" type="text/css"/>
        <link rel="script" href="resources/src/">
    </head>

    <body>
        <div class="content">

            <!--Open Header-->
            <?php
                include 'resources/includes/header.html';
            ?>
            <!--Close Header-->

            <div>
                <a href="sair.php"><input class="button" type="submit" value="SAIR"></a>
            </div>

            <div class="bodyContainer">
                
                

            
                    <div class="checkoutContainer">
                        <p>Bem vindo <?php $nome?></p>
                        MANO COLOCA AS PARADAS AQUI
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