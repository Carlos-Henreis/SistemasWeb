
import Aluno.Aluno;
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
        Aluno aluno = (Aluno) request.getSession().getAttribute("aluno");
        try {
            String strCodigo = aluno.getCodigo();
            String nome = aluno.getNome();
            String sobrenome = aluno.getSobrenome();
            String fone = aluno.getFone();
            String email = aluno.getEmail();
            String endereco = aluno.getEndereco();
            String cidade = aluno.getCidade();
            String estado = aluno.getEstado();
            String cep = aluno.getCep();

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
