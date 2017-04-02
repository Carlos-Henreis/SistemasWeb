/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

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

/**
 *
 * @author Hendrix
 */
public class controleDeposito extends HttpServlet {
    
    private ResultSet resultSet;
    private PreparedStatement pstmt;
    private PreparedStatement pstmt1;
    private PreparedStatement pstmt2;
    private PreparedStatement pstmt3;
    
    public void init() throws ServletException {
        inicializaJdbc();
    }

    @Override
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
                request.setAttribute("objCliente", cliente);
            } else {
                cliente.setNome(resultSet.getString("nome"));
                cliente.setNroConta(resultSet.getInt("nro_conta"));
                cliente.setSaldo(resultSet.getDouble("saldo"));
                double saldoN = cliente.getSaldo()+valor;
                depositaConta(nroConta, saldoN);
                contaNum();
                resultSet.last();
                int num = (resultSet.getRow())+1;
                System.err.println(num);
                MemorizaDep (num, nroConta, valor);
                cliente.setSaldo(saldoN);
                request.setAttribute("objCliente", cliente);
                request.setAttribute("valor", valor);
                address = "/resultado/depositoRealizado.jsp";
            }
            RequestDispatcher dispatcher = request.getRequestDispatcher(address);
            dispatcher.forward(request, response);

        } catch (Exception ex) {
            address = "/resultado/ErroFatal.jsp";
            RequestDispatcher dispatcher = request.getRequestDispatcher(address);
            dispatcher.forward(request, response);
            out.println("Error: " + ex.getMessage());
            return;
        }
    }
    
    private void inicializaJdbc() {
        try {
            Class.forName("com.mysql.jdbc.Driver");
            Connection c = DriverManager.getConnection("jdbc:mysql://localhost/Banco", "root", "carloshenrique");
            pstmt = c.prepareStatement("select nome, saldo, nro_conta from cliente where nro_conta = ?");
            pstmt1 = c.prepareStatement("UPDATE cliente set saldo =? WHERE nro_conta =?");
            pstmt2 = c.prepareStatement("INSERT into acao values (?, ?, 'deposito', ?)");
            pstmt3 = c.prepareStatement("SELECT * from acao");
        } catch (Exception ex) {
            System.out.println(ex);
        }
    }
    
    private void consultaConta(String conta) throws SQLException {

        pstmt.setInt(1, Integer.parseInt(conta));
        resultSet = pstmt.executeQuery();
    }
    
    private void depositaConta(String conta, double deposito) throws SQLException {
        pstmt1.setDouble(1, deposito);
        pstmt1.setInt(2, Integer.parseInt(conta));
        pstmt1.executeUpdate();

        System.out.print("Cdfaksjdf lkajsf");
    }
    
    private void MemorizaDep (int num, String conta, double deposito) throws SQLException {
        pstmt2.setInt(1,  Integer.parseInt(conta));
        pstmt2.setInt(2,  num);
        pstmt2.setDouble(3,deposito);
        pstmt2.execute();
    }
    
    private void contaNum () throws SQLException {
        resultSet = pstmt3.executeQuery();
    }
}
