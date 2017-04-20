<?php
class Dog {
	// Declaração de Atributo
	public $name;
	// Declaração de um método
	public function bark() {
   // A pseudo variável $this faz referência ao próprio objeto
   // com ela fazemos acesso aos atributos e métodos internamente
		echo $this->name.' says: Woof!<br>';
}
} 
// Para criar uma instância
$mydog = new Dog();
$mydog->name = 'locura'; 
$mydog->bark();
