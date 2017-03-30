package Control;



/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

import java.io.IOException;
import java.io.PrintWriter;
import javax.servlet.RequestDispatcher;
import javax.servlet.ServletException;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;
import Beans.BankCustomer;

/**
 *
 * @author Hendrix
 */
public class controleTransferencia extends HttpServlet {

    @Override
    protected void doGet(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {
        
    }

    
    @Override
    protected void doPost(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {
        
        
        String address = "";
        
        //Recupera dados do POST
        String nroContaDestino = request.getParameter("nroContadestino");
        String nroContaOrigem = request.getParameter("nroContaorigem");
        Float valor = Float.parseFloat(request.getParameter("valor"));
        
        //recupera cliente com determinado numero de conta
        BankCustomer clienteO = new BankCustomer();
        BankCustomer clienteD = new BankCustomer();
        
        //se for nula dispatcha pra tela de errro
        if (clienteO == null || clienteD==null){
             address = "/resultado/clienteInvalido.jsp";   
        
        }else if (clienteO.getSaldo() < valor){
             address = "/resultado/saldoInsuficiente.jsp";   
              request.setAttribute("objCliente", clienteO);
              request.setAttribute("valor", valor);
        }else{
            /*if ( (TabelaClientes.saque(nroContaOrigem, valor)) &&  (TabelaClientes.deposito(nroContaDestino, valor)) ){
                System.out.println("Transferencia realizada com Sucesso");
            }*/
            request.setAttribute("objClienteO", clienteO);
            request.setAttribute("objClienteD", clienteD);
            request.setAttribute("valor", valor);
            address = "/resultado/transferenciaRealizada.jsp";   
        }
        
        
        
        RequestDispatcher dispatcher = request.getRequestDispatcher(address);
        dispatcher.forward(request, response);
    
    }

    

}
