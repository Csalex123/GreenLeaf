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
$_SESSION["sexo2"] = $resultado['sexo'];

$data = $_SESSION["data_nascimento2"];
$nome = $_SESSION['nome'];
$sexo = $_SESSION["sexo2"];
$senha = $_SESSION["senha2"];
$email = utf8_decode(addslashes (strtoupper(strip_tags($_POST['email']))));

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


$sql = mysqli_query($conexao, "SELECT * FROM usuario WHERE email = '{$email}'") or print mysql_error();

if(mysqli_num_rows($sql)>0) {
	echo "<script>alert('Já existe um email cadastrado com esse nome'); history.back();</script>"; exit;
}else {

$usuario = "UPDATE usuario SET nome='$nome', email='$email', sexo='$sexo', senha='$senha', data_nascimento='$data' WHERE id_usuario ='$id_usuario' ";

}

$inserir = mysqli_query($conexao, $usuario);

if ($inserir) {
	echo"<script>alert('Email atualizado com sucesso'); history.back();</script>";
}else{
	mysql_error();
}



$conexao -> close();

?>