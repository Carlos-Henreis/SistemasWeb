package Control;



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
public class controleDeposito extends HttpServlet {

    @Override
    protected void doGet(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {
        
    }

    
    @Override
    protected void doPost(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {
        
        
        String address = "";
        
        //Recupera dados do POST
        String nroConta = request.getParameter("nroConta");
        float valor = Float.parseFloat(request.getParameter("valor"));
        
        //recupera cliente com determinado numero de conta
        BankCustomer cliente = new BankCustomer();
        
        //se for nula dispatcha pra tela de errro
        if (cliente == null){
             address = "/resultado/clienteInvalido.jsp";
             
        }else{
           /* if (){
                System.out.println("Deposito efetuado efetuado");
            }*/
            request.setAttribute("objCliente", cliente);
            request.setAttribute("valor", valor);
            address = "/resultado/depositoRealizado.jsp";   
        }
        
        
        
        RequestDispatcher dispatcher = request.getRequestDispatcher(address);
        dispatcher.forward(request, response);
    
    }

    

}
