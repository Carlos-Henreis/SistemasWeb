<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <p>estrutua de repetição</p>
        <?php
        $x = rand(1, 5); // número aleatório
        echo "x = $x <br/><br/>";
        switch ($x) {
            case 1:
                echo "Número 1";
                break;
            case 2:
                echo "Número 2";
                break;
            case 3:
                echo "Número 3";
                break;
            default:
                echo "Nenhum nro entre 1 e 3";
                break;
        }
        ?>
    </body>
</html>
