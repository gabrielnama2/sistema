<?php
session_start();
include_once("conexao.php");

$id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
$notas = filter_input(INPUT_POST, 'notas', FILTER_SANITIZE_STRING);
$total = filter_input(INPUT_POST, 'total', FILTER_SANITIZE_STRING);
$pagar = filter_input(INPUT_POST, 'pagar', FILTER_SANITIZE_STRING);

$total = $total - $pagar;
if($pagar>0 && $total>0){
	$notas = "restante (" . $total .") + ";
}
if($pagar>0 && $total==0){
	$notas = null;
	$total = 0;
}



$result_usuario = "UPDATE sistema SET notas='$notas', total='$total', modified=NOW() WHERE id='$id'";
$resultado_usuario = mysqli_query($conn, $result_usuario);

if(mysqli_affected_rows($conn)){
	$_SESSION['msg'] = "<p style='color:green;'>Usuário editado com sucesso</p>";
	header("Location: index.php");
}else{
	$_SESSION['msg'] = "<p style='color:red;'>Usuário não foi editado com sucesso</p>";
	header("Location: editar.php?id=$id");
}
