<%-- 
    Document   : tabelaDinamic
    Created on : 25/03/2017, 21:48:45
    Author     : carlos
--%>

<%@page contentType="text/html" pageEncoding="UTF-8"%>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Tabela Dinamic</title>
    </head>
    <body>
        <TABLE BORDER=2>
            <%
                int n =5;
                for (int i = 0; i < n; i++) {
            %>
            <TR>
                <TD>Número</TD>
                <TD><%= i + 1%></TD>
            </TR>
            <%
                }
            %>
        </TABLE>
    </body>
</html>
