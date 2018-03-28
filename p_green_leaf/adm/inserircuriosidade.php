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


$conteudo =  utf8_decode( $_POST['comentario']);



 if (empty($conteudo)) {
	echo "<script>alert('Preencha o campo de conteudo'); history.back();</script>";
}


if (isset($_FILES['foto'])){

	$arquivo = $_FILES['foto']['name'];

	$extensao = strtolower(substr($arquivo, -4));//Pega a extensao do arquivo

	$novo_nome = md5(time()).$extensao;//define o nome do arquivo

	$diretorio = "../upload/";//define o diretório para o arquivo vai ser enviado

	move_uploaded_file($_FILES['foto']['tmp_name'], $diretorio.$novo_nome);// efetua o upload 

	$sql = "INSERT into curiosidade (descricao, foto ) values ('$conteudo', '$novo_nome')";

	$inserir = mysqli_query($conexao,$sql);
}




if ($inserir == true) {


echo "<script>alert('curiosidade postada com sucesso'); history.back();</script>";
	
	
}else{
	echo mysqli_error($conexao);
}


$conexao -> close();


?>