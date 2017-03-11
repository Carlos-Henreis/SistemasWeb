function leArray () {
	var arrayInt = new Array();
	var leNums;
	leNums =  prompt("Entre com os inteiro (separado por espaços): ","1 2 3") 
	var Nums = leNums.split (" ");
	for (var i = 0; i < Nums.length; i++) {
		arrayInt.push(parseInt (Nums[i]));
	}
	return arrayInt;
}

function soma(arrayInt) {
	var cont =0;
	for (var i = 0; i < arrayInt.length; i++) {
		cont += arrayInt[i];
	}
	return cont;
}

function produto(arrayInt) {
	var cont =1;
	for (var i = 0; i < arrayInt.length; i++) {
		cont *= arrayInt[i];
	}
	return cont;
}