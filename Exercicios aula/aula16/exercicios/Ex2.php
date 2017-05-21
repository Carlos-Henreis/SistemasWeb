<?php
	
function validaTel ($phone) {
	//padrão: (xx) xxxx xxxx
	$phone_pattern= '/^\([[:digit:]]{2}\) [[:digit:]]{4} [[:digit:]]{4}$/';
	$match = preg_match ($phone_pattern, $phone); 
	return $match;
}

function validaData ($data) {
	//data: dd/mm/aaaa
	$date_pattern = '/^(0?[1-9]|[12][[:digit:]]|3[01])\/(0?[1-9]|1[0-2])\/[[:digit:]]{4}$/';
	$match = preg_match($date_pattern, $data); 
	return $match;
}

$phone = '(35) 3663 1769'; 
if (validaTel ($phone) > 0) {
	echo "Numero ".$phone." é valido<br>";
}else {
	echo "Numero ".$phone." errado<br>";;
}

$phone = '(353663 1769'; 
if (validaTel ($phone) >0) {
	echo "Numero ".$phone." é valido<br>";
}else {
	echo "Numero ".$phone." errado<br>";;
}

$data = '27/12/1995';//correto
if (validaData ($data) > 0) {
	echo "data ".$data." é valido<br>";
}else {
	echo "data ".$data." errado<br>";;
}

$data = '12/13/2013';//errado 
if (validaData ($data) >0) {
	echo "data ".$data." é valido<br>";
}else {
	echo "data ".$data." errado<br>";;
}

?>