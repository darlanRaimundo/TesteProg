<?php

class Usuario {
	private $id;
	private $nome;
	private $email;
	private $cpf;
	private $competencias;
	private $telefone;

	public function __get($atributo) {
		return $this->$atributo;
	}

	public function __set($atributo, $valor) {
		$this->$atributo = $valor;
		return $this;
	}
}

?>