<?php

if(!isset($_SESSION)) 
{ 
	session_start(); 
} 
require ('../conexao.php');

$id_usuario = $_SESSION['UsuarioID'];

$query =  mysqli_query($conexao, "SELECT  * FROM usuario WHERE id_usuario = '$id_usuario'  LIMIT 1");

$resultado = mysqli_fetch_assoc($query);

$_SESSION['nome'] = $resultado['nome'];
$_SESSION["senha2"] = $resultado['senha'];
$_SESSION["data_nascimento2"] = $resultado['data_nascimento'];
$_SESSION["email2"] = $resultado['email'];
$_SESSION["sexo"] = $resultado['sexo'];



$nome = $_SESSION['nome'];
$email = $_SESSION["email2"];
$sexo = $_SESSION["sexo"];
$data = $_SESSION["data_nascimento2"];
$senha = strip_tags($_POST['senha']);

$senha_criptografada = base64_encode($senha);

if (empty($email)){
	echo "<script>alert('campo vázio, preencha'); history.back();</script>";
}else if (empty($data)){
	echo "<script>alert('campo vázio, preencha'); history.back();</script>";
}else if (empty($sexo)){
	echo "<script>alert('campo vázio, preencha'); history.back();</script>";
}else if (empty($nome)){
	echo "<script>alert('campo vázio, preencha'); history.back();</script>";
}else if (empty($senha)){
	echo "<script>alert('campo vázio, preencha'); history.back();</script>";
}




$usuario = "UPDATE usuario SET nome='$nome', email='$email', sexo='$sexo', senha='$senha_criptografada', data_nascimento='$data' WHERE id_usuario ='$id_usuario' ";


$inserir = mysqli_query($conexao, $usuario);

if ($inserir) {
	echo"<script>alert('Senha atualizada com sucesso'); history.back();</script>";
}else{
	mysql_error();
}



$conexao -> close();

?>