<?php

class Dog{
	protected $name;
	public function __construct($name){
		$this->name = $name;
	}

	public function roar(){
		echo 'chał chał';
	}

	public function getName(){
		return $this->name;
	}

	public function setName($name){
		$this->name = $name;
	}
}

class Basset extends Dog{
	public function hound(){
		//metoda tropienia :P
	}

	public function addPrefixToName($prefix){
		$this->name = $prefix.' '.$this->name;
    echo "$this->name";
	}
}

$reksio = new Basset('Reksio');
$reksio->roar();//metoda zdefiniowana w klasie Dog widoczna w podklasie
$reksio->addPrefixToName('Jamnik');

$reksio->getName();//metoda z nadklasy. Wyświetla 'Reksio' , a nie 'Jamnik Reksio'

 ?>
