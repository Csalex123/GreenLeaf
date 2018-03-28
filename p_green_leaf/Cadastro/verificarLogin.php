<?php 
session_start();

require_once('../conexao.php');

$usuario = strtoupper($_POST['usuario']);
$senha = $_POST['senha'];
$senhacriptografada = base64_encode($senha);




if (empty($usuario) OR empty($senha)) {
	header("Location: ../index.php"); exit;
}

$query =  mysqli_query($conexao, "SELECT  *  FROM usuario WHERE email = '$usuario' AND senha = '$senhacriptografada' LIMIT 1");

if(mysqli_num_rows($query) != 1){

	echo "<script>alert('Usuário não encontrado'); history.back();</script>";

	
	
}else{

	$resultado = mysqli_fetch_assoc($query);

	// Salva os dados encontrados na sessão
	$_SESSION["UsuarioID"] = $resultado['id_usuario'];
	

    // Redireciona o visitante
	header("Location: ../paginainicial.php"); exit;

}



?>