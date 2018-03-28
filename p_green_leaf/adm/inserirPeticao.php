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


$titulo =  utf8_decode($_POST['titulo']);
$link =  utf8_decode($_POST['link']);




 if (empty($titulo)) {
	echo "<script>alert('Preencha o campo de Título'); history.back();</script>";
}else if (empty($link)) {
	echo "<script>alert('Preencha o campo de link'); history.back();</script>";
}


if (isset($_FILES['foto'])){

	$arquivo = $_FILES['foto']['name'];

	$extensao = strtolower(substr($arquivo, -4));//Pega a extensao do arquivo

	$novo_nome = md5(time()).$extensao;//define o nome do arquivo

	$diretorio = "../upload/";//define o diretório para o arquivo vai ser enviado

	move_uploaded_file($_FILES['foto']['tmp_name'], $diretorio.$novo_nome);// efetua o upload 

	$sql = "INSERT into peticao (link, titulo,  foto ) values ('$link', '$titulo', '$novo_nome')";

	$inserir = mysqli_query($conexao,$sql);
}




if ($inserir == true) {


echo "<script>alert('Petição postada com sucesso'); history.back();</script>";
	
	
}else{
	print mysqli_error($conexao);
}


$conexao -> close();


?>