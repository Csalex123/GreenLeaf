<?php

if(!isset($_SESSION)) 
{ 
	session_start(); 
} 

$id_usuario = $_SESSION['UsuarioID'];
require ('conexao.php');


if (isset($_FILES['foto'])){

	$arquivo = $_FILES['foto']['name'];

	$extensao = strtolower(substr($arquivo, -4));//Pega a extensao do arquivo

	$novo_nome = md5(time()).$extensao;//define o nome do arquivo

	$diretorio = "upload/";//define o diretório para o arquivo vai ser enviado

	move_uploaded_file($_FILES['foto']['tmp_name'], $diretorio.$novo_nome);// efetua o upload 

	$sql = "UPDATE usuario SET foto ='$novo_nome' WHERE id_usuario ='$id_usuario' ";

	$inserir = mysqli_query($conexao,$sql);


	if ($inserir == true) {

		header("Location: paginainicial.php");
	}

}else{
	print mysql_error();
}

	


?>