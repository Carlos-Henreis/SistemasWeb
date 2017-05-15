<?php

// Iremos usar o define a seguir
// para limpar a URL recebida
// e direcionar para algum controller.
define('BASEURI', '/');
// Esse define irá ser usado para
// orientar a aplicação quanto ao
// diretório da aplicação.
define('APPFOLDER','app');
// A função 'ltrim' irá remover do inicio da string
// e 'trim' do inicio e do final da string
$url = trim($_SERVER['REQUEST_URI'],'/');
$url = ltrim($url,BASEURI);
// obs: se seu .htaccess não funcionou, remova index.php do inicio da string
//$url = ltrim(url,‘index.php’);
$url .= '/';
if ($url != '/')
	$url = '/'.$url;
// Agora que já temos a url tratada.
// Ela terá o seguinte formato /Uma/Rota/
spl_autoload_register(function ($classname){
	if(include(APPFOLDER.'/controllers/'.$classname.'.php')) return;
	if(include(APPFOLDER.'/models/'.$classname.'.php')) return;
});
// A função de autoload irá ser chamada sempre que uma de nossas classes
// for criada. A vantagem de usá-lo é que não precisaremos usar includes
// sempre que precisarmos de algum arquivo de classe. Fique atento pois o
// nome da classe e de seu arquivo devem ser os mesmos para funcionar.


include_once('routes.php');

$route = route($url);
$route = explode('/',$route);
// Após traduzirmos nossa rota para "controller/metodo" iremos transformar
// essa string em um array, tomando como ponto de separação a '/'
$controller = $route[0];
$method = $route[1];
$obj = new $controller;
$obj->$method();
// Podemos melhorar essa estrutura usando call_user_func_array()
