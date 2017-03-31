import javax.servlet.*;
import javax.servlet.http.*;
import java.io.*;
import java.util.*;
import javax.servlet.annotation.*;

@WebServlet("/client-access-counts")
public class ClientAccessCounts extends HttpServlet {

    public void doGet(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {
        String countString = CookieUtilities.getCookieValue(request, "accessCount", "1");
        int count = 1;
        try {
            count = Integer.parseInt(countString);
        } catch (NumberFormatException nfe) {
        }
        LongLivedCookie c = new LongLivedCookie("accessCount", String.valueOf(count + 1));
        response.addCookie(c);

        String title = new String("Servlet Contador");
        response.setContentType("text/html");
        PrintWriter out = response.getWriter();
        out.println("<HTML>"
                + "<HEAD><TITLE>" + title
                + "</TITLE></HEAD>\n"
                + "<BODY BGCOLOR=\"#FDF5E6\">\n"
                + "<CENTER>\n"
                + "<H1>" + title + "</H1>\n"
                + "<H2>Essa é a visita número  "
                + count + " desse browser.</H2>\n"
                + "</CENTER></BODY></HTML>");
    }
}