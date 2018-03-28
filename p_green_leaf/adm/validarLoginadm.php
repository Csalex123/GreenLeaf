<?php 
session_start();

require_once('../conexao.php');

$usuario =  addslashes(strip_tags($_POST['login']));
$senha =  addslashes(strip_tags($_POST['senha']));
$senhacriptografada = sha1($senha);



if (empty($usuario) OR empty($senha)) {
	header("Location: amd/indexADM.php"); exit;
}

$query =  mysqli_query($conexao, "SELECT  *  FROM administrador WHERE login = '$usuario' AND senha = '$senhacriptografada' LIMIT 1");

if(mysqli_num_rows($query) != 1){

	echo "<script>alert('Login inválido!'); history.back();</script>";

	
	
}else{

	$resultado = mysqli_fetch_assoc($query);

	// Salva os dados encontrados na sessão
	$_SESSION["id_adm"] = $resultado['id_adm'];

    // Redireciona o visitante
	header("Location: inicioADM.php"); exit;
	

}


?>