<jsp:useBean id="aluno" class="Aluno.Aluno" scope="session"/>
<jsp:setProperty name="aluno" property="*"/>
<HTML>
   <BODY>
        Você digitou os seguintes dados<BR>
        codigo <%= aluno.getCodigo()%><BR>
        nome <%= aluno.getNome()%><BR>
        sobrenome <%= aluno.getSobrenome()%><BR>
        fone <%= aluno.getFone()%><BR>
        email <%= aluno.getEmail()%><BR>
        endereco <%= aluno.getEndereco()%><BR>
        cidade <%= aluno.getCidade()%><BR>
        estado <%= aluno.getEstado()%><BR>
        cep <%= aluno.getCep()%><BR>
        <A HREF="index.html">Cancelar</A><BR>
        <A HREF="/Ex2/Registra">Continuar</A><BR>


    </BODY>
</HTML>