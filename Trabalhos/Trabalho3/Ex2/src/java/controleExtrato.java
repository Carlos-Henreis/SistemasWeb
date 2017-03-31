/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

import java.io.*;
import static java.lang.System.out;
import java.sql.*;
import javax.servlet.*;
import javax.servlet.http.*;;

public class controleExtrato extends HttpServlet {
    
    private ResultSet resultSet;
    private PreparedStatement pstmt;
    private PreparedStatement pstmt1;
    private PreparedStatement pstmt2;
    private PreparedStatement pstmt3;
    private String retorno="vazio";
    
    public void init() throws ServletException {
        inicializaJdbc();
    }


    protected void doPost(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {
        Cliente cliente = new Cliente();
        String address = "";
        try {
            String nroConta = request.getParameter("nroConta");
            consultaConta(nroConta);
            if (!resultSet.next()) {
                address = "/resultado/clienteInvalido.jsp";
            } else {
                cliente.setNome(resultSet.getString("nome"));
                cliente.setNroConta(resultSet.getInt("nro_conta"));
                cliente.setSaldo(resultSet.getDouble("saldo"));
                TrataRetrno (nroConta);
                if (retorno.equals("vazio"))
                    retorno = "<h3>Não existem transações nesta conta";
                request.setAttribute("objCliente", cliente);
                request.setAttribute("retorno", retorno);
                address = "/resultado/exibirExtrato.jsp"; 
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
         RequestDispatcher dispatcher = request.getRequestDispatcher(address);
         dispatcher.forward(request, response);
    }
    
    private void inicializaJdbc() {
        try {
            Class.forName("com.mysql.jdbc.Driver");
            Connection c = DriverManager.getConnection("jdbc:mysql://localhost/Banco", "root", "carloshenrique");
            pstmt = c.prepareStatement("select nome, saldo, nro_conta from cliente where nro_conta = ?");
            pstmt1 = c.prepareStatement("select acao, valor from atividade where nro_conta = ?");
            pstmt2 = c.prepareStatement("select nro_contaD, valor from transferencia where nro_contaO = ?");
            pstmt3 = c.prepareStatement("select nro_contaO, valor from transferencia where nro_contaD = ?");
        } catch (Exception ex) {
            System.out.println(ex);
        }
       
    }
    
    private void consultaConta(String conta) throws SQLException {
        pstmt.setInt(1, Integer.parseInt(conta));
        resultSet = pstmt.executeQuery();
    }
    
    private void consultaAtividade(String conta) throws SQLException {
        pstmt1.setInt(1, Integer.parseInt(conta));
        resultSet = pstmt1.executeQuery();
    }
    
    private void consultaRecebidos(String conta) throws SQLException {
        pstmt3.setInt(1, Integer.parseInt(conta));
        resultSet = pstmt3.executeQuery();
    }
    
    private void consultaEnviados(String conta) throws SQLException {
        pstmt2.setInt(1, Integer.parseInt(conta));
        resultSet = pstmt2.executeQuery();
    }
    
    void TrataRetrno (String conta) throws SQLException {
        consultaAtividade(conta);
        retorno =   "<style type=\"text/css\">\n" +
                    ".tg  {border-collapse:collapse;border-spacing:0;border-color:#aaa;margin:0px auto;}\n" +
                    ".tg td{font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#aaa;color:#333;background-color:#fff;}\n" +
                    ".tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#aaa;color:#fff;background-color:#f38630;}\n" +
                    ".tg .tg-iyx4{background-color:#FCFBE3;color:#440000;text-align:right}\n" +
                    ".tg .tg-uxf6{background-color:#FCFBE3;font-weight:bold;color:#440000}\n" +
                    ".tg .tg-j2zy{background-color:#FCFBE3;vertical-align:top}\n" +
                    ".tg .tg-d73p{background-color:#FCFBE3;font-weight:bold;color:#440000;vertical-align:top}\n" +
                    ".tg .tg-vonm{font-weight:bold;font-size:24px;color:#440000;text-align:center}\n" +
                    ".tg .tg-r440{color:#440000}\n" +
                    ".tg .tg-yx8r{color:#440000;text-align:right}\n" +
                    ".tg .tg-08sj{background-color:#FCFBE3;color:#440000}\n" +
                    ".tg .tg-ablh{background-color:#f38630;font-weight:bold;font-size:24px;color:#440000;text-align:center;vertical-align:top}\n" +
                    ".tg .tg-jxku{font-weight:bold;font-size:18px;background-color:#ffcc67;color:#440000;text-align:center;vertical-align:top}\n" +
                    ".tg .tg-yw4l{vertical-align:top}\n" +
                    ".tg .tg-yz34{font-weight:bold;font-size:18px;background-color:#f8d698;color:#440000;text-align:center;vertical-align:top}\n" +
                    "</style>\n" +
                    "<table class=\"tg\">\n" +
                    "  <tr>\n" +
                    "    <th class=\"tg-vonm\" colspan=\"3\">Atividades Internas</th>\n" +
                    "  </tr>\n" +
                    "  <tr>\n" +
                    "    <td class=\"tg-uxf6\">No</td>\n" +
                    "    <td class=\"tg-uxf6\">Ação</td>\n" +
                    "    <td class=\"tg-uxf6\">Valor</td>\n" +
                    "  </tr>";
                    
        int i = 1;
        
        while (resultSet.next()){
            if (i%2 != 0){
                retorno +=  "  <tr>\n" +
                            "    <td class=\"tg-r440\">"+i+"</td>\n" +
                            "    <td class=\"tg-r440\">"+resultSet.getString("acao")+"</td>\n" +
                            "    <td class=\"tg-yx8r\">"+resultSet.getString("valor")+"</td>\n" +
                            "  </tr>";
            }
            else {
                retorno +=  "  <tr>\n" +
                            "    <td class=\"tg-08sj\">"+i+"</td>\n" +
                            "    <td class=\"tg-08sj\">"+resultSet.getString("acao")+"</td>\n" +
                            "    <td class=\"tg-iyx4\">"+resultSet.getString("valor")+"</td>\n" +
                            "  </tr>";
            }
            i++;
        }
        if (i ==1)
            retorno += "  <tr>\n" +
                    "    <td class=\"tg-r440\">--</td>\n" +
                    "    <td class=\"tg-r440\">--</td>\n" +
                    "    <td class=\"tg-yx8r\">--</td>\n" +
                    "  </tr>";
        consultaRecebidos(conta);    
        retorno +=  "<tr>\n" +
                    "    <td class=\"tg-ablh\" colspan=\"3\">Atividades Externas</td>\n" +
                    "  </tr>\n" +
                    "  <tr>\n" +
                    "    <td class=\"tg-jxku\" colspan=\"3\">Valores recebidos</td>\n" +
                    "  </tr>\n" +
                    "  <tr>\n" +
                    "    <td class=\"tg-d73p\">No</td>\n" +
                    "    <td class=\"tg-d73p\">Recebido de:</td>\n" +
                    "    <td class=\"tg-d73p\">Valor</td>\n" +
                    "  </tr>";
        i = 1;
        
        while (resultSet.next()){
            if (i%2 != 0){
                retorno +=  "  <tr>\n" +
                            "    <td class=\"tg-yw4l\">"+i+"</td>\n" +
                            "    <td class=\"tg-yw4l\">"+resultSet.getString("nro_contaO")+"</td>\n" +
                            "    <td class=\"tg-yw4l\">"+resultSet.getString("valor")+"</td>\n" +
                            "  </tr>";
            }
            else {
                retorno +=  "  <tr>\n" +
                            "    <td class=\"tg-j2zy\">"+i+"</td>\n" +
                            "    <td class=\"tg-j2zy\">"+resultSet.getString("nro_contaO")+"</td>\n" +
                            "    <td class=\"tg-j2zy\">"+resultSet.getString("valor")+"</td>\n" +
                            "  </tr>";
            }
            i++;
        }
        if (i == 1)
            retorno += "  <tr>\n" +
                    "    <td class=\"tg-yw4l\">--</td>\n" +
                    "    <td class=\"tg-yw4l\">--</td>\n" +
                    "    <td class=\"tg-yw4l\">--</td>\n" +
                    "  </tr>";;
        
        consultaEnviados(conta);
        retorno +=  "<tr>\n" +
                    "    <td class=\"tg-yz34\" colspan=\"3\">Valores enviados</td>\n" +
                    "  </tr>\n" +
                    "  <tr>\n" +
                    "    <td class=\"tg-d73p\">No</td>\n" +
                    "    <td class=\"tg-d73p\">Enviado para:</td>\n" +
                    "    <td class=\"tg-d73p\">Valor</td>\n" +
                    "  </tr>";
        i = 1;
        
        while (resultSet.next()){
            if (i%2 != 0){
               retorno +=  "  <tr>\n" +
                           "    <td class=\"tg-yw4l\">"+i+"</td>\n" +
                           "    <td class=\"tg-yw4l\">"+resultSet.getString("nro_contaD")+"</td>\n" +
                           "    <td class=\"tg-yw4l\">"+resultSet.getString("valor")+"</td>\n" +
                           "  </tr>";

            }
            else {
                retorno +=  "    <td class=\"tg-j2zy\">"+i+"</td>\n" +
                            "    <td class=\"tg-j2zy\">"+resultSet.getString("nro_contaD")+"</td>\n" +
                            "    <td class=\"tg-j2zy\">"+resultSet.getString("valor")+"</td>";
            }
            i++;
        }
        if (i ==1)
            retorno +=  "  <tr>\n" +
                        "    <td class=\"tg-yw4l\">--</td>\n" +
                        "    <td class=\"tg-yw4l\">--</td>\n" +
                        "    <td class=\"tg-yw4l\">--</td>\n" +
                        "  </tr>";
        retorno+="</table></div>";
    }


}