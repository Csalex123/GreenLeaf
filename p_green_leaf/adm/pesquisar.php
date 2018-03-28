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
include('../conexao.php');




$valor_pesquisar = $_GET['pesquisar'];

if (!isset($_GET['pesquisar'])) {
	header('location: listarUsuario.php');
}

$consulta = "SELECT * FROM usuario where nome LIKE '%$valor_pesquisar%' ";
$con = mysqli_query($conexao,$consulta) or die (mysql_erro());

if (mysqli_num_rows($con) == 0) {
	echo "<script>alert('Não existe usuário com esse nome;'); location.href='listarUsuario.php' </script>";
}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Green leaf</title>
	<meta charset="utf-8">
	<title>Gren leaf</title>
	<link rel="icon"  href="../img/fav.jpg">
	<link href="https://fonts.googleapis.com/css?family=Bree+Serif" rel="stylesheet">

	<meta name="viewport" content="width=device-width, initial-scale=1" media="all">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" media="all"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" media="all">

	<script src="jquery.js"></script>

</head>
<body>
	<style type="text/css">

	.fonte{
		font-size: 1.4em;
		font-family: 'Bree Serif', serif;
		color: #3A5FCD;
	}

	
	.fonte2{
		font-family: 'Bree Serif', serif;
	}

	
	.hover:hover{

		
		background-color: #00BFFF;
	}

	a:hover{
		color: red;
	}

</style>
<h1 align="center" class="fonte" style="font-size: 3em">Lista de todos os usuários</h1><br>

<div class="col-lg-6" >
	<form method="GET" class="form-inline" action="pesquisar.php">
		<div class="input-group" style="width: 600px; margin-left: 50px;">
			
		</div>
	</div>
</form>
</div>

<a href="listarUsuario.php"><button  class="btn btn-default hover" style="float: right; margin-right: 4px;">Ver todos usuários</button></a>
<a href="inicioADM.php"><button  class="btn btn-default hover" style="float: right; margin-right: 4px;">Voltar para página inicial</button></a>

<br><br><br>

<table class="table table-hover">
	<tr>
		<td class="fonte">Foto</td>
		<td class="fonte">ID</td>
		<td class="fonte">E-mail</td>
		<td class="fonte">Nome</td>
		<td class="fonte">Sexo</td>
		<td class="fonte">Data de nascimento</td>
		<td class="fonte">Ação</td>
	</tr>

	<?php while($dado = $con->fetch_array()){ ?>

	<tr>
		<td class="fonte2"><?php $foto = $dado["foto"]; echo "<img class='img-circle' src='../upload/".$foto."' alt='Foto de exibição' width='45px' height='38px' />"; ?></td>
		<td class="fonte2"><?php echo utf8_encode($dado["id_usuario"]); ?></td>
		<td class="fonte2"><?php echo utf8_encode($dado["email"]); ?></td>
		<td class="fonte2"><?php  echo utf8_encode($dado["nome"]); ?></td>
		<td class="fonte2"><?php if($dado["sexo"] == "M"){
			echo "MASCULINO";
		}else{
			echo "FEMININO";
		}  ?></td>
		
		
		<td class="fonte2"><?php echo date("d/m/Y", strtotime($dado["data_nascimento"])); ?></td>
		<td class="fonte2" >

			<a href="javascript: if(confirm('Tem certeza que deseja deletar o usuário 
			<?php echo $dado["email"].' ?'; ?>')) 
			location.href='deletar.php?p=excluir&usuario=<?php echo $dado['id_usuario']; ?>';">Excluir</a> 

		</td>
	</tr>

	<?php } ?>

</table>

</body>
</html>