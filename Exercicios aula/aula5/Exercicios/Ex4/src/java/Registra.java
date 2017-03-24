
import javax.servlet.*;
import javax.servlet.http.*;
import java.io.*;
import java.sql.*;

public class Registra extends HttpServlet {
    // Usa um prepared Statement para registrar alunos no banco

    private PreparedStatement pstmt;

    /**
     * Utiliza o método init do Servlet para iniciar conexão com o banco
     */
    public void init() throws ServletException {
        inicializaJdbc();
    }
    
    public void doGet(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
        response.setContentType("text/html");
        PrintWriter out = response.getWriter();
        // Obtem os dados do formulário
        String strCodigo = request.getParameter("codigo");
        String sobrenome = request.getParameter("sobrenome");
        String nome = request.getParameter("nome");
        String fone = request.getParameter("fone");
        String email = request.getParameter("email");
        String endereco = request.getParameter("endereco");
        String cidade = request.getParameter("cidade");
        String estado = request.getParameter("estado");
        String cep = request.getParameter("cep");
        // Solicita confirmação
        out.println("Você digitou os seguintes dados: ");
        out.println("<p>Código: " + strCodigo);
        out.println("<br>Nome: " + nome);
        out.println("<br>Sobrenome: " + sobrenome);
        out.println("<br>Telefone: " + fone);
        out.println("<br>Email: " + email);
        out.println("<br>Endereço: " + endereco);
        out.println("<br>Cidade: " + cidade);
        out.println("<br>Estado: " + estado);
        out.println("<br>CEP: " + cep);
        // ajusta o POST
        out.println("<p><form method=\"post\" action="
                + "/Ex4/Registra>");
        // ajusta valores escondidos
        out.println("<p><input type=\"hidden\" " + "value=" + strCodigo + " name=\"codigo\">");
        out.println("<p><input type=\"hidden\" " + "value=" + nome + " name=\"nome\">");
        out.println("<p><input type=\"hidden\" " + "value=" + sobrenome +" name =\"sobrenome\">");
        out.println("<p><input type=\"hidden\" " + "value=" + fone + " name=\"fone\">");
        out.println("<p><input type=\"hidden\" " + "value=" + email + " name=\"email\">");
        out.println("<p><input type=\"hidden\" " + "value=" + endereco + " name=\"endereco\">");
        out.println("<p><input type=\"hidden\" " + "value=" + cidade + " name=\"cidade\">");
        out.println("<p><input type=\"hidden\" " + "value=" + estado + " name=\"estado\">");
        out.println("<p><input type=\"hidden\" " + "value=" + cep + " name=\"cep\">");
        out.println("<p><input type=\"submit\" value=\"Confirma\" >");
        out.println("</form>");
        out.close();
    }

    public void doPost(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
        response.setContentType("text/html");
        PrintWriter out = response.getWriter();
        try {
            String strCodigo = request.getParameter("codigo");
            String nome = request.getParameter("nome");
            String sobrenome = request.getParameter("sobrenome");
            String fone = request.getParameter("fone");
            String email = request.getParameter("email");
            String endereco = request.getParameter("endereco");
            String cidade = request.getParameter("cidade");
            String estado = request.getParameter("estado");
            String cep = request.getParameter("cep");

            armazenaAluno(strCodigo, nome, sobrenome, fone, email,
                    endereco, cidade, estado, cep);
            out.println(nome + " " + sobrenome + " está agora registrado na base de dados");
        } catch (Exception ex) {
            out.println("Error: " + ex.getMessage());
            return;
        }
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
