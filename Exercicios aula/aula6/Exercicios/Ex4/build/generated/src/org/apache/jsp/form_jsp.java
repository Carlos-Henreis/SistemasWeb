package org.apache.jsp;

import javax.servlet.*;
import javax.servlet.http.*;
import javax.servlet.jsp.*;
import beans.FormBean;

public final class form_jsp extends org.apache.jasper.runtime.HttpJspBase
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

      out.write("\n");
      out.write("\n");
      out.write("\n");
      beans.FormBean formulario = null;
      synchronized (session) {
        formulario = (beans.FormBean) _jspx_page_context.getAttribute("formulario", PageContext.SESSION_SCOPE);
        if (formulario == null){
          formulario = new beans.FormBean();
          _jspx_page_context.setAttribute("formulario", formulario, PageContext.SESSION_SCOPE);
        }
      }
      out.write('\n');
      org.apache.jasper.runtime.JspRuntimeLibrary.introspect(_jspx_page_context.findAttribute("formulario"), request);
      out.write("\n");
      out.write("<html>\n");
      out.write("    <body bgcolor=\"#c8d8f8\">\n");
      out.write("        <form action=\"Confirm.jsp\" method=post>\n");
      out.write("            <center>\n");
      out.write("                <table cellpadding=4 cellspacing=2 border=0>\n");
      out.write("\n");
      out.write("                    <th bgcolor=\"#CCCCFF\" colspan=2>\n");
      out.write("                        <font size=5>Registro de usuário</font>\n");
      out.write("                    </th>\n");
      out.write("\n");
      out.write("                    <tr>\n");
      out.write("                        <td valign=top> \n");
      out.write("                            <b>Primeiro nome</b> \n");
      out.write("                            <br>\n");
      out.write("                            <input type=\"text\" name=\"nome\" size=15></td>\n");
      out.write("                        <td  valign=top>\n");
      out.write("                            <b>Último nome</b>\n");
      out.write("                            <br>\n");
      out.write("                            <input type=\"text\" name=\"sobrenome\" size=15></td>\n");
      out.write("                    </tr>\n");
      out.write("\n");
      out.write("                    <tr>\n");
      out.write("                        <td valign=top colspan=2>\n");
      out.write("                            <b>E-Mail</b> \n");
      out.write("                            <br>\n");
      out.write("                            <input type=\"text\" name=\"email\" size=20>\n");
      out.write("                            <br></td>\n");
      out.write("                    </tr>\n");
      out.write("\n");
      out.write("                    <tr>\n");
      out.write("                        <td  valign=top colspan=2>\n");
      out.write("                            <b>Em quais linguagens você programa?</b>\n");
      out.write("                            <br>\n");
      out.write("                            <input type=\"checkbox\" name=\"linguagens\" value=\"Java\">Java&nbsp;&nbsp; \n");
      out.write("                            <input type=\"checkbox\" name=\"linguagens\" value=\"C++\">C++&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;\n");
      out.write("                            <input type=\"checkbox\" name=\"linguagens\" value=\"C\">C<br>\n");
      out.write("                            <input type=\"checkbox\" name=\"linguagens\" value=\"Perl\">Perl&nbsp;&nbsp;\n");
      out.write("                            <input type=\"checkbox\" name=\"linguagens\" value=\"COBOL\">COBOL\n");
      out.write("                            <input type=\"checkbox\" name=\"linguagens\" value=\"VB\">VB<br>\n");
      out.write("                        </td>\n");
      out.write("                    </tr>\n");
      out.write("\n");
      out.write("                    <tr>\n");
      out.write("                        <td  valign=top colspan=2>\n");
      out.write("                            <b>Com qual freqüência poderemos notificá-lo sobre novidades?</b>\n");
      out.write("                            <br>\n");
      out.write("                            <input type=\"radio\" name=\"notificacao\" value=\"Semanalmente\" checked>Semanalmente&nbsp;&nbsp;\n");
      out.write("                            <input type=\"radio\" name=\"notificacao\" value=\"Mensalmente\">Mensalmente&nbsp;&nbsp; \n");
      out.write("                            <input type=\"radio\" name=\"notificacao\" value=\"Quinzenalmente\">Quinzenalmente \n");
      out.write("                            <br></td>\n");
      out.write("                    </tr>\n");
      out.write("\n");
      out.write("                    <tr>\n");
      out.write("                        <td  align=center colspan=2>\n");
      out.write("                            <input type=\"submit\" value=\"Submit\"> <input type=\"reset\"  value=\"Reset\">\n");
      out.write("                        </td>\n");
      out.write("                    </tr>\n");
      out.write("\n");
      out.write("                </table>\n");
      out.write("            </center>\n");
      out.write("        </form>\n");
      out.write("\n");
      out.write("\n");
      out.write("        ");

            if (request.getMethod().equals("POST")) {
        
      out.write("\n");
      out.write("        \n");
      out.write("        ");
      out.write("\n");
      out.write("        ");
      out.write("\n");
      out.write("\n");
      out.write("        ");

            }
        
      out.write("\n");
      out.write("        </font>\n");
      out.write("    </body>\n");
      out.write("</html>\n");
      out.write("\n");
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
