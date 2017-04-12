<html> 
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"> 
        <title>Formulario de Login</title>
    </head> 
    <body>
        <form method="post" name="formLogin" action="login.php">
            <H1 align="center">Acesso aos usuarios</H1>
            <?php
            // Exibir mensagem de erro caso ocorra 
            if (isset($_GET["erro"])) {
                $erro = $_GET["erro"];
                echo "<CENTER><FONT color='red'> $erro</FONT></CENTER>";
            }
            ?>
            <table align="center">
                   <tr>
                    <th>Login</th>
                    <td><input type="text" name="txtLogin"></td>
                </tr> 
                <tr>
                    <th>Senha</th>
                    <td><input type="password" name="txtSenha"></td> 
                </tr>
                <tr>
                    <td><input type="submit" value="Logar"></td> 
                    <td><input type="reset" value="Limpar"></td>
                </tr> 
            </table> 
        </form>
    </body>
</html>
