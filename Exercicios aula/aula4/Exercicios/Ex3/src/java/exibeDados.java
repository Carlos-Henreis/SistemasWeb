import javax.servlet.*;
import javax.servlet.http.*;
import java.io.*;
import java.util.*;

public class exibeDados extends HttpServlet {
  protected void doPost(HttpServletRequest request,
                        HttpServletResponse response)
                        throws ServletException, IOException {

    // pega parâmetros do request
    String nome = request.getParameter("nome");
    String sigla = request.getParameter("curso").toUpperCase(); 
    String mensagem = nome+", seu curso: ";
    switch (sigla) {
        case "ADM":
            mensagem += "é noturno e o tempo de integralização é 4 anos";
            break;
        case "BLI":
            mensagem += "é noturno e o tempo de integralização é 4 anos";
            break;
        case "CAT":
            mensagem += "é integral e o tempo de integralização é 4 anos";
            break;
        case "CCO":
            mensagem += "é integral e o tempo de integralização é 4 anos";
            break;
        case "EAM":
            mensagem += "é integral e o tempo de integralização é 5 anos";
            break;
        case "EBP":
            mensagem += "é integral e o tempo de integralização é 5 anos";
            break; 
        case "ECA":
            mensagem += "é integral e o tempo de integralização é 5 anos";
            break;
        case "ECI":
            mensagem += "é integral e o tempo de integralização é 5 anos";
            break;
        case "ECO":
            mensagem += "é integral e o tempo de integralização é 5 anos";
            break;
        case "EEL":
            mensagem += "é integral e o tempo de integralização é 5 anos";
            break;
        case "ELT":
            mensagem += "é integral e o tempo de integralização é 5 anos";
            break;
        case "EEN":
            mensagem += "é integral e o tempo de integralização é 5 anos";
            break;
        case "EHD":
            mensagem += "é integral e o tempo de integralização é 5 anos";
            break;
        case "EMA":
            mensagem += "é integral e o tempo de integralização é 5 anos";
            break;
        case "EME":
            mensagem += "é integral e o tempo de integralização é 5 anos";
            break;
        case "EMT":
            mensagem += "é integral e o tempo de integralização é 5 anos";
            break;
        case "EPR":
            mensagem += "é integral e o tempo de integralização é 5 anos";
            break;
        case "EQI":
            mensagem += "é integral e o tempo de integralização é 5 anos";
            break;
        case "FBA":
            mensagem += "é noturno e o tempo de integralização é 4 anos";
            break;
        case "FLI":
            mensagem += "é noturno e o tempo de integralização é 4 anos";
            break;
        case "MBA":
            mensagem += "é noturno e o tempo de integralização é 4 anos";
            break;
        case "MLI":
            mensagem += "é noturno e o tempo de integralização é 4 anos";
            break;
        case "QBA":
            mensagem += "é integral e o tempo de integralização é 4 anos";
            break;
        case "QLI":
            mensagem += "é noturno e o tempo de integralização é 4 anos";
            break;
        case "SIN":
            mensagem += "é noturno e o tempo de integralização é 4 anos";
            break;
        default:
            mensagem += "Você não está matriculado na UNIFEI";
    }
   
// acerta tipo MIME para a resposta
    response.setContentType("text/html");

    PrintWriter out = response.getWriter();
    out.println("<HTML>");
    out.println("<BODY>");
    out.println("<P>" + mensagem +"</P>");
    out.println("</BODY>");
    out.println("</HTML>");
    out.close();
  }
}
