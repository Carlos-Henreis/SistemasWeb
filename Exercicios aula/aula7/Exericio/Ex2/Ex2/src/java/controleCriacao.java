
import java.io.*;
import java.sql.*;
import javax.servlet.*;
import javax.servlet.http.*;


public class controleCriacao extends HttpServlet {

    private ResultSet resultSet;
    private PreparedStatement pstmt;
    
    public void init() throws ServletException {
        inicializaJdbc();
    }
    protected void doPost(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {

        String address="";
        Cliente cliente = new Cliente();
        String nroConta, nome, saldo;
        try {
            nroConta = request.getParameter("nroConta");
            nome = request.getParameter("nome");
            saldo = request.getParameter("saldo");
            int teste = Integer.parseInt(nroConta);//teste
        } catch (Exception e) {
            address = "/resultado/ErroFatal.jsp";
            RequestDispatcher dispatcher = request.getRequestDispatcher(address);
            dispatcher.forward(request, response);
            return;
        }
        try {    
            cliente.setNroConta(Integer.parseInt(nroConta));
            cliente.setNome(nome);
            cliente.setSaldo(Double.parseDouble(saldo));
            request.setAttribute("objCliente", cliente);
            InsereConta(nroConta, nome, saldo);
            address = "/resultado/criarClienteExito.jsp";                     
        

        }  catch (SQLException ex) {
            address = "/resultado/criarClienteErro.jsp";
            System.err.println("Erro no SQL");;
        }
        catch (Exception e){
            address = "/resultado/ErroFatal.jsp";
        }
        RequestDispatcher dispatcher = request.getRequestDispatcher(address);
        dispatcher.forward(request, response);

    
    }
    
    
    private void inicializaJdbc() {
        try {
            Class.forName("com.mysql.jdbc.Driver");
            Connection c = DriverManager.getConnection("jdbc:mysql://localhost/Banco", "root", "carloshenrique");
            pstmt = c.prepareStatement("insert into cliente values (?, ?, ?)");
        } catch (Exception ex) {
            System.out.println(ex);
        }
    }

    private boolean InsereConta(String conta, String nome, String saldo) throws SQLException {
        pstmt.setInt(1, Integer.parseInt(conta));
        pstmt.setString(2, nome);
        pstmt.setDouble(3, Double.parseDouble(saldo));
        return pstmt.execute();

    }
}
