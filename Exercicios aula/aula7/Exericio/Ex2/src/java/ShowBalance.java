
import Beans.BankCustomer;
import java.io.*;
import static java.lang.System.out;
import java.sql.*;
import javax.servlet.*;
import javax.servlet.http.*;

public class ShowBalance extends HttpServlet {

    private ResultSet resultSet;
    private PreparedStatement pstmt;

    public void init() throws ServletException {
        inicializaJdbc();
    }

    public void doGet(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {
        BankCustomer customer = new BankCustomer();

        try {
            String conta = request.getParameter("id");
            consultaConta(conta);
            String address;
            if (!resultSet.next()) {
                address = "/WEB-INF/bank-account/UnknownCustomer.jsp";
            } else {
                customer.setNome(resultSet.getString("nome"));
                customer.setSaldo(resultSet.getDouble("nro_conta"));
                customer.setSaldo(resultSet.getDouble("saldo"));
                if (customer.getSaldo() < 0) {
                    address = "/WEB-INF/bank-account/NegativeBalance.jsp";
                    request.setAttribute("badCustomer", customer);
                } else if (customer.getSaldo() < 10000) {
                    address = "/WEB-INF/bank-account/NormalBalance.jsp";
                    request.setAttribute("regularCustomer", customer);
                } else {
                    address = "/WEB-INF/bank-account/HighBalance.jsp";
                    request.setAttribute("eliteCustomer", customer);
                }

            }
            RequestDispatcher dispatcher = request.getRequestDispatcher(address);
            dispatcher.forward(request, response);

        } catch (Exception ex) {
            out.println("Error: " + ex.getMessage());
            return;
        }

    }

    private void inicializaJdbc() {
        try {
            Class.forName("com.mysql.jdbc.Driver");
            Connection c = DriverManager.getConnection("jdbc:mysql://localhost/Banco", "root", "carloshenrique");
            pstmt = c.prepareStatement("select nome, saldo, nro_conta from cliente where nro_conta = ?");
        } catch (Exception ex) {
            System.out.println(ex);
        }
    }

    private void consultaConta(String conta) throws SQLException {
        System.out.print(conta);
        pstmt.setInt(1, Integer.parseInt(conta));
        resultSet = pstmt.executeQuery();
    }

}
