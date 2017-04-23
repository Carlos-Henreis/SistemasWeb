<?php

abstract class Model {
	abstract public function save ();
	abstract public function load ($id);
	abstract public function delete ($id);
	abstract public function update ($id, array $atributos);
}