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

public class controleTransferencia extends HttpServlet {
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
        String address = "";
        
        //recupera cliente com determinado numero de conta
        Cliente clienteO = new Cliente();
        Cliente clienteD = new Cliente();   
        try {
            String nroContaDestino = request.getParameter("nroContadestino");
            String nroContaOrigem = request.getParameter("nroContaorigem");
            double valor = Double.parseDouble(request.getParameter("valor"));
            consultaConta(nroContaDestino);
            if (!resultSet.next()) {
                address = "/resultado/clienteInvalido.jsp";
            }
            
            clienteD.setNome(resultSet.getString("nome"));
            clienteD.setNroConta(resultSet.getInt("nro_conta"));
            clienteD.setSaldo(resultSet.getDouble("saldo"));
            consultaConta(nroContaOrigem);
            if (!resultSet.next()) {
                address = "/resultado/clienteInvalido.jsp";
            }
            clienteO.setNome(resultSet.getString("nome"));
            clienteO.setNroConta(resultSet.getInt("nro_conta"));
            clienteO.setSaldo(resultSet.getDouble("saldo"));
           
            if (clienteO.getSaldo() < valor){
                address = "/resultado/saldoInsuficiente.jsp";   
                request.setAttribute("objCliente", clienteO);
                request.setAttribute("valor", valor);
            }else {
                double valorcliente = clienteO.getSaldo();
                double saldoAtual = valorcliente - valor;
                clienteO.setSaldo(saldoAtual);
                atualizaSaldo(clienteO.getNroConta(), saldoAtual);
                valorcliente = clienteD.getSaldo();
                saldoAtual = valorcliente + valor;
                clienteD.setSaldo(saldoAtual);
                atualizaSaldo(clienteD.getNroConta(), saldoAtual);
                
                contaNum();
                resultSet.last();
                int num = (resultSet.getRow())+1;
                
                MemorizaTransf (clienteO.getNroConta(), clienteD.getNroConta(), num, valor);
                request.setAttribute("objClienteO", clienteO);
                request.setAttribute("objClienteD", clienteD);
                request.setAttribute("valor", valor);
                address = "/resultado/transferenciaRealizada.jsp"; 
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
            pstmt2 = c.prepareStatement("INSERT into transfere values (?, ?, ?, ?)"); 
            pstmt3 = c.prepareStatement("SELECT * from transfere");
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
    
    private void MemorizaTransf (int contaO, int contaD, int num, double valor) throws SQLException {
        pstmt2.setInt(1,  contaO);
        pstmt2.setInt(2,  contaD);
        pstmt2.setInt(3,  num);
        pstmt2.setDouble(4,valor);
        pstmt2.execute();
    }
       
    private void contaNum () throws SQLException {
        resultSet = pstmt3.executeQuery();
    }

}
