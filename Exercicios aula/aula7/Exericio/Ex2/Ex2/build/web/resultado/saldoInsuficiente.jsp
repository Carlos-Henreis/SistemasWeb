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

<h1>Olá, sr. ${objCliente.getNome()},
<br>Lamentamos em informar que seu saldo de R$${objCliente.getSaldo()} 
<br>é insuficiente para o saque de R$${valor}.</h1>

</fieldset>
<a href=".\index.jsp"> <input type="button" value="Home"></a>   

<br>
</body>
</html>
