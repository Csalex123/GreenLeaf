<?php 

if(!isset($_SESSION)) 
{ 
	session_start(); 
} 

if (!isset($_SESSION['id_adm'])) {

	session_destroy();

	header("Location: adm/indexadm.php"); exit;
}

include('../conexao.php');

$id_video = intval($_GET['video']);


$sql_delete_video ="DELETE FROM video where '$id_video' = video.id_video; ";


$sql_query = mysqli_query($conexao, $sql_delete_video) or die(mysql_error());





if ($sql_query) {	
	echo "<script>alert('Vídeo deletado com sucesso'); history.back(); </script>";

}else{
	echo "<script>
	alert('Não foi possível deletar o vídeo'); history.back();
	</script>";
}

?>



