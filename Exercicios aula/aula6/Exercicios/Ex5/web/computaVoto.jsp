<%-- 
    Document   : computaVoto
    Created on : 25/03/2017, 11:37:02
    Author     : carlos
--%>
<%@ page import="beans.votoBeans" %>
<jsp:useBean id="voto_sessao" class="beans.votoBeans" scope="session" />
<jsp:setProperty name="voto_sessao" property="time"/>
<jsp:useBean id="voto_aplicacao" class="beans.votoBeans" scope="application" />

<%@page contentType="text/html" pageEncoding="UTF-8"%>
<%
    voto_sessao.aumentaVoto();
    synchronized(page) {
        if (voto_sessao.javotou()){
            out.print("vc já votou cretino");
        }
        else{
            voto_aplicacao.calculavoto(voto_sessao.gettime());
            out.print(voto_aplicacao.imprimeresult());
        } 
    }
%>