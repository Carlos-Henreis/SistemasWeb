<?php
	$h = date("H"); // get hour
	$m = date("i"); // get minutes
	$s = date("s"); // get seconds
	// Estrutura JSON em PHP
	$data = array('hour'=> $h, 'minute'=> $m, 'second'=> $s);
	// Transformando essa estrutura em String
	$data = json_encode($data);
	echo ($data);
?>