<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0
    Transitional//EN">
<HTML>
    <HEAD>
        <TITLE>Saldo bancário</TITLE>
        <LINK REL=STYLESHEET
              HREF="./bank-support/JSP-Styles.css"
              TYPE="text/css">
    </HEAD>
    <BODY>
        <fieldset>
            <legend><h2>Home Banking</h2></legend>

            <form action="/operationServlet">
                <b>Qual ação deseja realizar no seu HomeBanking?</b>
                <br>
                <br><input type="radio" name="acao" value="criacao" checked>Criação de conta com Saldo Inicial
                <br><input type="radio" name="acao" value="saque">Saques
                <br><input type="radio" name="acao" value="deposito">Depositos
                <br><input type="radio" name="acao" value="transferencia">Transferências
                <br><input type="radio" name="acao" value="saldo">Saldo
                <br><br>

                <input type="submit" value="  Avançar!  ">
            </form>

        </fieldset>
        <br>
    </BODY>
</HTML>