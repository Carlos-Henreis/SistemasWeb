<?php
// Aqui iremos determinar qual controller e qual método serão usados para
// cada url. Iremos seguir o seguinte padrão Nome/Metodo que irá instanciar
// um controller(classe) com 'Nome' e chamar seu 'Metodo'.
function route($url) {
$route['/'] = 'home/hello';
$route['/user/signin/'] = 'home/login';
$route['/user/signup/'] = 'home/createUser';
if($route[$url] != '')
return $route[$url];
die(include_once(APPFOLDER.'/views/templates/404.php'));
}
