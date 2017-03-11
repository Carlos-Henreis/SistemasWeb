function opAritmeticas () {
	var lenum1 = prompt ("Entre com o num1", "");
	var lenum2 = prompt ("Entre com o num2", "");
	var num1 = parseInt(lenum1);
	var num2 = parseInt(lenum2);
	var strretorno = "<table border='1'><tr><td>Operação</td><td>Valor</td></tr>"+
					 				   "<tr><td>"+num1+"+"+num2+"</td><td>"+(num1+num2)+"</td></tr>"+
					 				   "<tr><td>"+num1+"-"+num2+"</td><td>"+(num1-num2)+"</td></tr>"+					 
					 				   "<tr><td>"+num1+"*"+num2+"</td><td>"+(num1*num2)+"</td></tr>"+
					 				   "<tr><td>"+num1+"/"+num2+"</td><td>"+(num1/num2)+"</td></tr>"+
					 +"</table>";
	return strretorno;
}
