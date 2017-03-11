function usdMaster () {
	var usd = document.getElementById('USD');
	var gbp = document.getElementById('GBP');
	var cad = document.getElementById('CAD');
	var eur = document.getElementById('EUR');
	var aud = document.getElementById('AUD');  
    gbp.value = (parseFloat(usd.value)*0.492466);
    cad.value = (parseFloat(usd.value)*0.98054);
    eur.value = (parseFloat(usd.value)*0.70641);
    aud.value = (parseFloat(usd.value)*1.13262);
}

function gbpMaster () {
	var usd = document.getElementById('USD');
	var gbp = document.getElementById('GBP');
	var cad = document.getElementById('CAD');
	var eur = document.getElementById('EUR');
	var aud = document.getElementById('AUD');  
    usd.value = (parseFloat(gbp.value)*2.03032);
    cad.value = (parseFloat(gbp.value)*1.99169);
    eur.value = (parseFloat(gbp.value)*1.43448);
    aud.value = (parseFloat(gbp.value)*2.29964);
}

function cadMaster () {
	var usd = document.getElementById('USD');
	var gbp = document.getElementById('GBP');
	var cad = document.getElementById('CAD');
	var eur = document.getElementById('EUR');
	var aud = document.getElementById('AUD');  
	usd.value = (parseFloat(cad.value)*1.01941);
    gbp.value = (parseFloat(cad.value)*0.50221);
    eur.value = (parseFloat(cad.value)*0.72037);
    aud.value = (parseFloat(cad.value)*1.15498);	
}

function eurMaster () {
	var usd = document.getElementById('USD');
	var gbp = document.getElementById('GBP');
	var cad = document.getElementById('CAD');
	var eur = document.getElementById('EUR');
	var aud = document.getElementById('AUD');
	usd.value = (parseFloat(eur.value)*1.41544);  
    gbp.value = (parseFloat(eur.value)*0.69714);
    cad.value = (parseFloat(eur.value)*1.38814);
    aud.value = (parseFloat(eur.value)*1.60329);	
}

function audMaster () {
	var usd = document.getElementById('USD');
	var gbp = document.getElementById('GBP');
	var cad = document.getElementById('CAD');
	var eur = document.getElementById('EUR');
	var aud = document.getElementById('AUD');  
    usd.value =  (parseFloat(aud.value)*0.88297);	
    gbp.value =  (parseFloat(aud.value)*0.43497);
    cad.value =  (parseFloat(aud.value)*0.86613);
    eur.value =  (parseFloat(aud.value)*0.62382);
}
