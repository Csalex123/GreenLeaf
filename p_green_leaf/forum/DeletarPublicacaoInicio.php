<?php 

require ('../conexao.php');

if(!isset($_SESSION)) 
{ 
  session_start(); 
} 

  // Verifica se não há a variável da sessão que identifica o usuário
if (!isset($_SESSION['UsuarioID'])) {
      // Destrói a sessão por segurança
  session_destroy();

      // Redireciona o visitante de volta pro login
  header("Location: ../index.php"); exit;

}


$id_publicacao = intval($_POST['publicacao']);


$sql_delete_comentario ="DELETE FROM comentario where '$id_publicacao' = comentario.id_publicacao; ";


$sql_query = mysqli_query($conexao, $sql_delete_comentario) or die(mysql_error());


$sql_delete_publicacao = "DELETE FROM publicacao WHERE publicacao.id_publicacao = '$id_publicacao' ";

$sql_query2 = mysqli_query($conexao, $sql_delete_publicacao) or die(mysql_error());


if ($sql_query2) {	
	echo "<script>alert('Publicação apagada com sucesso!');history.back(); </script>";
}else{
	echo "<script>
	alert('Não foi possível deletar a publicação'); history.back();
	</script>";
}

?>