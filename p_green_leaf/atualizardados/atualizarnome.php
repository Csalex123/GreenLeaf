<?php

if(!isset($_SESSION)) 
{ 
	session_start(); 
} 
require ('../conexao.php');

$id_usuario = $_SESSION['UsuarioID'];

$query =  mysqli_query($conexao, "SELECT  * FROM usuario WHERE id_usuario = '$id_usuario'  LIMIT 1");

$resultado = mysqli_fetch_assoc($query);

$_SESSION['local'] = $resultado['foto'];
$_SESSION["senha2"] = $resultado['senha'];
$_SESSION["data_nascimento2"] = $resultado['data_nascimento'];
$_SESSION["sexo2"] = $resultado['sexo'];
$_SESSION["email2"] = $resultado['email'];

$email = $_SESSION["email2"] = $resultado['email'];
$sexo = $_SESSION["sexo2"] = $resultado['sexo'];
$data_nascimento = $_SESSION["data_nascimento2"];
$senha = $_SESSION["senha2"];
$nome = utf8_decode(addslashes (strip_tags($_POST['nome'])));





$usuario = "UPDATE usuario SET nome='$nome', email='$email', sexo='$sexo', senha='$senha', data_nascimento='$data_nascimento' WHERE id_usuario ='$id_usuario' ";


$inserir = mysqli_query($conexao, $usuario);

if ($inserir) {
	echo"<script>alert('Nome atualizado com sucesso'); history.back();</script>";
}else{
	mysql_error();
}



$conexao -> close();

?>