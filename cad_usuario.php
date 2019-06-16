<?php
//session_start();
//include('../verifica_login.php');
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
		<title>Empresa</title>		
	</head>
	<body>
		<div class="container">
			<br><a class="btn btn-primary" href="index.php" role="button">Início</a><br><br>
			<h2>Cadastrar Usuário</h2><br>
			<?php
			if(isset($_SESSION['msg'])){
				echo $_SESSION['msg'];
				unset($_SESSION['msg']);
			}
			?>
			<form method="POST" action="proc_cad_usuario.php">
				<label>Nome: </label>
				<input class="form-control form-control-sm" style="width: 55%" type="text" name="nome" placeholder="Nome"><br>

				<label>Telefone: </label>
				<input class="form-control form-control-sm" style="width: 55%" type="number" name="telefone" placeholder="5533XXXXXXXXX" ><br>
				
				<input type="submit" class="btn btn-primary" value="Cadastrar">
			</form>
		</div>

		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
		<script src="js/personalizado.js"></script>		
	</body>
</html>