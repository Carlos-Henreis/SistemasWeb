function reajustesTab () {
	var leSal = prompt ("Entre com o Salário", "");
	var salario= parseFloat(leSal);
	var novoSal;
	var strretorno;
	if (salario <= 280) {
		novoSal = salario*0.2+salario;
		strretorno = "Salario anterior: "+salario+"<br>Percentual: 20%<br>Valor aumento: "+(novoSal-salario)+"<br>Novo salario: "+novoSal;
	}else {
		if (salario >280 && salario<=700) {
			novoSal = salario*0.15+salario;
			strretorno = "Salario anterior: "+salario+"<br>Percentual: 15%<br>Valor aumento: "+(novoSal-salario)+"<br>Novo salario: "+novoSal;
		}else{
			if (salario >700 && salario<=1500) {
				novoSal = salario*0.1+salario;
				strretorno = "Salario anterior: "+salario+"<br>Percentual: 10%<br>Valor aumento: "+(novoSal-salario)+"<br>Novo salario: "+novoSal;
			}else{
				novoSal = salario*0.05+salario;
				strretorno = "Salario anterior: "+salario+"<br>Percentual: 05%<br>Valor aumento: "+(novoSal-salario)+"<br>Novo salario: "+novoSal;
			}
		}
	}
	return strretorno;
}
