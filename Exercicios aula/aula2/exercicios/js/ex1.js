function converte (temperaturaC) {
	var temperaturaF;
	temperaturaF = temperaturaC * 1.8000 + 32.00;
	return temperaturaF;
}

function conversao () {
	var letemperaturaC =  prompt("Infome a temperatura: ", "0");
	var temperaturaC = parseFloat (letemperaturaC);
	return converte (temperaturaC);
}