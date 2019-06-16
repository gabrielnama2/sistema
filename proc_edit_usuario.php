<?php
session_start();
include_once("conexao.php");

$id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
$telefone = filter_input(INPUT_POST, 'telefone', FILTER_SANITIZE_STRING);
$produto = filter_input(INPUT_POST, 'produto', FILTER_SANITIZE_STRING);
$preco = filter_input(INPUT_POST, 'preco', FILTER_SANITIZE_STRING);
$notas = filter_input(INPUT_POST, 'notas', FILTER_SANITIZE_STRING);
$total = filter_input(INPUT_POST, 'total', FILTER_SANITIZE_STRING);
$total = $preco + $total;
$verifica_notas = $notas;
//$teste = $id + $numero;
//echo "Nome: $nome <br>";
//echo "E-mail: $email <br>";
//$teste = "gabriel";
//$teste = $id+$id;
//$teste[0] = $row_usuario['nome'];
//$preco = $preco*1.0;
if(empty($notas)){
$notas = $produto;
}
else{
$notas = $notas . $produto;
}
if(empty($notas)){
	$total = 0;
}
if($notas != $verifica_notas){
	$notas = $notas." (".$preco.") + ";
}


$result_usuario = "UPDATE sistema SET nome='$nome', telefone='$telefone', notas='$notas', total='$total', modified=NOW() WHERE id='$id'";
$resultado_usuario = mysqli_query($conn, $result_usuario);

if(mysqli_affected_rows($conn)){
	$_SESSION['msg'] = "<p style='color:green;'>Usuário editado com sucesso</p>";
	header("Location: index.php");
}else{
	$_SESSION['msg'] = "<p style='color:red;'>Usuário não foi editado com sucesso</p>";
	header("Location: editar.php?id=$id");
}
