
import javax.servlet.*;
import javax.servlet.http.*;
import java.io.*;
import java.sql.*;

public class Consulta extends HttpServlet {

    private PreparedStatement pstmtCodigo;
    private ResultSet resultSet;
    public void init() throws ServletException {
        inicializaJdbc();
    }

    public void doPost(HttpServletRequest request, HttpServletResponse response) 
            throws ServletException, IOException {
        response.setContentType("text/html");
        PrintWriter out = response.getWriter();
        try { 
            String consulta = request.getParameter("codigo");
            consulta(consulta);
            int i = 1;
            while (resultSet.next()){
                out.println("<p>Resultado "+i);
                out.println("Codigo: "+ resultSet.getString("codigo"));
                out.println("Nome: "+ resultSet.getString("nome") +" cpf:"+ resultSet.getString("cpf")+"</p>"); 
                i++;
            }
            if (!resultSet.first()) {
                out.println("<p>Problemas funcionário não encontrado "+i);
            }

        } catch (Exception ex) {
            out.println("Error: " + ex.getMessage());
            return;
        }
    }

    private void inicializaJdbc() {
        try {
            Class.forName("com.mysql.jdbc.Driver");
            Connection c = DriverManager.getConnection("jdbc:mysql://localhost/empresa", "root", "carloshenrique");
            
            pstmtCodigo = c.prepareStatement("select * "
                    + " from funcionario where codigo = ?");
        } catch (Exception ex) {
            System.out.println(ex);
        }
    }
    
    private void consulta(String consulta)throws SQLException{
        pstmtCodigo.setInt(1, Integer.parseInt(consulta));
        resultSet = pstmtCodigo.executeQuery();
    }
}
