<?php 
session_start();

require('../conexao.php');


$titulo =  utf8_decode( addslashes (strip_tags($_POST["titulo"])));
$conteudo =  utf8_decode( addslashes (strip_tags($_POST["comentario"])));
$tema =   utf8_decode ( addslashes( (strip_tags($_POST["tema"]))));


$titulo_quebrado = wordwrap($titulo, 62, "<br />\n", true);

$id_usuario = $_SESSION["UsuarioID"];


if (empty($titulo)){
	echo "<script>alert('Preencha o campo de título'); history.back();</script>";
}else if (empty($conteudo)) {
	echo "<script>alert('Preencha o campo de conteudo'); history.back();</script>";
}else if (empty($tema)) {
	echo "<script>alert('Selecione o assunto corretamente'); history.back();</script>";
}

$sql = "INSERT INTO publicacao(titulo, tema,conteudo, id_usuario)values('$titulo_quebrado', '$tema', '$conteudo','$id_usuario')";


if ($sql == true) {

	$id_usuario2 = "publicacao".$id_usuario;

	$query =  mysqli_query($conexao, "SELECT id_publicacao FROM publicacao INNER JOIN usuario ON '$id_usuario' = publicacao.id_usuario  ");


	$resultado = mysqli_fetch_assoc($query);
	// Salva os dados encontrados na sessão
	$_SESSION["publicacaoID"] = $resultado['id_publicacao'];
	

	$id_publicacao = $_SESSION["publicacaoID"];

	echo "<script>alert('Publicação postada com sucesso'); location.href='../forumUsuario.php'</script>";
	
	
}else{
	echo mysql_error();

}

$inserir = mysqli_query($conexao, $sql);



$conexao -> close();


?>