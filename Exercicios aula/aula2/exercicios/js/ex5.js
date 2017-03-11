function FormatosAniver () {
	var leData = prompt ("Entre com a data nascimento", "2010/5/3");
	var leHora = prompt ("Entre com a hora nascimento", "1:12:59");
	var stringData = leData.split("/");
	var stringHora = leHora.split(":");
	var dataNas = new Date(parseInt(stringData[0]), parseInt(stringData[1]), parseInt(stringData[2]), parseInt(stringHora[0]), parseInt(stringHora[1]), parseInt(stringHora[2]));
	var dataAgora = new Date();

	var secs = Math.round ((dataAgora - dataNas)/1000);
	var years = Math.floor (secs/ 3.154e+7)
	var mounth = Math.floor (secs/ 2.628e+6)
	var days =  Math.floor (secs / 86400); 
	var hours = Math.floor (secs / 3600);
	var minutes = Math.floor (secs / 60);
	var strretorno = "Sua Idade em:<br>Anos: "+years+"<br>Mês: "+mounth+"<br>Dias: "+days+"<br>Horas: "+hours+"<br>Minutos: "+minutes+"<br>Segundos: "+secs;
	return strretorno;
}