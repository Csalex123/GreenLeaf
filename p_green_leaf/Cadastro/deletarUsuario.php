<?php 

include('../conexao.php');

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

$id_usuario = $_SESSION['UsuarioID'];


//SQL que deleta o usuário
$sql_code ="DELETE FROM usuario WHERE  '$id_usuario'  = usuario.id_usuario ";

$sql_query3 = mysqli_query($conexao, $sql_code);


if ($sql_query3) {	
	echo "<script>alert('Conta desativada com sucesso!'); location.href='../index.php'</script>";
	session_destroy();
	
}else{
	echo "<script>
	alert('Não foi possível deletar o usuário'); history.back();
	</script>";
}

?>