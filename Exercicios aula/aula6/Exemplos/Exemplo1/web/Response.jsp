<%-- 
    Document   : Response
    Created on : 25/03/2017, 21:42:50
    Author     : carlos
--%>

<HTML>
    <BODY>
        <%
        // Este scriptlet declara e inicializa a variável date
        System.out.println( "Avaliando a hora");
        java.util.Date date = new java.util.Date();
        %>
        Olá! A hora atual é
        <%
        out.println(date);
        out.println("<BR>O endereço da sua máquina é:");
        out.println(request.getRemoteHost());
        %>
    </BODY>
</HTML>