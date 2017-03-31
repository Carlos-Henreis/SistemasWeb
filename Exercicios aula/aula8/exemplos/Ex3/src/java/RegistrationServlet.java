import javax.servlet.*;
import javax.servlet.http.*;
import java.io.*;
import java.util.*;
import javax.servlet.annotation.*;

@WebServlet("/registration")
public class RegistrationServlet extends HttpServlet {

    public void doPost(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {
        response.setContentType("text/html");
        boolean isMissingValue = false;
        String firstName = request.getParameter("firstName");
        if (isMissing(firstName)) {
            firstName = "Missing first name";
            isMissingValue = true;
        }
         String lastName = request.getParameter("lastName");
        if (isMissing(lastName)) {
            lastName = "Missing last name";
            isMissingValue = true;
        }
        String emailAddress = request.getParameter("emailAddress");
        if (isMissing(emailAddress)) {
            emailAddress = "Missing eMail address";
            isMissingValue = true;
        }
        Cookie c1 = new LongLivedCookie("firstName", firstName);
        response.addCookie(c1);
        Cookie c2 = new LongLivedCookie("lastName", lastName);
        response.addCookie(c2);
        Cookie c3 = new LongLivedCookie("emailAddress", emailAddress);
        response.addCookie(c3);
        String formAddress = "/registration-form";
         if (isMissingValue) {
            response.sendRedirect(formAddress);
        } else {
            String title = new String("Thank you for registering");
            response.setContentType("text/html");
            PrintWriter out = response.getWriter();
            out.println("<HTML>"
                    + "<HEAD><TITLE>" + title
                    + "</TITLE></HEAD>\n"
                    + "<BODY BGCOLOR=\"#FDF5E6\">\n"
                    + "<CENTER>\n"
                    + "<H1>" + title + "</H1>\n"
                    + "<H3>\n"
                    + "<P>First name: " + firstName + "\n"
                    + "<P>Last name: " + lastName + "\n"
                    + "<P>Email address: " + emailAddress + "\n"
                    + "</CENTER></BODY></HTML>");
        }
    }
     private boolean isMissing(String str) {
        if (str.equalsIgnoreCase("")) {
            return true;
        }
        return false;
    }
}