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
            <IMG SRC="./bank-support/Money.gif" ALIGN="RIGHT">
        <UL>
            <LI>Nome: ${regularCustomer.firstName}
            <LI>Sobrenome: ${regularCustomer.lastName}
            <LI>ID: ${regularCustomer.id}
            <LI>Saldo: $${regularCustomer.balance}
        </UL>
    </BODY>
</HTML>