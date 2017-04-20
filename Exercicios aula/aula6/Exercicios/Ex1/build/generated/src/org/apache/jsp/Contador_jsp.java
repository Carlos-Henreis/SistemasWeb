package org.apache.jsp;

import javax.servlet.*;
import javax.servlet.http.*;
import javax.servlet.jsp.*;
import contador.ContadorBean;

public final class Contador_jsp extends org.apache.jasper.runtime.HttpJspBase
    implements org.apache.jasper.runtime.JspSourceDependent {

  private static final JspFactory _jspxFactory = JspFactory.getDefaultFactory();

  private static java.util.List<String> _jspx_dependants;

  private org.glassfish.jsp.api.ResourceInjector _jspx_resourceInjector;

  public java.util.List<String> getDependants() {
    return _jspx_dependants;
  }

  public void _jspService(HttpServletRequest request, HttpServletResponse response)
        throws java.io.IOException, ServletException {

    PageContext pageContext = null;
    HttpSession session = null;
    ServletContext application = null;
    ServletConfig config = null;
    JspWriter out = null;
    Object page = this;
    JspWriter _jspx_out = null;
    PageContext _jspx_page_context = null;

    try {
      response.setContentType("text/html");
      pageContext = _jspxFactory.getPageContext(this, request, response,
      			null, true, 8192, true);
      _jspx_page_context = pageContext;
      application = pageContext.getServletContext();
      config = pageContext.getServletConfig();
      session = pageContext.getSession();
      out = pageContext.getOut();
      _jspx_out = out;
      _jspx_resourceInjector = (org.glassfish.jsp.api.ResourceInjector) application.getAttribute("com.sun.appserv.jsp.resource.injector");

      out.write('\n');
      contador.ContadorBean cont_sessao = null;
      synchronized (session) {
        cont_sessao = (contador.ContadorBean) _jspx_page_context.getAttribute("cont_sessao", PageContext.SESSION_SCOPE);
        if (cont_sessao == null){
          cont_sessao = new contador.ContadorBean();
          _jspx_page_context.setAttribute("cont_sessao", cont_sessao, PageContext.SESSION_SCOPE);
        }
      }
      out.write('\n');
      contador.ContadorBean cont_aplicacao = null;
      synchronized (application) {
        cont_aplicacao = (contador.ContadorBean) _jspx_page_context.getAttribute("cont_aplicacao", PageContext.APPLICATION_SCOPE);
        if (cont_aplicacao == null){
          cont_aplicacao = new contador.ContadorBean();
          _jspx_page_context.setAttribute("cont_aplicacao", cont_aplicacao, PageContext.APPLICATION_SCOPE);
        }
      }
      out.write('\n');

    cont_sessao.aumentaCont();
    synchronized (page) {
        cont_aplicacao.aumentaCont();
    }

      out.write("\n");
      out.write("<h3>\n");
      out.write("    Numero de acessos nesta sessão:\n");
      out.write("    ");
      out.write(org.apache.jasper.runtime.JspRuntimeLibrary.toString((((contador.ContadorBean)_jspx_page_context.findAttribute("cont_sessao")).getCont())));
      out.write("\n");
      out.write("</h3>\n");
      out.write("<p>\n");
      out.write("<h3>\n");
      out.write("    Número total de acessos:\n");
      out.write("    ");
 synchronized (page) { 
      out.write("\n");
      out.write("    ");
      out.write(org.apache.jasper.runtime.JspRuntimeLibrary.toString((((contador.ContadorBean)_jspx_page_context.findAttribute("cont_aplicacao")).getCont())));
      out.write("\n");
      out.write("    ");
 }
      out.write("\n");
      out.write("</h3>");
    } catch (Throwable t) {
      if (!(t instanceof SkipPageException)){
        out = _jspx_out;
        if (out != null && out.getBufferSize() != 0)
          out.clearBuffer();
        if (_jspx_page_context != null) _jspx_page_context.handlePageException(t);
        else throw new ServletException(t);
      }
    } finally {
      _jspxFactory.releasePageContext(_jspx_page_context);
    }
  }
}
