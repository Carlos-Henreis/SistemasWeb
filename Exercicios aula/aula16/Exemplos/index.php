<?php
$string = 'abcefghijklmnopqrstuvwxyz0123456789';

// tenta fazer o casamento com todos os caracteres fora do padrão
preg_match_all("/[^b]/", $string, $matches);

//  Faz loop imprimindo os casamentos
foreach($matches[0] as $value){
	echo $value;
}

print_r ($matches);

?>