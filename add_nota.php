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
			<h2>Adicionar Nota</h2><br>
			<?php
			if(isset($_SESSION['msg'])){
				echo $_SESSION['msg'];
				unset($_SESSION['msg']);
			}
			?>
			<form method="POST" action="proc_edit_usuario.php">
				<input type="hidden" name="id" value="<?php echo $row_usuario['id']; ?>">
				<input type="hidden" name="nome" value="<?php echo $row_usuario['nome']; ?>">
				<input type="hidden" name="telefone" value="<?php echo $row_usuario['telefone']; ?>">
				<input type="hidden" name="notas" value="<?php echo $row_usuario['notas']; ?>">
				<input type="hidden" name="total" value="<?php echo $row_usuario['total']; ?>">

				<label>Produto: </label>
				<input class="form-control form-control-sm" style="width: 55%" type="text" name="produto" placeholder="Nome do produto"><br>

				<label>Preço: </label>
				<input class="form-control form-control-sm" style="width: 25%" type="number" step="0.01" name="preco" placeholder="1.0"><br>

				<input type="submit" class="btn btn-primary" value="Salvar">
			</form>
		</div>


		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
		<script src="js/personalizado.js"></script>	
	</body>
</html>
