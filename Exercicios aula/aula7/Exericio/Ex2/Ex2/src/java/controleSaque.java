
import java.io.IOException;
import java.io.PrintWriter;
import static java.lang.System.out;
import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import javax.servlet.RequestDispatcher;
import javax.servlet.ServletException;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;

public class controleSaque extends HttpServlet {
    private ResultSet resultSet;
    private PreparedStatement pstmt;
    private PreparedStatement pstmt1;
    private PreparedStatement pstmt2;
    
    public void init() throws ServletException {
        inicializaJdbc();
    }

    protected void doPost(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {
        
        Cliente cliente = new Cliente();
        String address = "";
        
        //Recupera dados do POST
           
        try {
            String nroConta = request.getParameter("nroConta");
            double valor = Double.parseDouble(request.getParameter("valor"));
            consultaConta(nroConta);
            if (!resultSet.next()) {
                address = "/resultado/clienteInvalido.jsp";  
            } else {
                cliente.setNome(resultSet.getString("nome"));
                cliente.setNroConta(resultSet.getInt("nro_conta"));
                cliente.setSaldo(resultSet.getDouble("saldo"));
                if (cliente.getSaldo() < valor){
                    address = "/resultado/saldoInsuficiente.jsp";
                    request.setAttribute("objCliente", cliente);
                    request.setAttribute("valor", valor);
                } else{
                    double valorcliente = cliente.getSaldo();
                    double saldoAtual = valorcliente - valor;
                    atualizaSaldo(cliente.getNroConta(), saldoAtual);
                    MemorizaSaque(nroConta, (-1*valor));
                    cliente.setSaldo(saldoAtual);
                    request.setAttribute("objCliente", cliente);
                    request.setAttribute("valor", valor);
                    address = "/resultado/saqueRealizado.jsp"; 
                }
            }          

        } catch (Exception ex) {
            address = "/resultado/ErroFatal.jsp";
            RequestDispatcher dispatcher = request.getRequestDispatcher(address);
            dispatcher.forward(request, response);
            out.println("Error: " + ex.getMessage());
            return;   
        }
        RequestDispatcher dispatcher = request.getRequestDispatcher(address);
        dispatcher.forward(request, response);
    }

    private void inicializaJdbc() {
        try {
            Class.forName("com.mysql.jdbc.Driver");
            Connection c = DriverManager.getConnection("jdbc:mysql://localhost/Banco", "root", "carloshenrique");
            pstmt = c.prepareStatement("select nome, saldo, nro_conta from cliente where nro_conta = ?");
            pstmt1 = c.prepareStatement("UPDATE cliente set saldo =? WHERE nro_conta =?");
            pstmt2 = c.prepareStatement("INSERT into atividade values (?, 'saque', ?)"); 
        } catch (Exception ex) {
            System.out.println(ex);
        }
    }
    
    private void consultaConta(String conta) throws SQLException {

        pstmt.setInt(1, Integer.parseInt(conta));
        resultSet = pstmt.executeQuery();
    }

    private void atualizaSaldo(int conta, double deposito) throws SQLException {
        pstmt1.setDouble(1, deposito);
        pstmt1.setInt(2, conta);
        pstmt1.executeUpdate();
    }
    
    private void MemorizaSaque (String conta, double saque) throws SQLException {
        pstmt2.setInt(1,  Integer.parseInt(conta));
        pstmt2.setDouble(2,saque);
        pstmt2.execute();
    }

}
