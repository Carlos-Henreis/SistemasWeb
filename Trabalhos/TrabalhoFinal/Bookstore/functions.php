<?php
include_once("validar.php");
?> 
<?php
// arquivo functions.php com funções de verificação!
function get_post_value($var) {
    if(isset($var)) 
        return $var;
    else return '';
}
function validate_form() {
    if($_POST['matric'] and $_POST['nome'] and $_POST['endereco'] and $_POST['email'])
        return true;
    echo '<h3>Campos obrigatórios não foram preenchidos!</h3>';
    return false;
}
