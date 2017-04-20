import javax.servlet.*;
import javax.servlet.http.*;
import java.io.*;
import java.text.DateFormat;
import java.text.ParseException;
import java.text.SimpleDateFormat;
import java.util.*;
import java.util.logging.Level;
import java.util.logging.Logger;

public class situacaotime extends HttpServlet { 
  int geraal () {
     Random gerador = new Random();
    //inteiros aleatórios entre 0 e 3
    return (gerador.nextInt(4));
  }
  protected void doPost(HttpServletRequest request,
                        HttpServletResponse response)
                        throws ServletException, IOException {

    // pega parâmetros do request
    String nome = request.getParameter("nome");
    String time = request.getParameter("time"); 
    int situacao = geraal();
    String msg;
    switch (situacao) {
        case 1:
            msg = " Seria campeão";
            break;
        case 2:
            msg = "Estaria na libertadores";
            break;
        case 3:
            msg = "Seria rebaixado";
            break;
        default:
            msg =  "Estaria no meio da tabela";
    }
    
// acerta tipo MIME para a resposta
    response.setContentType("text/html");

    PrintWriter out = response.getWriter();
    out.println("<HTML>");
    out.println("<BODY>");
    out.println("<P>" +nome+", se o campeonato terminasse hoje, seu time:"+ msg +"</P>");
    out.println("</BODY>");
    out.println("</HTML>");
    out.close();

  }
}



