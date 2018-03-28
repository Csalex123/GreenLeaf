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



$id_adm = intval($_GET['adm']);




$sql_code ="DELETE FROM administrador WHERE id_adm = '$id_adm' ";

$sql_query = mysqli_query($conexao, $sql_code) or die(mysql_error());

if ($sql_query) {	
	header("location: listaradm.php");
}else{
	echo "<script>
	alert('Não foi possível deletar o administrador'); history.back();
	</script>";
}

?>



