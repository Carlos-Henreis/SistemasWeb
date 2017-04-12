import javax.servlet.*;
import javax.servlet.http.*;
import java.io.*;
import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.PreparedStatement;
import java.sql.SQLException;
import java.util.*;
import javax.servlet.annotation.*;

@WebServlet("/registration")
public class RegistrationServlet extends HttpServlet {
    private PreparedStatement pstmt;
    
    public void init() throws ServletException {
        inicializaJdbc();
    }
    
    public void doPost(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {
        response.setContentType("text/html");
        boolean isMissingValue = false;           
        String codigo = request.getParameter("codigo");
        if (isMissing(codigo)) {
            codigo = "faltou codigo";
            isMissingValue = true;
        }
        String nome = request.getParameter("nome");
        if (isMissing(nome)) {
            nome = "Faltou nome";
            isMissingValue = true;
        }
        String sobrenome = request.getParameter("sobrenome");
        if (isMissing(sobrenome)) {
            sobrenome = "Faltou sobrenome";
            isMissingValue = true;
        }
        String telefone = request.getParameter("telefone");
        if (isMissing(telefone)) {
            telefone = "Faltou telefone";
            isMissingValue = true;
        }
        String email = request.getParameter("email");
        if (isMissing(email)) {
            email = "Missing eMail";
            isMissingValue = true;
        }
        String endereco = request.getParameter("endereco");
        if (isMissing(endereco)) {
            endereco = "Missing endereco";
            isMissingValue = true;
        }
        String cidade = request.getParameter("cidade");
        if (isMissing(cidade)) {
            cidade = "Missing cidade";
            isMissingValue = true;
        }
        String cep = request.getParameter("cep");
        if (isMissing(cep)) {
            cep = "Missing ZIP";
            isMissingValue = true;
        }
        Cookie c1 = new LongLivedCookie("codigo", codigo);
        response.addCookie(c1);
        Cookie c2 = new LongLivedCookie("nome", nome);
        response.addCookie(c2);
        Cookie c3 = new LongLivedCookie("sobrenome", sobrenome);
        response.addCookie(c3);
        Cookie c4 = new LongLivedCookie("telefone", telefone);
        response.addCookie(c4);
        Cookie c5 = new LongLivedCookie("email", email);
        response.addCookie(c5);
        Cookie c6 = new LongLivedCookie("endereco", endereco);
        response.addCookie(c6);
        Cookie c7 = new LongLivedCookie("cidade", cidade);
        response.addCookie(c7);
        Cookie c8 = new LongLivedCookie("cep",cep);
        response.addCookie(c8);
        String formAddress = "./registration-form";
         if (isMissingValue) {
            response.sendRedirect(formAddress);
        } else {
            response.setContentType("text/html");
            PrintWriter out = response.getWriter();
            try {
                String estado = request.getParameter("estado");
                armazenaAluno(codigo, nome, sobrenome, telefone, email,
                        endereco, cidade, estado, cep);
                out.println(nome + " " + sobrenome + " está agora registrado na base de dados");
            } catch (Exception ex) {
                out.println("Error: " + ex.getMessage());
                return;
            }
            String title = new String("Thank you for registering");
            response.setContentType("text/html");
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
    
    private void inicializaJdbc() {
        try {
            Class.forName("com.mysql.jdbc.Driver");
            Connection c = DriverManager.getConnection("jdbc:mysql://localhost/privado", "root", "carloshenrique");
            //Class.forName("org.postgresql.Driver"); 
            //Connection c = DriverManager.getConnection
            //           ("jdbc:postgresql://localhost/escola", "root", "passwd");
            pstmt = c.prepareStatement("insert into aluno "
                    + "(codigo, nome, sobrenome, fone, email, endereco, cidade, "
                    + "estado, cep) values (?, ?, ?, ?, ?, ?, ?, ?, ?)");
        } catch (Exception ex) {
            System.out.println(ex);
        }
    }

    private void armazenaAluno(String strCodigo, String nome, String sobrenome, String fone, String email, String endereco, String cidade, String estado, String cep) throws SQLException {
        pstmt.setInt(1, Integer.parseInt(strCodigo));
        pstmt.setString(2, nome);
        pstmt.setString(3, sobrenome);
        pstmt.setString(4, fone);
        pstmt.setString(5, email);
        pstmt.setString(6, endereco);
        pstmt.setString(7, cidade);
        pstmt.setString(8, estado);
        pstmt.setString(9, cep);
        pstmt.executeUpdate();
    }
}

