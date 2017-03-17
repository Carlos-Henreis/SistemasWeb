
import javax.servlet.*;
import javax.servlet.http.*;
import java.io.*;
import java.sql.*;

public class consulta extends HttpServlet {

    private PreparedStatement pstmtSobrenome, pstmtEmail, pstmtCidade;
    private ResultSet resultSet;
    public void init() throws ServletException {
        inicializaJdbc();
    }

    public void doPost(HttpServletRequest request, HttpServletResponse response) 
            throws ServletException, IOException {
        response.setContentType("text/html");
        PrintWriter out = response.getWriter();
        try {
            
            String escolha = request.getParameter("escolha");
            String consulta = request.getParameter("nome");
           
            consulta(escolha, consulta);
            
            int i = 1;
            while (resultSet.next()){
                out.println("<p>Resultado "+i);
                out.println("Codigo: "+ resultSet.getString("codigo"));
                out.println("Nome: "+ resultSet.getString("nome") +" "+ resultSet.getString("sobrenome")+"</p>"); 
            }

        } catch (Exception ex) {
            out.println("Error: " + ex.getMessage());
            return;
        }
    }

    private void inicializaJdbc() {
        try {
            Class.forName("com.mysql.jdbc.Driver");
            Connection c = DriverManager.getConnection("jdbc:mysql://localhost/escola", "root", "carloshenrique");
            
            pstmtSobrenome = c.prepareStatement("select codigo, nome, "
                    + "sobrenome, fone, email, endereco, cidade, estado, cep from aluno where sobrenome = ?");
            pstmtEmail = c.prepareStatement("select codigo, nome, "
                    + "sobrenome, fone, email, endereco, cidade, estado, cep from aluno where email = ?");
            pstmtCidade = c.prepareStatement("select codigo, nome,"
                    + " sobrenome, fone, email, endereco, cidade, estado, cep from aluno where cidade = ?");
            
        } catch (Exception ex) {
            System.out.println(ex);
        }
    }
    
    private void consulta(String escolha, String consulta)throws SQLException{
        if (escolha.equals("sobrenome")){
            pstmtSobrenome.setString(1, consulta);
            resultSet = pstmtSobrenome.executeQuery();
        }
        if (escolha.equals("email")){
            pstmtEmail.setString(1, consulta);
            resultSet = pstmtEmail.executeQuery();
        }
        if (escolha.equals("cidade")){
            pstmtCidade.setString(1, consulta);
            resultSet = pstmtCidade.executeQuery();
        }
    }
}
