<?php
// arquivo functions.php com funções de verificação!
function get_post_value($var) {
    if(isset($var)) 
        return $var;
    else return '';
}
function validate_form() {
    if($_POST['l_name'] and $_POST['email'])
    	if (strpos( $_POST['email'], "@"))
        	return true;
    if (!strpos( $_POST['email'], "@") and $_POST['email'])
    	echo '<h3>Campos e-mail preenchido de forma incorreta!</h3><br>';

    echo '<h3>Campos obrigatórios não foram preenchidos!</h3>';
    return false;
}

