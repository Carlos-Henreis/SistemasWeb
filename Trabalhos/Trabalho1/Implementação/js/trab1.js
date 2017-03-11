function inserepiloto() {
    var i;
    var nome = document.forms["registraTempo"].userName.value;
    var time = parseFloat (document.forms["registraTempo"].userTime.value);
    var x = encontrarpos(time);
    var table = document.getElementById("myTable");
    var row = table.insertRow(x);
    var cell1 = row.insertCell(0);
    var cell2 = row.insertCell(1);
    var cell3 = row.insertCell(2);
    cell1.innerHTML = x;
    cell2.innerHTML = nome;
    cell3.innerHTML = time;
	
    var tam = document.getElementById("myTable").rows.length;
    document.getElementById("myTable").rows[1].cells[0].innerHTML = 1;
    var pos = 1;
    for (i =2; i < tam; i++) {
		var value = parseFloat(document.getElementById("myTable").rows[i].cells[2].innerHTML);
		var valueant = parseFloat(document.getElementById("myTable").rows[i-1].cells[2].innerHTML);
		if ( value === valueant) {
		     document.getElementById("myTable").rows[i].cells[0].innerHTML = parseInt(document.getElementById("myTable").rows[i-1].cells[0].innerHTML);
		}
		else{
			pos+=1;
			document.getElementById("myTable").rows[i].cells[0].innerHTML = pos;		
		}	
    }
}
 
function encontrarpos (time) {
	var i;
	var tam = document.getElementById("myTable").rows.length;
	if (tam == 1)
		return 1;
	for (i =1; i < tam; i++) {
		var value = parseFloat(document.getElementById("myTable").rows[i].cells[2].innerHTML);
		if ( value > time) {
			return i;
		}	
	}
	return tam;
}



