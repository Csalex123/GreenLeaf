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

$id_publicacao = intval($_GET['publicacao']);


$sql_delete_comentario ="DELETE FROM comentario where '$id_publicacao' = comentario.id_publicacao; ";


$sql_query = mysqli_query($conexao, $sql_delete_comentario) or die(mysql_error());



$sql_code ="DELETE FROM publicacao WHERE id_publicacao = '$id_publicacao' ";

$sql_query2 = mysqli_query($conexao, $sql_code) or die(mysql_error());


if ($sql_query2) {	
	echo "<script>alert('Publicação deletada com sucesso'); history.back(); </script>";

}else{
	echo "<script>
	alert('Não foi possível deletar a publicação'); history.back();
	</script>";
}

?>



