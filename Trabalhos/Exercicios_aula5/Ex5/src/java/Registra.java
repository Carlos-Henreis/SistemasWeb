
import javax.servlet.*;
import javax.servlet.http.*;
import java.io.*;
import java.sql.*;
import java.text.DateFormat;
import java.text.ParseException;
import java.text.SimpleDateFormat;

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
        String nome = request.getParameter("nome");
        String cpf = request.getParameter("cpf");
        String dataNas = request.getParameter("dataNas");
        String cargo = request.getParameter("cargo");
        String salario = request.getParameter("salario");

        // Solicita confirmação
        out.println("Você digitou os seguintes dados: ");
        out.println("<p>Código: " + strCodigo);
        out.println("<br>Nome: " + nome);
        out.println("<br>cpf: " + cpf);
        out.println("<br>datanas: " + dataNas);
        out.println("<br>cargo: " + cargo);
        out.println("<br>salario: " + salario);
        
        // ajusta o POST
        out.println("<p><form method=\"post\" action="
                + "/Ex5/Registra>");
        // ajusta valores escondidos
        out.println("<p><input type=\"hidden\" " + "value=" + strCodigo + " name=\"codigo\">");
        out.println("<p><input type=\"hidden\" " + "value=" + nome + " name=\"nome\">");
        out.println("<p><input type=\"hidden\" " + "value=" + cpf +" name =\"cpf\">");
        out.println("<p><input type=\"hidden\" " + "value=" + dataNas + " name=\"datanas\">");
        out.println("<p><input type=\"hidden\" " + "value=" + cargo + " name=\"cargo\">");
        out.println("<p><input type=\"hidden\" " + "value=" + salario + " name=\"salario\">");
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
            String cpf = request.getParameter("cpf");
            String datanas = request.getParameter("datanas");
            String cargo = request.getParameter("cargo");
            String salario = request.getParameter("salario");

            armazenaAluno(strCodigo, nome, cpf, datanas, cargo, salario);
            out.println(nome +" está agora registrado na base de dados");
        } catch (Exception ex) {
            out.println("Error: " + ex.getMessage());
            return;
        }
    }

    private void inicializaJdbc() {
        try {
            Class.forName("com.mysql.jdbc.Driver");
            Connection c = DriverManager.getConnection("jdbc:mysql://localhost/empresa", "root", "carloshenrique");
            //Class.forName("org.postgresql.Driver"); 
            //Connection c = DriverManager.getConnection
            //           ("jdbc:postgresql://localhost/escola", "root", "passwd");
            pstmt = c.prepareStatement("insert into funcionario "
                    + "(codigo, nome, cpf, dataNas, cargo, salario)"
                    + "values (?, ?, ?, ?, ?, ?)");
        } catch (Exception ex) {
            System.out.println(ex);
        }
    }

    private void armazenaAluno(String strCodigo, String nome, String cpf, String datanas, String cargo, String salario) throws SQLException, ParseException {
        DateFormat fmt = new SimpleDateFormat("dd/MM/yyyy");
        
        pstmt.setInt(1, Integer.parseInt(strCodigo));
        pstmt.setString(2, nome);
        pstmt.setString(3, cpf);
        pstmt.setDate(4, new java.sql.Date(fmt.parse(datanas).getTime()));
        pstmt.setString(5, cargo);
        pstmt.setDouble(6, Double.parseDouble(salario));
        
        pstmt.executeUpdate();
    }
}
