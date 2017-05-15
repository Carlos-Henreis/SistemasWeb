<?php
defined('BASEURI') or die('Acesso Negado!');
abstract class Model{
	public function loadLib($file) {
		include_once(APPFOLDER.'/lib/'.$file.'.php');
	}
}