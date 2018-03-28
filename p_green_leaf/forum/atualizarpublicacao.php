<?php 

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
require ('../conexao.php');

$id_publicacao = $_POST['id_publicacao'];
$conteudo = utf8_decode(addslashes(strip_tags($_POST['comentario'])));
$titulo = utf8_decode(addslashes(strip_tags($_POST['titulo'])));



if(empty($titulo)){
	echo "<script>alert('campo de título vázio , preencha!'); history.back();</script>";
}else if (empty($conteudo)){
	echo "<script>alert('campo de conteúdo vázio, preencha!'); history.back();</script>";
}

$query =  mysqli_query($conexao, "SELECT  * FROM publicacao WHERE id_publicacao = '$id_publicacao'  LIMIT 1");// Seleciona todos dados do usuário que está registrado no banco de dados

$resultado = mysqli_fetch_assoc($query);// Array que guarda todos dados do usuário


$publicacao = "UPDATE publicacao SET titulo='$titulo', conteudo='$conteudo' WHERE id_publicacao ='$id_publicacao' ";


$inserir = mysqli_query($conexao, $publicacao);

if ($inserir) {
	echo"<script>alert('Publicação atualizada com sucesso'); location.href='../forumUsuario.php';</script>";
}else{
	mysql_error();
}


?>