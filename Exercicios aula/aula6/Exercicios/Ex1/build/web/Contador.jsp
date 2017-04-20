<%@ page import="contador.ContadorBean" %>
<jsp:useBean id="cont_sessao" class="contador.ContadorBean" scope="session" />
<jsp:useBean id="cont_aplicacao" class="contador.ContadorBean" scope="application" />
<%
    cont_sessao.aumentaCont();
    synchronized (page) {
        cont_aplicacao.aumentaCont();
    }
%>
<h3>
    Numero de acessos nesta sess�o:
    <jsp:getProperty name="cont_sessao" property="cont" />
</h3>
<p>
<h3>
    N�mero total de acessos:
    <% synchronized (page) { %>
    <jsp:getProperty name="cont_aplicacao" property="cont" />
    <% }%>
</h3>