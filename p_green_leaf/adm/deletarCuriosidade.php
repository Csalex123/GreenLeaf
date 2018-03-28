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



$id_curiosidade = intval($_GET['curiosidade']);




$sql_code ="DELETE FROM curiosidade WHERE id_curiosidade = '$id_curiosidade' ";

$sql_query = mysqli_query($conexao, $sql_code) or die(mysql_error());

if ($sql_query) {	
	header("location: listarcuriosidade.php");
}else{
	echo "<script>
	alert('Não foi possível deletar a curiosidade'); history.back();
	</script>";
}

?>



