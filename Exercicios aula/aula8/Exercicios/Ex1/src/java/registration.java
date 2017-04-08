
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
public class registration extends HttpServlet {
    private PreparedStatement pstmt;
    public void doPost(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {
        
        response.setContentType("text/html");
        boolean isMissingValue = false;
        String codigo = request.getParameter("codigo");
        if (isMissing(codigo)) {
            codigo = "Faltou cod";
            isMissingValue = true;
        }
        String nome = request.getParameter("nome");
        if (isMissing(nome)) {
            nome = "FALTOU O NOME";
            isMissingValue = true;
        }
        String sobrenome = request.getParameter("sobrenome");
        if (isMissing(sobrenome)) {
            sobrenome = "sobrennome";
            isMissingValue = true;
        }
        
        String fone = request.getParameter("fone");
        if (isMissing(fone)) {
            fone = "faltou o fone";
            
            isMissingValue = true;
        }
        String email = request.getParameter("email");
        if (isMissing(email)) {
            email = "faltou E-MAIL";
            isMissingValue = true;
        }
        String endereco = request.getParameter("endereco");
        if (isMissing(endereco)) {
            sobrenome = "sem endereço";
            isMissingValue = true;
        }
        
        String cidade = request.getParameter("cidade");
        if (isMissing(cidade)) {
            cidade = "sem cidade";
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
        Cookie c4 = new LongLivedCookie("fone", fone);
        response.addCookie(c4);
        Cookie c5 = new LongLivedCookie("email", email);
        response.addCookie(c5);
        Cookie c6 = new LongLivedCookie("endereco", endereco);
        response.addCookie(c6);
        Cookie c7 = new LongLivedCookie("cidade", cidade);
        response.addCookie(c7);
        Cookie c8 = new LongLivedCookie("cep", cep);
        response.addCookie(c8);
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
        
        PrintWriter out = response.getWriter();
        try {
            String strCodigo = request.getParameter("codigo");
             nome = request.getParameter("nome");
             sobrenome = request.getParameter("sobrenome");
             fone = request.getParameter("fone");
             email = request.getParameter("email");
             endereco = request.getParameter("endereco");
             cidade = request.getParameter("cidade");
            String estado = request.getParameter("estado");
             cep = request.getParameter("cep");

            armazenaAluno(strCodigo, nome, sobrenome, fone, email,
                    endereco, cidade, estado, cep);
            out.println(nome + " " + sobrenome + " está agora registrado na base de dados");
        } catch (Exception ex) {
            out.println("Error: " + ex.getMessage());
            return;
        }
    }

    private boolean isMissing(String str) {
        System.err.println("entrei");
        if (str.equalsIgnoreCase("")) {
            return true;
        }
        return false;
    }
    
        private void inicializaJdbc() {
        try {
            Class.forName("com.mysql.jdbc.Driver");
            Connection c = DriverManager.getConnection("jdbc:mysql://localhost/escola", "root", "carloshenrique");
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
