
import beans.FormBean;
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
        FormBean usuario = (FormBean) request.getSession().getAttribute("formulario");
        try {
            String email = usuario.getEmail();
            String nome = usuario.getNome();
            String sobrenome = usuario.getSobrenome();
            String[] linguagens = usuario.getLinguagens();
            String notificacao = usuario.getNotificacao();
            String listalinguagem = "";
            for (int i = 0; i < linguagens.length; i++) {
                listalinguagem += linguagens[i]+ " ";
            }

            armazenaUsuario(email, nome, sobrenome, listalinguagem, notificacao);
            out.println(nome + " " + sobrenome + " está agora registrado na base de dados");
        } catch (Exception ex) {
            out.println("Error: " + ex.getMessage());
            return;
        }
    }

    private void inicializaJdbc() {
        try {
            Class.forName("com.mysql.jdbc.Driver");
            Connection c = DriverManager.getConnection("jdbc:mysql://localhost/privado", "root", "carloshenrique");
            //Class.forName("org.postgresql.Driver"); 
            //Connection c = DriverManager.getConnection
            //           ("jdbc:postgresql://localhost/escola", "root", "passwd");
            pstmt = c.prepareStatement("insert into usuario "
                    + "(email, nome, sobrenome, linguagens, notificacao"
                    + ") values (?, ?, ?, ?, ?)");
        } catch (Exception ex) {
            System.out.println(ex);
        }
    }

    private void armazenaUsuario(String email, String nome, String sobrenome, String linguagens, String notificacao) throws SQLException {
        pstmt.setString(1, email);
        pstmt.setString(2, nome);
        pstmt.setString(3, sobrenome);
        pstmt.setString(4, linguagens);
        pstmt.setString(5, notificacao);

        pstmt.executeUpdate();
    }
}
