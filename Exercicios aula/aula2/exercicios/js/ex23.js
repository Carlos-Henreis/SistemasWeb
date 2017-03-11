/*EX 2*/
function contaSubStr (frase, palavra) {
	var Frase = frase.split(" ");
	var cont = 0;
	for (var i = 0; i < Frase.length; i++) {
		if(palavra == Frase[i]){
            cont++;
        }
	}
	return cont;
}
/*EX2*/
function maiorSubStr (frase) {
	var Palavras = frase.split(" ");
	var maior = Palavras[0];
	for (var i = 1; i < Palavras.length; i++) {
		if(maior.length <= Palavras[i].length){
            maior = Palavras[i];
        }
	}
	return maior;
}