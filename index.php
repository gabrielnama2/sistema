<?php
//session_start();
include_once("conexao.php");
//include('../verifica_login.php');
?>

<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="style.css">
		<title>Empresa</title>		
	</head>
	<body>

		<div class="container">

		<!--
		<h6>Olá, <?php echo $_SESSION['usuario'];?></h6>
		<h6><a href="../logout.php">Sair</a></h6>
		-->

		
			<br><h2>Nome da Empresa</h2><br>
			<a class="btn btn-primary" href="cad_usuario.php" role="button">Cadastrar</a><br><br>
			<hr>

			<?php
			if(isset($_SESSION['msg'])){
				echo $_SESSION['msg'];
				unset($_SESSION['msg']);
			}
			
			//Receber o número da página
			$pagina_atual = filter_input(INPUT_GET,'pagina', FILTER_SANITIZE_NUMBER_INT);		
			$pagina = (!empty($pagina_atual)) ? $pagina_atual : 1;
			
			//Setar a quantidade de itens por pagina
			$qnt_result_pg = 5;
			
			//calcular o inicio visualização
			$inicio = ($qnt_result_pg * $pagina) - $qnt_result_pg;
			
			$result_usuarios = "SELECT * FROM sistema LIMIT $inicio, $qnt_result_pg";
			$resultado_usuarios = mysqli_query($conn, $result_usuarios);
			while($row_usuario = mysqli_fetch_assoc($resultado_usuarios)){
				echo "<b>Nome: </b>" . $row_usuario['nome'] . "<br>";
				echo "<b>Telefone: </b>" . $row_usuario['telefone'] . " ";
				//echo "<a href='https://api.whatsapp.com/send?l=pt&amp;phone=" .$row_usuario['telefone'] ."'><img src='img/whatsapp.png' style='width:25px; height:25px; margin-bottom:4px;'></a><br>";	
				echo "<div id='notas' ><b>Notas: </b>" . $row_usuario['notas'] . "</div>";
				echo "<b>Total: </b>R$ " . $row_usuario['total'] . "<br>";
				echo "<a style='font-size:15px' href='add_nota.php?id=" . $row_usuario['id'] . "'>Novo Pedido</a><br>";
				echo "<a style='font-size:15px' href='pagar_nota.php?id=" . $row_usuario['id'] . "'>Pagar</a><br>";
				echo "<a style='font-size:15px' href='edit_usuario.php?id=" . $row_usuario['id'] . "'>Editar</a><br>";
				echo "<a style='font-size:15px' class='text-danger' href='proc_apagar_usuario.php?id=" . $row_usuario['id'] . "' data-confirm='Tem certeza de que deseja excluir o item selecionado?'>Apagar</a><br><br><hr>";
			}

			//Paginção - Somar a quantidade de usuários
			$result_pg = "SELECT COUNT(id) AS num_result FROM sistema";
			$resultado_pg = mysqli_query($conn, $result_pg);
			$row_pg = mysqli_fetch_assoc($resultado_pg);
			//echo $row_pg['num_result'];
			//Quantidade de pagina 
			$quantidade_pg = ceil($row_pg['num_result'] / $qnt_result_pg);
			
			//Limitar os link antes depois
			$max_links = 2;
			echo "<a href='index.php?pagina=1'>Primeira</a> ";
			
			for($pag_ant = $pagina - $max_links; $pag_ant <= $pagina - 1; $pag_ant++){
				if($pag_ant >= 1){
					echo "<a href='index.php?pagina=$pag_ant'>$pag_ant</a> ";
				}
			}
				
			echo "$pagina ";
			
			for($pag_dep = $pagina + 1; $pag_dep <= $pagina + $max_links; $pag_dep++){
				if($pag_dep <= $quantidade_pg){
					echo "<a href='index.php?pagina=$pag_dep'>$pag_dep</a> ";
				}
			}
			
			echo "<a href='index.php?pagina=$quantidade_pg'>Última</a>";
			
		?>
		</div>


		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
		<script src="js/personalizado.js"></script>		
	</body>
</html>