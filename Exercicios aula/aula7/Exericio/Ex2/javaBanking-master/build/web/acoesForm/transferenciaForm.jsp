<%@page contentType="text/html" pageEncoding="UTF-8"%>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>transferência:</title>

         
         <LINK REL=STYLESHEET HREF="./bank-support/JSP-Styles.css" TYPE="text/css">
         
         
    </head>
    <body>
        <fieldset>
            <legend><h2>Home Banking</h2></legend>
        <h1>Realize uma transferência:</h1>
            <form action="./controleTransferencia" method=post>
            
                <table cellpadding=4 cellspacing=2 border=0>                    
                    <tr>
                            <td  valign=top>
                            <b>Numero da conta de Origem:</b>
                            <br>
                            <input type="text" name="nroContaorigem" size=15></td>
                    </tr>            
                    <tr>
                            <td  valign=top>
                            <b>Numero da conta de Destino:</b>
                            <br>
                            <input type="text" name="nroContadestino" size=15></td>
                    </tr>            
                    <tr>
                            <td  valign=top>
                            <b>Valor a ser transferido:</b>
                            <br>
                            <input type="text" name="valor" size="15" ></td>
                    </tr>
                    <tr>
                        <td  valign=top>
                        <input type="submit" value="Transferir">
                        </td>
                    </tr>            
                </table>    
        </form>
     </fieldset>
<a href=".\index.jsp"> <input type="button" value="Home"></a>   

<br>
</body>
</html>