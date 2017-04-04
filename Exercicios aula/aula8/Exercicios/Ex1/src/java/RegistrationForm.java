
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
        String codigo = CookieUtilities.getCookieValue(request,"codigo", "");
        String nome = CookieUtilities.getCookieValue(request,"nome", "");
        String sobrenome = CookieUtilities.getCookieValue(request,"sobrenome", "");
        String fone = CookieUtilities.getCookieValue(request,"fone", "");
        String email = CookieUtilities.getCookieValue(request,"email", "");
        String endereco = CookieUtilities.getCookieValue(request,"endereco", "");
        String cidade = CookieUtilities.getCookieValue(request,"cidade", "");
        String cep = CookieUtilities.getCookieValue(request, "cep", "");

        String title = new String("Please register");
        out.println("<HTML>"
                + "<HEAD><TITLE>" + title + "</TITLE></HEAD>\n"
                + "<BODY BGCOLOR=\"#FDF5E6\">\n"
                + "<CENTER>\n"
                + "<H1>" + title + "</H1>\n"
                +   "<form method = \"post\" action = \""+ actionURL+"\">\n" +
                    "        <p>Codigo\n" +
                    "           <input type = \"text\" VALUE=\"" + codigo + "\"name = \"codigo\" size = \"4\">&nbsp;\n" +
                    "           Nome\n" +
                    "           <input type = \"text\"  VALUE=\"" + nome + "\"name = \"nome\" size = \"15\">&nbsp;\n" +
                    "           Sobrenome\n" +
                    "           <input type = \"text\" VALUE=\"" + sobrenome + " \"name = \"sobrenome\" size = \"20\">\n" +
                    "        </p>\n" +
                    "        <p>Telefone\n" +
                    "           <input type = \"text\"  VALUE=\"" + fone + "\"name = \"fone\" size = \"15\">&nbsp;\n" +
                    "           Email\n" +
                    "           <input type = \"text\"  VALUE=\"" + email + "\"name = \"email\" size = \"20\">&nbsp;\n" +
                    "        </p>\n" +
                    "        <p>Endereço <input type = \"text\" VALUE=\"" + endereco + " \"name = \"endereco\" size = \"30\">\n" +
                    "        </p>\n" +
                    "        <p>Cidade <input type = \"text\"  VALUE=\"" + cidade + "\"name = \"cidade\" size = \"15\">&nbsp;\n" +
                    "           State\n" +
                    "           <select size = \"1\" name = \"estado\">\n" +
                    "             <option value = \"SP\">Sao Paulo</option>\n" +
                    "             <option value = \"MG\">Minas Gerais</option>\n" +
                    "             <option value = \"RJ\">Rio de Janeiro</option>\n" +
                    "           </select>&nbsp;\n" +
                    "           Zip <input type = \"text\"  VALUE=\"" + cep + "\"name = \"cep\" size = \"9\">\n" +
                    "        </p>\n" +
                    "        <p><input type = \"submit\" name = \"Submit\" value = \"Submit\">\n" +
                    "           <input type = \"reset\" value = \"Reset\">\n" +
                    "        </p>\n" +
                    "      </form>");
               
    }
}
