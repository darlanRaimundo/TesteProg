<?php
	if (isset($_GET['incluir'])) {
		if ($_GET['incluir'] == 'true' ) {
			echo  "<script>alert('Usuário registrado com sucesso!');</script>";
			//javascript:alert('Usuário registrado com sucesso!');
		} else {
			echo  "<script>alert('Já existe um usuário com o mesmo CPF no banco de dados!');</script>";
		}
	}
	

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Teste Programador</title>

	<link rel="stylesheet" href="css/estilo.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

	<script src="scripts/scripts.js"></script>

</head>
<body>

	<div class="container app">
		<div class="row">
			
			<div class="col-md-9">
				<div class="container pagina">
					<div class="row">
						<div class="col">
							<h4>Registro</h4>
							<hr />

							<form method="post" action="controller.php?acao=inserir" onsubmit="return validaCampos(this)">
								<div class="form-group">
									<label>Nome:</label>
									<input type="text" class="form-control" maxlength="255" name="nome" >

									<label>E-mail:</label>
									<input type="text" class="form-control" maxlength="255" name="email" onblur="validacaoEmail(email)" >

									<label>CPF:</label>
									<input type="text" class="form-control" name="cpf" maxlength="14" oninput="mascara(cpf)" placeholder="xxx.xxx.xxx-xx" >

									<hr />

									<div class="col-sm-20">
										<label>Competências</label>
										<input type="hidden" name="competencias" >
										<div class="row">
											<div class="col-sm-5"><input name="op1" type="checkbox"> Gerência de Projetos </div>
											<div class="col-sm-5"><input name="op2" type="checkbox"> Controle Financeiro </div>
											<div class="col-sm-5"><input name="op3" type="checkbox"> Controle de Estoque </div>
											<div class="col-sm-5"><input name="op4" type="checkbox"> Desenvolvimento front end </div>
										</div>
										<div class="row">
											<div class="col-sm-5"><input name="op5" type="checkbox"> Banco de dados </div>
											<div class="col-sm-5"><input name="op6" type="checkbox"> Desenvolvimento Back End </div>
											<div class="col-sm-5"><input name="op7" type="checkbox"> DevOps </div>
										</div>
									</div>

									<hr />
									
									<label>Telefone:</label>
									<input type="text" class="form-control" name="telefone" maxlength="20" placeholder="(xx)xxxxx-xxxx" >

									
									
								</div>

								<button class="btn btn-success" >Cadastrar</button>
							</form>
							
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>