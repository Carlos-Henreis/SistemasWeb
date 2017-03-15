import javax.servlet.*;
import javax.servlet.http.*;
import java.io.*;
import java.util.*;

public class CadastraIdade extends HttpServlet {
  protected void doPost(HttpServletRequest request,
                        HttpServletResponse response)
                        throws ServletException, IOException {

    // pega parâmetros do request
    String nome = request.getParameter("nome");
    int anonas = Integer.parseInt(request.getParameter("anoidade"));    
    
    String mensagem = nome+" tem "+(2017-anonas)+" anos";

// acerta tipo MIME para a resposta
    response.setContentType("text/html");

    PrintWriter out = response.getWriter();
    out.println("<HTML>");
    out.println("<BODY>");
    out.println("<P>" + mensagem + ", " + nome + "</P>");
    out.println("</BODY>");
    out.println("</HTML>");
    out.close();
  }
}
