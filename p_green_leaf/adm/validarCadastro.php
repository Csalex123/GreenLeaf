
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


echo "<script>alert('Só para administradores com nível de acesso Geral'); history.back();</script>";


}

$nome = utf8_decode(addslashes(strip_tags($_POST["nome"])));
$login = utf8_decode(addslashes(strip_tags($_POST["login"])));
$senha = utf8_decode(addslashes(strip_tags($_POST["senha"])));
$nivel = intval($_POST['nivel']);


$senha_criptografada = sha1($senha);




if (empty($nome)){
	echo "<script>alert('Preencha os dados corretamente'); history.back();</script>";
}else if (empty($senha)) {
	echo "<script>alert('Preencha os dados corretamente'); history.back();</script>";
}else if (empty($nivel)) {
	echo "<script>alert('Preencha os dados corretamente'); history.back();</script>";
}


$sql = mysqli_query($conexao, "SELECT * FROM administrador WHERE login = '{$nome}'") or print mysql_error();

if(mysqli_num_rows($sql)>0) {

	echo "<script>alert('Já existe um administrador com esse nome'); history.back();</script>";


}else{
	
	if ($nivel == 1) {
		$administrador = "INSERT INTO administrador (login, senha, nivel, nome) VALUES ('$login','$senha_criptografada', '$nivel',''$nome')";
		echo "<script>alert('Administrador Cadastrado com sucesso'); history.back();</script>";
	}else{
		$administrador = "INSERT INTO administrador (login, senha, nivel, nome) VALUES ('$login','$senha_criptografada', '$nivel', '$nome')";

		echo "<script>alert('Administrador Cadastrado com sucesso'); history.back();</script>";
	}
	
}




$inserir = mysqli_query($conexao, $administrador);



$conexao -> close();





?>	
