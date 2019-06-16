<?php
//session_start();
include_once("conexao.php");
//include('../verifica_login.php');
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
$result_usuario = "SELECT * FROM sistema WHERE id = '$id'";
$resultado_usuario = mysqli_query($conn, $result_usuario);
$row_usuario = mysqli_fetch_assoc($resultado_usuario);
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
		<title>Empresa</title><br>
	</head>
	<body>
		<div class="container">
			<br><a class="btn btn-primary" href="index.php" role="button">Início</a><br><br>
			<h2>Editar Usuário</h2><br>
			<?php
			if(isset($_SESSION['msg'])){
				echo $_SESSION['msg'];
				unset($_SESSION['msg']);
			}
			?>
			<form method="POST" action="proc_edit_usuario.php">
				<input type="hidden" name="id" value="<?php echo $row_usuario['id']; ?>">
				
				<label>Nome: </label>
				<input class="form-control form-control-sm" style="width: 55%" type="text" name="nome" placeholder="Digite o nome completo" value="<?php echo $row_usuario['nome']; ?>"><br>
				
				<label>Telefone: </label>
				<input class="form-control form-control-sm" style="width: 55%" type="text" name="telefone" placeholder="Telefone" value="<?php echo $row_usuario['telefone']; ?>"><br><br>

				<div class="form-group">
					<label for="exampleFormControlTextarea1">Notas: </label>
				   	<textarea class="form-control" id="exampleFormControlTextarea1" rows="10" name="notas"><?php echo $row_usuario['notas']; ?></textarea>
				</div>
				
				<label>Total: </label>
				<input class="form-control form-control-sm" style="width: 25%" type="number" step="0.01" name="total" placeholder="1.0" value="<?php echo $row_usuario['total']; ?>"><br>

				<input type="submit" class="btn btn-primary" value="Salvar">
			</form>
		</div>


		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
		<script src="js/personalizado.js"></script>	
	</body>
</html>
