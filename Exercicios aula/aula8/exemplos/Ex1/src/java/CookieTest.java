import javax.servlet.*;
import javax.servlet.http.*;
import javax.servlet.annotation.*;
import java.io.*;
import java.util.*;
@WebServlet("/cookie-test")
public class CookieTest extends HttpServlet {
  public void doGet(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
      for(int i=0; i<3; i++) {
          Cookie cookie = new Cookie("Session-Cookie-" + i, "Cookie-Value-S" + i);
          // No maxAge (ie maxAge = -1)
          response.addCookie(cookie);
          cookie = new Cookie("Persistent-Cookie-" + i, "Cookie-Value-P" + i);
          cookie.setMaxAge(3600);
          response.addCookie(cookie);
      }
      Cookie[] cookies = request.getCookies();
        PrintWriter out = response.getWriter();
        out.println("<HTML><BODY><TABLE BORDER=2>");        
        if (cookies == null) {
            out.println("<TR><TH COLSPAN=2>No cookies");
        } else {
            for (Cookie cookie : cookies) {
                out.println("<TR>"
                        + " <TD>" + cookie.getName()
                        + " <TD>" + cookie.getValue());
            }
        }
        out.println("</TABLE></BODY></HTML>");
    }
}