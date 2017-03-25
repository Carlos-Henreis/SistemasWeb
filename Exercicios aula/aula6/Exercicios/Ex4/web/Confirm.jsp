<%-- 
    Document   : Confirm
    Created on : 24/03/2017, 00:17:18
    Author     : carlos
--%>

<jsp:useBean id="formulario" class="beans.FormBean" scope="session"/>
<jsp:setProperty name="formulario" property="*"/>
<HTML>
   <BODY bgcolor="#c8d8f8">
       <div style="color: red">
            <p><strong>Você submeteu as seguintes iformações</strong></p>
            <p><strong>Primeiro Nome</strong><br>
               <%= formulario.getNome()%>
            </p>
            <p><strong>Último Nome</strong><br>
               <%= formulario.getSobrenome()%>
            </p>
            <p><strong>E-mail</strong><br>
               <%= formulario.getEmail()%>
            </p>
            <p><strong>Linguagens</strong><br>
                <ul>
                    <%
                    String listalinguagem = "";
                    String linguagens[] = formulario.getLinguagens();
                    for (int i = 0; i < linguagens.length; i++) {
                        listalinguagem += linguagens[i]+ "";
                         out.println("<li>"+linguagens[i]+"</li>");
                    }
                    %>
               </ul>
            </p>
            <p><strong>Notificação</strong><br>
               <%= formulario.getNotificacao()%>
            </p>
            <form method="get" action="/Ex4/Registra">
                <p><input type="submit" value="Confirma">
            </FORM>
        </div>
    </BODY>
</HTML>