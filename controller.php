<?php
	
	require "service.php";
	require "usuario.model.php";
	require "conexao.php";

	$acao = isset($_GET['acao']) ? $_GET['acao'] : $acao;
	if($acao == 'inserir' ) {
		$usuario = new Usuario();
		$usuario->__set('nome', $_POST['nome']);
		$usuario->__set('email', $_POST['email']);
		$usuario->__set('cpf', $_POST['cpf']);
		$usuario->__set('competencias', $_POST['competencias']);
		$usuario->__set('telefone', $_POST['telefone']);

		$conexao = new Conexao();

		$service = new UserService($conexao,$usuario);


		if ($service->checa_cpf() != '') {
			header('Location: registrar?incluir=false');	
		} else {
			$service->inserir();
			header('Location: registrar?incluir=true');
		}
	
	}
	

	


?>