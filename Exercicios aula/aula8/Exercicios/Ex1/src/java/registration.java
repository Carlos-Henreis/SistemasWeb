
import javax.servlet.*;
import javax.servlet.http.*;
import java.io.*;
import java.util.*;
import javax.servlet.annotation.*;

@WebServlet("/registration")
public class registration extends HttpServlet {

    public void doPost(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {
        response.setContentType("text/html");
        boolean isMissingValue = false;
        String codigo = request.getParameter("codigo");
        if (isMissing(codigo)) {
            codigo = "eNTRE COM O CÓDIGO";
            isMissingValue = true;
        }
        String nome = request.getParameter("nome");
        if (isMissing(nome)) {
            nome = "FALTOU O NOME";
            isMissingValue = true;
        }
        String sobrenome = request.getParameter("sobrenome");
        if (isMissing(sobrenome)) {
            sobrenome = "ENTRE COM O sobrennome";
            isMissingValue = true;
        }
        String fone = request.getParameter("fone");
        if (isMissing(fone)) {
            fone = "faltou o fone";
            isMissingValue = true;
        }
        String email = request.getParameter("email");
        if (isMissing(email)) {
            email = "ENTRE COM O E-MAIL";
            isMissingValue = true;
        }
        String endereco = request.getParameter("endereco");
        if (isMissing(endereco)) {
            sobrenome = "Faltou o endereço";
            isMissingValue = true;
        }
        
        String cidade = request.getParameter("cidade");
        if (isMissing(cidade)) {
            sobrenome = "Faltou a cidade";
            isMissingValue = true;
        }
        String cep = request.getParameter("cep");
        if (isMissing(cep)) {
            cep = "Faltou o cep";
            isMissingValue = true;
        }
        
        Cookie c1 = new LongLivedCookie("codigo", codigo);
        response.addCookie(c1);
        Cookie c2 = new LongLivedCookie("nome", nome);
        response.addCookie(c2);
        Cookie c3 = new LongLivedCookie("sobrenome", sobrenome);
        response.addCookie(c3);
        Cookie c5 = new LongLivedCookie("fone", fone);
        response.addCookie(c5);
        Cookie c6 = new LongLivedCookie("email", email);
        response.addCookie(c6);
        Cookie c7 = new LongLivedCookie("endereco", endereco);
        response.addCookie(c7);
        Cookie c8 = new LongLivedCookie("cidade", cidade);
        response.addCookie(c8);
        Cookie c9 = new LongLivedCookie("cep", cep);
        response.addCookie(c9);
        String formAddress = "./registration-form";
        if (isMissingValue) {
            response.sendRedirect(formAddress);
        } else {
            String title = new String("Thank you for registering");
            response.setContentType("text/html");
            PrintWriter out = response.getWriter();
            out.println("<HTML>"
                    + "<HEAD><TITLE>" + title
                    + "</TITLE></HEAD>\n"
                    + "<BODY BGCOLOR=\"#FDF5E6\">\n"
                    + "<CENTER>\n"
                    + "<H1>" + title + "</H1>\n"
                    + "<H3>\n"
                    + "<P>First name: " + nome + "\n"
                    + "<P>Last name: " + sobrenome + "\n"
                    + "<P>Email address: " + email + "\n"
                    + "</CENTER></BODY></HTML>");
        }
    }

    private boolean isMissing(String str) {
        if (str.equalsIgnoreCase("")) {
            return true;
        }
        return false;
    }
}
