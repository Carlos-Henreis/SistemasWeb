import javax.servlet.*;
import javax.servlet.http.*;
import java.io.*;
import java.util.*;
import javax.servlet.annotation.*;

@WebServlet("/registration-form")
public class RegistrationForm extends HttpServlet {

    public void doGet(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {
        response.setContentType("text/html");
        PrintWriter out = response.getWriter();
        String actionURL = "./registration";
        String codigo = CookieUtilities.getCookieValue(request, "codigo", "");
        String nome = CookieUtilities.getCookieValue(request, "nome", "");
        String sobrenome = CookieUtilities.getCookieValue(request, "sobrenome", "");
        String telefone = CookieUtilities.getCookieValue(request, "telefone", "");
        String email = CookieUtilities.getCookieValue(request, "email", "");
        String endereco = CookieUtilities.getCookieValue(request, "endereco", "");
        String cidade = CookieUtilities.getCookieValue(request, "cidade", "");
        String cep = CookieUtilities.getCookieValue(request, "cep", "");
        String title = new String("Registra aluno");
        out.println("<HTML>"
                + "<HEAD><TITLE>" + title + "</TITLE></HEAD>\n"
                + "<BODY BGCOLOR=\"#FDF5E6\">\n"
                + "<CENTER>\n"
                + "<H1>" + title + "</H1>\n"
                + "<FORM METHOD=\"POST\" ACTION=\"" + actionURL + "\">\n"
                + "codigo:\n"
                + " <INPUT TYPE=\"TEXT\" NAME=\"codigo\" "
                + "VALUE=\"" + codigo + "\"><BR>\n"
                + "Nome:\n"
                + " <INPUT TYPE=\"TEXT\" NAME=\"nome\" "
                + "VALUE=\"" + nome + "\"><BR>\n"
                + "Sobrenome:\n"
                + " <INPUT TYPE=\"TEXT\" NAME=\"sobrenome\" "
                + "VALUE=\"" + sobrenome + "\"><BR>\n"
                + "Telefone: \n"
                + " <INPUT TYPE=\"TEXT\" NAME=\"telefone\" "
                + "VALUE=\"" + telefone + "\"><P>\n"
                + "Email: \n"
                + " <INPUT TYPE=\"TEXT\" NAME=\"email\" "
                + "VALUE=\"" + email + "\"><P>\n"
                + "Endereço: \n"
                + " <INPUT TYPE=\"TEXT\" NAME=\"endereco\" "
                + "VALUE=\"" + endereco + "\"><P>\n"
                + "Cidade: \n"
                + " <INPUT TYPE=\"TEXT\" NAME=\"cidade\" "
                + "VALUE=\"" + cidade + "\"><P>\n"
                + "Estado\n"
                + "           <select size = \"1\" name = \"estado\">\n" 
                + "             <option value = \"SP\">Sao Paulo</option>\n" 
                + "             <option value = \"MG\">Minas Gerais</option>\n" 
                + "             <option value = \"RJ\">Rio de Janeiro</option>\n"
                + "           </select><P>\n" 
                + "ZIP: \n"
                + " <INPUT TYPE=\"TEXT\" NAME=\"cep\" "
                + "VALUE=\"" + cep + "\"><P>\n"
                + "<INPUT TYPE=\"SUBMIT\" VALUE=\"Register\">\n"
                + "</FORM></CENTER></BODY></HTML>");
    }
}