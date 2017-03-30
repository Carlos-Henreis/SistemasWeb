<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Home Banking - Efetuar deposito</title>
         <LINK REL=STYLESHEET HREF="./bank-support/JSP-Styles.css" TYPE="text/css">
         
         
    </head>
    <body>
        <fieldset>
            <legend><h2>Home Banking</h2></legend>
    <h1> Depositar um valor:</h1>
            <form action="./controleDeposito" method=post>    
                <table cellpadding=4 cellspacing=2 border=0>            
                    <tr>
                            <td  valign=top>
                            <b>Numero da conta:</b>
                            <br>
                            <input type="text" name="nroConta" size=15></td>
                    </tr>
                    <tr>
                            <td  valign=top>
                            <b>Valor:</b>
                            <br>
                            <input type="text" name="valor" size=15></td>
                    </tr>                  
                    <tr>
                        <td  valign=top>
                        <input type="submit" value="Depositar">
                        </td>
                    </tr>
                    
                </table>    
        </form>
        
    </fieldset>
        <a href=".\index.jsp"> <input type="button" value="Home"></a>  
