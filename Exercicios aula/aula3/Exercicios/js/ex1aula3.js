function validaIdade() {

	VerifyNumInRange(document.forms["registraUsuario"].idade, 10, 90);
}


function validaEmail() {

	if (document.forms["registraUsuario"].email.value.search("@")==-1) {
		alert(document.forms["registraUsuario"].email.value+" não é um email valido");
	}
	return true;
}

function ImprimirDados(){
      var OutputWindow = window.open("", "", "status=0,menubar=0,height=300,width=240");
      OutputWindow.document.open();
      var s="";      
      var nome = document.forms["registraUsuario"].nome.value;
      var idade = document.forms["registraUsuario"].idade.value;
      var email = document.forms["registraUsuario"].email.value;
      var cb=document.forms['registraUsuario'].elements['linguagens']; 
      for (var i = 0; i < cb.length; i++) { 
        if (cb[i].checked) { 
          s = s + cb[i].value + " "; 
        } 
      } 
      if (s == "") { 
        s = "nenhuma opção marcada..."; 
      }
      var radio = document.forms['registraUsuario'].elements["notify"].value;
      OutputWindow.document.write(
        "<body bgcolor='#c8d8f8'>"
          +"<center>"
              +"<table cellpadding=4 cellspacing=2 border=0>"

                  +"<th bgcolor='#CCCCFF' colspan=2>"
                      +"<font size=5>Registro do dados inseridos</font>"
                  +"</th>"

                  +"<tr>"
                      +"<td valign=top>" 
                          +"<b>Nome</b>" 
                          +"<br>"
                          +nome
                      +"</td>"
                      +"<td  valign=top>"
                          +"<b>Idade</b>"
                          +"<br>"
                          +idade
                  +"</tr>"

                  +"<tr>"
                      +"<td valign=top colspan=2>"
                          +"<b>E-Mail</b>"
                          +"<br>"
                          +email
                          +"<br></td>"
                  +"</tr>"

                  +"<tr>"
                      +"<td  valign=top colspan=2>"
                          +"<b>linguagens que você programa</b>"
                          +"<br>"
                          +s
                      +"</td>"
                  +"</tr>"

                  +"<tr>"
                      +"<td  valign=top colspan=2>"
                          +"<b>frequência de notificações</b>"
                          +"<br>"
                          +radio
                          +"<br></td>"
                  +"</tr>"
              +"</table>"
          +"</center>"
      +"</body>"
      );             
  } 


function validaCB() {    
  var cb=document.forms['registraUsuario'].elements['linguagens']; 
  var cont = 0;
  for (var i = 0; i < cb.length; i++) { 
    if (cb[i].checked){ 
      cont = cont+1; 
    } 
  } 
  if (cont > 3) { 
    alert("Selecione no máximo 3 opções");
    return false;
  }
  ImprimirDados();
}       

