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

public class controleCriacao extends HttpServlet {


    @Override
    protected void doPost(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {
        
            String nroConta = request.getParameter("nroConta");
            String address="";
            
            BankCustomer cliente = new BankCustomer();

            
            if (cliente == null) {
                address = "/resultado/criarClienteExito.jsp";  
                BankCustomer clienteAdd = cliente;
                request.setAttribute("objBankCustomer", clienteAdd);
            }else {
                address = "/resultado/criarBankCustomerErro.jsp";    
                request.setAttribute("objBankCustomer", cliente);                
            }
            
            RequestDispatcher dispatcher = request.getRequestDispatcher(address);
            dispatcher.forward(request, response);

       
    }
    
    @Override
    protected void doGet (HttpServletRequest request, HttpServletResponse response) throws IOException{
        try (PrintWriter out = response.getWriter()) {
            //imprimir todos os clientes do hashmap
            
            out.println("Carlos");
        }
    }
}
