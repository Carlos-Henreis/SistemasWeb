<%@ page import="beans.FormBean" %>
<jsp:useBean id="formulario" class="beans.FormBean" scope="session"/>
<jsp:setProperty name="formulario" property="*"/>
<html>
    <body bgcolor="#c8d8f8">
        <form action="form.jsp" method=post>
            <center>
                <table cellpadding=4 cellspacing=2 border=0>

                    <th bgcolor="#CCCCFF" colspan=2>
                        <font size=5>Registro de usuário</font>
                    </th>

                    <tr>
                        <td valign=top> 
                            <b>Primeiro nome</b> 
                            <br>
                            <input type="text" name="nome" size=15></td>
                        <td  valign=top>
                            <b>Último nome</b>
                            <br>
                            <input type="text" name="sobrenome" size=15></td>
                    </tr>

                    <tr>
                        <td valign=top colspan=2>
                            <b>E-Mail</b> 
                            <br>
                            <input type="text" name="email" size=20>
                            <br></td>
                    </tr>

                    <tr>
                        <td  valign=top colspan=2>
                            <b>Em quais linguagens você programa?</b>
                            <br>
                            <input type="checkbox" name="linguagens" value="Java">Java&nbsp;&nbsp; 
                            <input type="checkbox" name="linguagens" value="C++">C++&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <input type="checkbox" name="linguagens" value="C">C<br>
                            <input type="checkbox" name="linguagens" value="Perl">Perl&nbsp;&nbsp;
                            <input type="checkbox" name="linguagens" value="COBOL">COBOL
                            <input type="checkbox" name="linguagens" value="VB">VB<br>
                        </td>
                    </tr>

                    <tr>
                        <td  valign=top colspan=2>
                            <b>Com qual freqüência poderemos notificá-lo sobre novidades?</b>
                            <br>
                            <input type="radio" name="notificacao" value="Semanalmente" checked>Semanalmente&nbsp;&nbsp;
                            <input type="radio" name="notificacao" value="Mensalmente">Mensalmente&nbsp;&nbsp; 
                            <input type="radio" name="notificacao" value="Quinzenalmente">Quinzenalmente 
                            <br></td>
                    </tr>

                    <tr>
                        <td  align=center colspan=2>
                            <input type="submit" value="Submit"> <input type="reset"  value="Reset">
                        </td>
                    </tr>

                </table>
            </center>
        </form>


        <%
            if (request.getMethod().equals("POST")) {
        %>
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
                    String linguagens[] = formulario.getLinguagens();
                    for (int i = 0; i < linguagens.length; i++) {
                         out.println("<li>"+linguagens[i]+"</li>");
                    }
                    %>
               </ul>
            </p>
            <p><strong>Notificação</strong><br>
               <%= formulario.getNotificacao()%>
            </p>
        </div>
        <%-- Cria o bean quando o formulário é submetido--%>
        <%-- Gere a resposta obtendo as informações salvas no bean --%>

        <%
            }
        %>
        </font>
    </body>
</html>
