<%-- 
    Document   : Response
    Created on : 25/03/2017, 21:42:50
    Author     : carlos
--%>

<HTML>
    <BODY>
        <%
        // Este scriptlet declara e inicializa a vari�vel date
        System.out.println( "Avaliando a hora");
        java.util.Date date = new java.util.Date();
        %>
        Ol�! A hora atual �
        <%
        out.println(date);
        out.println("<BR>O endere�o da sua m�quina �:");
        out.println(request.getRemoteHost());
        %>
    </BODY>
</HTML>