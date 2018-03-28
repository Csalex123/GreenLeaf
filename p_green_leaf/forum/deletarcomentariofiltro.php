<?php 



require ('../conexao.php');

if(!isset($_SESSION)) { 

  session_start(); 
} 

  // Verifica se não há a variável da sessão que identifica o usuário
if (!isset($_SESSION['UsuarioID'])) {
      // Destrói a sessão por segurança
  session_destroy();

      // Redireciona o visitante de volta pro login
  header("Location: ../index.php"); exit;

}


$id_comentario = intval($_GET['comentario']);

$sql_code ="DELETE FROM comentario where comentario.id_comentario = '$id_comentario' ";

$sql_query = mysqli_query($conexao, $sql_code) or die(mysql_error());

if ($sql_query) { 
  echo "<script>alert('comentário apagado com sucesso!'); history.go(-1);</script>";

}else{
  echo "<script>
  alert('Não foi possível deletar comentário'); history.go(-1);
  </script>";
}

?>



