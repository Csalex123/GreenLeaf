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

$id_usuario = $_SESSION['UsuarioID'];
$conteudo = utf8_decode(addslashes(strip_tags($_POST['conteudo'])));
$id_publicacao = $_POST['id_publicacao'];

if (empty($conteudo)) {
	echo "<script>alert('Preencha o campo de comentário'); location.href='../filtro.php';</script>";
}

$comentario = "INSERT INTO comentario (conteudo,id_publicacao,id_usuario) VALUES ('$conteudo', '$id_publicacao', '$id_usuario')";

		
$inserir = mysqli_query($conexao, $comentario);

if ($inserir) {
	
	echo "<script>alert('comentario postado com sucesso'); history.go(-1);</script>";



}else{
	mysqli_erro($conexao);
}

	

$conexao -> close();


?>