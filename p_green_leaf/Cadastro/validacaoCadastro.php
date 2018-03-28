
<?php 


include_once('../conexao.php');


$nome = utf8_decode(addslashes (strip_tags(($_POST["nome"]))));
$senha = addslashes (strip_tags(($_POST["senha"])));
$email = utf8_decode(addslashes (strip_tags(strip_tags($_POST["tx_email"]))));
$sexo = addslashes (strip_tags($_POST["sexo"]));
$data_nascimento = addslashes (strip_tags($_POST["outra_data"]));


$senha_criptografada = base64_encode($senha);




if (empty($nome)){
	header('location: ../index.php');
}else if (empty($senha)) {
	header('location: ../index.php');
}else if (empty($email)) {
	header('location: ../index.php');
}else if (empty($sexo) ){
	header('location: ../index.php');
}else if (empty($data_nascimento)){
	header('location: ../index.php');
}




$sql = mysqli_query($conexao, "SELECT * FROM usuario WHERE email = '{$email}'") or print mysql_error();

if(mysqli_num_rows($sql)>0) {

	echo "<script>alert('Email já existe'); history.back();</script>";


}else if ($_POST["sexo"] == "F") {


		$usuario = "INSERT INTO usuario (email, nome,sexo,senha,data_nascimento, foto, descricao) VALUES ('$email','$nome','$sexo','$senha_criptografada','$data_nascimento', 'mulher.png' ,'')";

		echo "<script>alert('Cadastro realizado com sucesso'); history.back();</script>";

	}else{

		$usuario = "INSERT INTO usuario (email, nome,sexo,senha,data_nascimento, foto ,  descricao) VALUES ('$email','$nome','$sexo','$senha_criptografada','$data_nascimento', 'img_avatar.png' , '')";

		echo "<script>alert('Cadastro realizado com sucesso'); history.back();</script>";

	
}






$inserir = mysqli_query($conexao, $usuario);



$conexao -> close();



?>	
