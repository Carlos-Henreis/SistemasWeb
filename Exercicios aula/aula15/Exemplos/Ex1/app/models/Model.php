<?php
abstract class Model{
	public function loadLib($file) {
		include_once(APPFOLDER.'/lib/'.$file.'.php');
	}
}