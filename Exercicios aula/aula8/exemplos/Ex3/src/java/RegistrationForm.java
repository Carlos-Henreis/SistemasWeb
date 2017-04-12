import javax.servlet.*;
import javax.servlet.http.*;
import java.io.*;
import java.util.*;
import javax.servlet.annotation.*;

@WebServlet("/registration-form")
public class RegistrationForm extends HttpServlet {

    public void doGet(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {
        response.setContentType("text/html");
        PrintWriter out = response.getWriter();
        String actionURL = "./registration";
        String firstName = CookieUtilities.getCookieValue(request, "firstName", "");
        String lastName = CookieUtilities.getCookieValue(request, "lastName", "");
        String emailAddress = CookieUtilities.getCookieValue(request, "emailAddress", "");
        String title = new String("Please register");
        out.println("<HTML>"
                + "<HEAD><TITLE>" + title + "</TITLE></HEAD>\n"
                + "<BODY BGCOLOR=\"#FDF5E6\">\n"
                + "<CENTER>\n"
                + "<H1>" + title + "</H1>\n"
                + "<FORM METHOD=\"POST\" ACTION=\"" + actionURL + "\">\n"
                + "First Name:\n"
                + " <INPUT TYPE=\"TEXT\" NAME=\"firstName\" "
                + "VALUE=\"" + firstName + "\"><BR>\n"
                + "Last Name:\n"
                + " <INPUT TYPE=\"TEXT\" NAME=\"lastName\" "
                + "VALUE=\"" + lastName + "\"><BR>\n"
                + "Email Address: \n"
                + " <INPUT TYPE=\"TEXT\" NAME=\"emailAddress\" "
                + "VALUE=\"" + emailAddress + "\"><P>\n"
                + "<INPUT TYPE=\"SUBMIT\" VALUE=\"Register\">\n"
                + "</FORM></CENTER></BODY></HTML>");
    }
}