import java.io.*;
import javax.servlet.*;
import javax.servlet.http.*;


public class MiServlet extends HttpServlet

{
      public void doGet (HttpServletRequest peticion, HttpServletResponse respuesta) throws ServletException, IOException
      {
             PrintWriter impresor;
             impresor=respuesta.getWriter();
             respuesta.setContentType("text/html");
             impresor.println

                   ("<HTML>\n" +
                    "<HEAD><TITLE>Hola WWW</TITLE></HEAD>\n" +
                    "<BODY>\n" +
                          "<H1>Hola WWW</H1>\n" +
                    "</BODY></HTML>");
       }
}