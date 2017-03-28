<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML>
    <HEAD>
        <TITLE>Seu saldo</TITLE>
        <LINK REL=STYLESHEET
              HREF="./bank-support/JSP-Styles.css"
              TYPE="text/css">
    </HEAD>
    <BODY>
        <TABLE BORDER=5 ALIGN="CENTER">
            <TR><TH CLASS="TITLE">
                    Seu saldo</TABLE>
        <P>
        <CENTER><IMG SRC="./bank-support/Sailing.gif"></CENTER>
        <BR CLEAR="ALL">
        É uma honra servi-lo, Sr
        ${eliteCustomer.firstName} ${eliteCustomer.lastName}!
        <P>
            Considerando que o Sr é um dos nossos melhores clientes, gostaríamos
            de oferecer-lhe a oportunidade de investir uma pequena fração dos seus
            $${eliteCustomer.balance}
            em um iate digno do seu status. Por favor, visite nossa loja de barcos
            para maiores informações.
    </BODY>
</HTML>