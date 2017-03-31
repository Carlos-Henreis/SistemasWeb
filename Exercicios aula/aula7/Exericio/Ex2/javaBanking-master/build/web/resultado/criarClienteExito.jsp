<%@page contentType="text/html" pageEncoding="UTF-8"%>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Saldo de conta</title>


        <LINK REL=STYLESHEET HREF="./bank-support/JSP-Styles.css" TYPE="text/css">


    </head>
    <body>
        <fieldset>
            <legend><h2>Home Banking</h2></legend>
            <h1> Seja bem vindo, Sr. ${objCliente.getNome()} ! </h1> <br>
            <h2> O número da sua conta é: ${objCliente.getNroConta()} <br>
                <h2> E o seu saldo inicial é: R$ ${objCliente.getSaldo()} <br>

                    </fieldset>
                    <a href=".\index.jsp"> <input type="button" value="Home"></a>   

                    <br>
                    </body>
                    </html>