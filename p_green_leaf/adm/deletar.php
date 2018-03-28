<?php 

if(!isset($_SESSION)) 
{ 
	session_start(); 
} 

if (!isset($_SESSION['id_adm'])) {

	session_destroy();

	header("Location: indexadm.php"); exit;
}

include('../conexao.php');

$id_usuario = intval($_GET['usuario']);



//Deleta o usuário
$sql_code ="DELETE FROM usuario WHERE id_usuario = '$id_usuario' ";

$sql_query = mysqli_query($conexao, $sql_code) or die(mysql_error());



if ($sql_query) {	
	echo "<script>alert('Usuário deletado com sucesso!'); history.back(); </script>";
}else{
	echo "<script>
	alert('Não foi possível deletar o usuário'); history.back();
	</script>";
}

?>



