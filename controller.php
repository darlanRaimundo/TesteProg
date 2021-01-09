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
		$usuario->__set('status', "F");

		$conexao = new Conexao();

		$service = new UserService($conexao,$usuario);


		if ($service->checa_cpf() != '') {
			header('Location: registrar?incluir=false');	
		} else {
			$service->inserir();
			header('Location: registrar?incluir=true');
		}
	
	} else if ($acao == 'recuperarUsuarios') {
		$usuario = new Usuario();
		$conexao = new Conexao();
		$service = new UserService($conexao,$usuario);
		$usuarios = $service->recuperar_usuarios();
	} else if ($acao == 'validar') {
		$usuario = new Usuario();
		$usuario->__set('cpf', $_POST['cpf']);
		$conexao = new Conexao();
		$service = new UserService($conexao,$usuario);
		$service->validar();
		$usuarios = $service->recuperar_usuarios();
		header('Location: validar');
	}
	

	


?>