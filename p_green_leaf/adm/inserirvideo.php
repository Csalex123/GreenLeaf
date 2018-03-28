<?php 

if(!isset($_SESSION)) 
{ 
  session_start(); 
} 

// Verifica se não há a variável da sessão que identifica o usuário
if (!isset($_SESSION['id_adm'])) {
// Destrói a sessão por segurança
  session_destroy();

// Redireciona o visitante de volta pro login
  header("Location: indexadm.php"); exit;

  
}

require ('../conexao.php');


$titulo =  utf8_decode( $_POST['titulo']);
$link = $_POST['link'];
$categoria = utf8_decode($_POST['categoria']);



 if (empty($titulo)) {
	echo "<script>alert('Preencha o campo de conteudo'); history.back();</script>";
}else if (empty($link)) {
	echo "<script>alert('Preencha o campo com o link'); history.back();</script>";
}else if (empty($categoria)) {
	echo "<script>alert('Preencha o campo com o link'); history.back();</script>";
}



$sql = "INSERT into video (titulo, link_video, categoria) values ('$titulo', '$link' , '$categoria')";

$inserir = mysqli_query($conexao,$sql);


if ($inserir == true) {


echo "<script>alert('Vídeo postado com sucesso'); history.back();</script>";
	
	
}else{
	echo mysqli_error($conexao);
}


$conexao -> close();


?>