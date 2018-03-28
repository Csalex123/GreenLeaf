<?php 

require ('../conexao.php');

if(!isset($_SESSION)) 
{ 
	session_start(); 
} 
$id_adm = $_SESSION['id_adm'];


$query =  mysqli_query($conexao, "SELECT  nivel FROM administrador WHERE id_adm = '$id_adm'  LIMIT 1");
$resultado = mysqli_fetch_assoc($query);

$_SESSION['nivel'] = $resultado['nivel'];


$nivel = $_SESSION['nivel'];




// Verifica se é administrador geral
if ($nivel != 2 ) {

	echo "<script>alert('Só para administradores com nível de acesso ALTO'); history.back();</script>";


}


$nome = utf8_decode(addslashes(strip_tags($_POST["login"])));
$senha = utf8_decode(addslashes(strip_tags($_POST["senha"])));
$nivel = intval($_POST['nivel']);


$senha_criptografada = sha1($senha);







if (empty($nome)){
	echo "<script>alert('Preencha os dados corretamente'); history.back();</script>";
}else if (empty($senha)) {
	echo "<script>alert('Preencha os dados corretamente'); history.back();</script>";
}


$sql = mysqli_query($conexao, "SELECT * FROM administrador WHERE login = '{$nome}'") or print mysqli_error($conexao);


$dado = mysqli_fetch_assoc($sql);

$id_adm2 = $dado['id_adm'];

$login2 = $dado['login'];


$_SESSION['nivel_adm'] = $dado['nivel'];




if(mysqli_num_rows($sql) != 1) {

	echo "<script>alert('Não existe ADM com este nome'); history.back();</script>";


}

else {

	if (($_POST['nivel']== null)) {


		$nivel_adm = $_SESSION['nivel_adm'];

		$administrador = "UPDATE administrador SET  login='$login2', senha='$senha_criptografada', nivel='$nivel_adm' WHERE administrador.id_adm = '$id_adm2' ";

		$inserir = mysqli_query($conexao, $administrador);

		echo "<script>alert('Senha atualizada com sucesso'); history.back();</script>";

		

	}else{


		$administrador = "UPDATE administrador SET login='$login2', senha='$senha_criptografada', nivel='$nivel' WHERE administrador.id_adm = '$id_adm2' ";


		$inserir = mysqli_query($conexao, $administrador);

		echo "<script>alert('Senha e nível atualizados com sucesso'); history.back();</script>";

		
	}


}






$conexao -> close();





?>	
