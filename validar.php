<?php

	$acao = 'recuperarUsuarios';
	require 'controller.php';

	/*
	echo '<pre>';
	print_r($usuarios);
	echo '</pre>';
	*/

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Teste Programador</title>

	<link rel="stylesheet" href="css/estilo.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/css/materialize.min.css">
	<script src="scripts/scripts.js"></script>

</head>
<body>

	<div class="container app">
		<div class="row">
			
			<div class="col-md-12">
				<div class="container ">
					<div class="row">
						<div class="col">
							<h4>Lista Usuários</h4>
							<hr />

							<div class="content">
								<table class=" bordered striped centered ">
						            <thead>
						                <tr>
						                    <th>Nome</th>
						                    <th>E-mail</th>
						                    <th>CPF</th>
						                    <th>Competências</th>
						                    <th>Telefone</th>
						                    <th>Validado</th>
						                </tr>
						            </thead>
						            <tbody>
						            	<?php foreach($usuarios as $indice => $usuario) { ?>
						                <tr>
						                	<form name="form_link" method="post" action="controller.php?acao=validar">
							                    <td> <?php echo $usuario->nome ?> </td>
							                    <td> <?php echo $usuario->email ?> </td>
							                    <td> <?php echo $usuario->cpf ?> </td>
							                    <td> <?php echo $usuario->competencias ?> </td>
							                    <td> <?php echo $usuario->telefone ?> </td>
							                    <td>
						                    		<input type="hidden" class="form-control" name="cpf" value="<?php echo $usuario->cpf ?> ">
						                    		<button>
						                    			<?php echo ($usuario->status == 'T' ? " Validado " : " Validar ") ?>
						                    		</button> 	
							                    </td>
							                </form> 
						                </tr>
						           		<?php } ?>
						            </tbody>
						        </table>
					    	</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>