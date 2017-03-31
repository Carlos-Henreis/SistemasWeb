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

<h1>Olá, sr. ${objClienteO.getNome()}!</h1>
    
<h2> O Senhor transferiu da sua conta um valor de R$${valor}
<br> e depositou na conta de ${objClienteD.getNome()}.

<br><br>Saldo Atual: R$${objClienteO.getSaldo()} </h2> 


</fieldset>
<a href=".\index.jsp"> <input type="button" value="Home"></a>   

<br>
</body>
</html>
