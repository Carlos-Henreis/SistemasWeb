import javax.servlet.*;
import javax.servlet.http.*;
import java.io.*;
import java.text.DateFormat;
import java.text.ParseException;
import java.text.SimpleDateFormat;
import java.util.*;
import java.util.logging.Level;
import java.util.logging.Logger;

public class cadastro extends HttpServlet {
    
    
    
    public static int calculaIdade(Date dataNasc) {
        Calendar dataNascimento = Calendar.getInstance();  
        dataNascimento.setTime(dataNasc); 
        Calendar hoje = Calendar.getInstance();  
        int idade = hoje.get(Calendar.YEAR) - dataNascimento.get(Calendar.YEAR); 
        if (hoje.get(Calendar.MONTH) < dataNascimento.get(Calendar.MONTH)+1) {
          idade--;  
        } 
        else { 
            if (hoje.get(Calendar.MONTH) == dataNascimento.get(Calendar.MONTH)+1 && hoje.get(Calendar.DAY_OF_MONTH) < dataNascimento.get(Calendar.DAY_OF_MONTH)) {
                idade--; 
            }
        }
        return idade;
    }
    
    String signoAcha (Date dataNasc) {
        Calendar dataNascimento = Calendar.getInstance();  
        dataNascimento.setTime(dataNasc);
        System.out.println(dataNascimento.get(Calendar.DAY_OF_MONTH));
        System.out.println(dataNascimento.get(Calendar.MONTH)+1);
        if ((dataNascimento.get(Calendar.DAY_OF_MONTH) >= 21 && dataNascimento.get(Calendar.MONTH)+1 == 3) || (dataNascimento.get(Calendar.DAY_OF_MONTH) < 20 && dataNascimento.get(Calendar.MONTH)+1 == 4)){
            return ("Aries");
        }
        if ((dataNascimento.get(Calendar.DAY_OF_MONTH) > 20 && dataNascimento.get(Calendar.MONTH)+1 == 4) || (dataNascimento.get(Calendar.DAY_OF_MONTH) <= 21 && dataNascimento.get(Calendar.MONTH)+1 == 5 )){
            return ("Touro");
        }else
        if ((dataNascimento.get(Calendar.DAY_OF_MONTH) >= 22 && dataNascimento.get(Calendar.MONTH)+1 == 5) || (dataNascimento.get(Calendar.DAY_OF_MONTH) <= 21 && dataNascimento.get(Calendar.MONTH)+1 == 6)) {
            return ("Gemios");
        }else
        if ((dataNascimento.get(Calendar.DAY_OF_MONTH) >= 21 && dataNascimento.get(Calendar.MONTH)+1 == 6) || (dataNascimento.get(Calendar.DAY_OF_MONTH) <= 27 && dataNascimento.get(Calendar.MONTH)+1 == 7)){
            return ("Cancer");
        }else
        if ((dataNascimento.get(Calendar.DAY_OF_MONTH) >= 24 && dataNascimento.get(Calendar.MONTH)+1 == 7) || (dataNascimento.get(Calendar.DAY_OF_MONTH) <= 23 && dataNascimento.get(Calendar.MONTH)+1 == 8)){
            return ("Leao");
        }else
        if ((dataNascimento.get(Calendar.DAY_OF_MONTH) >= 24 && dataNascimento.get(Calendar.MONTH)+1 == 8) || (dataNascimento.get(Calendar.DAY_OF_MONTH) <= 23 && dataNascimento.get(Calendar.MONTH)+1 == 9)){
            return ("Virgem");
        }else
        if ((dataNascimento.get(Calendar.DAY_OF_MONTH) >= 24 && dataNascimento.get(Calendar.MONTH)+1 == 9) || (dataNascimento.get(Calendar.DAY_OF_MONTH) <= 23 && dataNascimento.get(Calendar.MONTH)+1 == 10)){
            return ("Libra");
        }else
        if ((dataNascimento.get(Calendar.DAY_OF_MONTH) >= 24 && dataNascimento.get(Calendar.MONTH)+1 == 10) || (dataNascimento.get(Calendar.DAY_OF_MONTH) <= 22 && dataNascimento.get(Calendar.MONTH)+1 == 11)){
            return ("Escorpiao");
        }else
        if ((dataNascimento.get(Calendar.DAY_OF_MONTH) >= 23 && dataNascimento.get(Calendar.MONTH)+1 == 11) || (dataNascimento.get(Calendar.DAY_OF_MONTH) <= 21 && dataNascimento.get(Calendar.MONTH)+1 == 12)){
            return ("Sagitario");
        }else
        if ((dataNascimento.get(Calendar.DAY_OF_MONTH) >= 22 && dataNascimento.get(Calendar.MONTH)+1 == 12) || (dataNascimento.get(Calendar.DAY_OF_MONTH) <= 20 && dataNascimento.get(Calendar.MONTH)+1 == 1)){
            return ("Capricornio");
        }else
        if ((dataNascimento.get(Calendar.DAY_OF_MONTH) >= 21 && dataNascimento.get(Calendar.MONTH)+1 == 1) || (dataNascimento.get(Calendar.DAY_OF_MONTH) <= 19 && dataNascimento.get(Calendar.MONTH)+1 == 2)){
            return ("Aquario");
        }else
        if ((dataNascimento.get(Calendar.DAY_OF_MONTH) >= 20 && dataNascimento.get(Calendar.MONTH)+1 == 2) || (dataNascimento.get(Calendar.DAY_OF_MONTH) <= 20 && dataNascimento.get(Calendar.MONTH)+1 == 3)){
            return ("Peixe");
        }
        else {
            return ("Erro");
        }
    }
    
  protected void doPost(HttpServletRequest request,
                        HttpServletResponse response)
                        throws ServletException, IOException {

    // pega parâmetros do request
    String nome = request.getParameter("nome");
    String dataNas = request.getParameter("DataNas"); 
        SimpleDateFormat formatoData = new SimpleDateFormat("dd/MM/yyyy");
    int idade = 0;
        try {
            idade = calculaIdade (formatoData.parse(dataNas));
        } catch (ParseException ex) {
            Logger.getLogger(cadastro.class.getName()).log(Level.SEVERE, null, ex);
        }
    String signo = null;
        try {
            signo = signoAcha (formatoData.parse(dataNas));
        } catch (ParseException ex) {
            Logger.getLogger(cadastro.class.getName()).log(Level.SEVERE, null, ex);
        }
    
    String mensagem = nome+" tem "+idade+" anos e seu signo é "+signo;
    
// acerta tipo MIME para a resposta
    response.setContentType("text/html");

    PrintWriter out = response.getWriter();
    out.println("<HTML>");
    out.println("<BODY>");
    out.println("<P>" + mensagem +"</P>");
    out.println("</BODY>");
    out.println("</HTML>");
    out.close();

  }
}



