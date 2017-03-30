
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

/**
 *
 * @author carlos
 */
public class operationServlet extends HttpServlet {

    @Override
    protected void doGet(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {
        
        
        response.setContentType("text/html;charset=UTF-8");
        try (PrintWriter out = response.getWriter()) {
            String address="";
            
            
            if (request.getParameter("acao").equals("criacao")) {
                address = "/acoesForm/criacaoForm.jsp";
                
            }else if(request.getParameter("acao").equals("saque")) {
                address = "/acoesForm/saqueForm.jsp";            
            }else if(request.getParameter("acao").equals("deposito")) {
                address = "/acoesForm/depositoForm.jsp";                
            }else if(request.getParameter("acao").equals("transferencia")) {    
                address = "/acoesForm/transferenciaForm.jsp";                
            }else if(request.getParameter("acao").equals("saldo")) {
                address = "/acoesForm/saldoForm.jsp";          
                
            }else{
               address = "/index2.jsp";            
            }
            RequestDispatcher dispatcher = request.getRequestDispatcher(address);
            dispatcher.forward(request, response);
            
        }
    }

        
}

