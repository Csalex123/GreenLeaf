<?php 

require ('../conexao.php');

$titulo =  utf8_decode(addslashes (strip_tags($_POST['titulo'])));
$conteudo =  utf8_decode( $_POST['comentario']);
$fonte =  addslashes (strip_tags($_POST['fonte']));
$id_noticia = addslashes (strip_tags($_POST['pagina']));


if (empty($titulo)){
	echo "<script>alert('Preencha o campo de título'); history.back();</script>";
}else if (empty($conteudo)) {
	echo "<script>alert('Preencha o campo de conteudo'); history.back();</script>";
}else if (empty($fonte)) {
	echo "<script>alert('Preencha o campo de fonte'); history.back();</script>";
}else if ($id_noticia < 1 OR $id_noticia > 5) {
	echo "<script>alert('Número de página não encontrada'); history.back();</script>";
}


if (isset($_FILES['foto'])){

	$arquivo = $_FILES['foto']['name'];

	$extensao = strtolower(substr($arquivo, -4));//Pega a extensao do arquivo

	$novo_nome = md5(time()).$extensao;//define o nome do arquivo

	$diretorio = "../upload/";//define o diretório para o arquivo vai ser enviado

	move_uploaded_file($_FILES['foto']['tmp_name'], $diretorio.$novo_nome);// efetua o upload 

	$sql = "UPDATE noticia SET titulo='$titulo', conteudo='$conteudo', fonte='$fonte', foto='$novo_nome'  WHERE id_noticia ='$id_noticia' ";

	$inserir = mysqli_query($conexao,$sql);
}else{
	$sql = "UPDATE noticia SET titulo='$titulo', conteudo='$conteudo', fonte='$fonte'  WHERE id_noticia ='$id_noticia' ";

	$inserir = mysqli_query($conexao,$sql);
}





if ($inserir == true) {


echo "<script>alert('Publicação postada com sucesso'); history.back();</script>";
	
	
}else{
	echo mysql_error();
}


$conexao -> close();


?>