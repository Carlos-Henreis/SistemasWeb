<?php
defined('BASEURI') or die('Acesso Negado!');
abstract class Controller {
	public function loadView($file,array $args = NULL) {
		if($args !== NULL) 
			extract($args);
		include_once(APPFOLDER.'/views/'.$file.'.php');
	}
	public function loadLib($file) {
		include_once(APPFOLDER.'/lib/'.$file.'.php');
	}
}
