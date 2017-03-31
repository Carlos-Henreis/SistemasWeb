import javax.servlet.*;
import javax.servlet.http.*;
import javax.servlet.annotation.*;
import java.io.*;
import java.util.*;
@WebServlet("/repeat-visitor")
public class RepeatVisitor extends HttpServlet {
    public void doGet(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {
        boolean newbie = true;
        Cookie[] cookies = request.getCookies();
        if (cookies != null) {
            for (Cookie c : cookies) {
                if ((c.getName().equals("repeatVisitor")) && (c.getValue().equals("yes"))) {
                    newbie = false;
                    break;
                }
            }
        }
        String msg;
        if (newbie) {
            Cookie returnVisitorCookie = new Cookie("repeatVisitor", "yes");
            returnVisitorCookie.setMaxAge(60 * 60 * 24 * 365);
            response.addCookie(returnVisitorCookie);
            msg = "Bem-vindo a bordo";
        } else {
            msg = "Bem-vindo de volta";
        }
        response.setContentType("text/html");
        PrintWriter out = response.getWriter();
        out.println("<HTML>");
        out.println("<BODY>");
        out.println("<H2>" + msg + "</H2>");
        out.println("</BODY>");
        out.println("</HTML>");
        out.close();
    }}