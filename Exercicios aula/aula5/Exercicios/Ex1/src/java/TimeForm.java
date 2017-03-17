
import javax.servlet.*;
import javax.servlet.http.*;
import java.io.*;
import java.util.*;
import java.text.*;

public class TimeForm extends HttpServlet {

    private static final String CONTENT_TYPE = "text/html";
    private Locale[] allLocale = Locale.getAvailableLocales();
    private String[] allTimeZone = TimeZone.getAvailableIDs();

    public void doGet(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
        response.setContentType(CONTENT_TYPE);
        PrintWriter out = response.getWriter();
        out.println("<h3>Escolha o locale e o fuso horário</h3>");
        out.println("<form method=\"post\" action=" + "/Ex1/TimeForm>");//Mudar aqui depende do projeto
        out.println("Locale <select size=\"1\" name=\"locale\">");
        // Preenche os locales
        for (int i = 0; i < allLocale.length; i++) {
            out.println("<option value=\"" + i + "\">" + allLocale[i].getDisplayName() + "</option>");
        }
        out.println("</select>");
        // Preenche os fusos horários
        out.println("<p>Fuso Horario<select size=\"1\" name=\"timezone\">");
        for (int i = 0; i < allTimeZone.length; i++) {
            out.println("<option value=\"" + allTimeZone[i] + "\">"
                    + allTimeZone[i] + "</option>");
        }
        out.println("</select>");
        out.println("<p><input type=\"submit\" value=\"Submit\" >");
        out.println("<input type=\"reset\" value=\"Reset\"></p>");
        out.println("</form>");
        out.close();
    }

    public void doPost(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
        response.setContentType(CONTENT_TYPE);
        PrintWriter out = response.getWriter();
        out.println("<html>");
        int localeIndex = Integer.parseInt(request.getParameter("locale"));
        String timeZoneID = request.getParameter("timezone");
        out.println("<head><title>Hora atual</title></head>");
        out.println("<body>");
        //Cria objeto Calendar usando o Locale escolhido
        Calendar calendar = new GregorianCalendar(allLocale[localeIndex]);
        TimeZone timeZone = TimeZone.getTimeZone(timeZoneID);
        //Formata a data de acordo com o Locale escolhido
        DateFormat dateFormat = DateFormat.getDateTimeInstance(
                DateFormat.FULL, DateFormat.FULL, allLocale[localeIndex]);
        //Atribui o timeZone escolhido ao formatador da data
        dateFormat.setTimeZone(timeZone);
        out.println("A hora atual eh "
                + dateFormat.format(calendar.getTime()) + "</p>");
        out.println("</body></html>");
        out.close();
    }

}
