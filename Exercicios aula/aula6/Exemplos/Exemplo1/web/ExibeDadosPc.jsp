<%-- 
    Document   : ExibeDadosPc
    Created on : 25/03/2017, 21:33:34
    Author     : carlos
--%>

<%@page contentType="text/html" pageEncoding="UTF-8"%>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Dados do PC</title>
    </head>
    <body>
        <h1>Versão do Java: <%= System.getProperty("java.version") %></h1><br>
        <h1>Diretório de instalação do Java Runtime Environment (JRE): <%= System.getProperty("java.home") %></h1><br>
        <h1>Nome do sistema operacional: <%= System.getProperty("os.name") %></h1><br>
        <h1>Diretório inicial do usuário do SO: <%= System.getProperty("user.name") %></h1><br>
        <h1>Nome do usuário do SO: <%= System.getProperty("user.home") %></h1><br>
    </body>
</html>
