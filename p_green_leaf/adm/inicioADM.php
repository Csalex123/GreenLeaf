<?php if(!isset($_SESSION)) 
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

$id_adm = $_SESSION['id_adm'];

$query =  mysqli_query($conexao, "SELECT  * FROM administrador WHERE id_adm = '$id_adm'  LIMIT 1");

$resultado = mysqli_fetch_assoc($query);


$_SESSION["nome"] = $resultado['nome'];
$_SESSION["nivel"] = $resultado['nivel'];


?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Green Leaf</title>
	<link rel="icon"  href="../img/fav.jpg">
	<link href="https://fonts.googleapis.com/css?family=Bree+Serif" rel="stylesheet">

	<meta name="viewport" content="width=device-width, initial-scale=1" media="all">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" media="all"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" media="all">

	<script src="jquery.js"></script>
	
	<style type="text/css">
	.fonte{
		font-family: 'Bree Serif', serif;
		font-size: 1.2em;
	}

	button:hover{

		background-color: #00BFFF;
	}

	.tamanho{
		width: 300px;
		height: 45px;
	}


	button:hover{

        -webkit-transform: scale(1.5);
        -ms-transform: scale(1.5);
        transform: scale(1.5);
}


</style>


</head>
<body>

	<h1 align="center" class="fonte" style="color:#4682B4; font-size: 3em;">ÁREA ADMINISTRATIVA DO <b style="color:#228B22;">GREEN LEAF</b></h1><br>
	<h3 class="fonte" style="margin-left: 20px; font-size: 2em;">Seja bem-vindo(a) administrador(a), <?php $nome = $_SESSION['nome']; echo ucwords($nome); ?>! </h3>

	<h2 align="right" class="fonte" style="font-size: 1.4em; margin-right: 15px;"> Nível de acesso: <?php $nivel = $_SESSION['nivel']; if ($nivel == 2) {
		echo "<b style='color:red'>Geral</b>";
	}else{
		echo "<b style='color: blue'>Normal</b>";
	} ?> </h2>

	<br><br>
	<center>

		<a href="cadastroADM.php"><button class="btn brn-default fonte tamanho">Cadastrar administrador</button></a>
		<br><br>
		<a href="atualizarSenha.php"><button class="btn brn-default fonte tamanho">Atualizar dados do administrador</button></a>
		<br><br>
		<a href="listarUsuario.php"><button class="btn brn-default fonte tamanho">Todos os usuários</button></a>
		<br><br>
		<a href="listaradm.php"><button class="btn brn-default fonte tamanho">Todos os administradores</button></a>
		<br><br>
		<a href="verpublicacao.php"><button class="btn brn-default fonte tamanho">Todas publicações do Fórum</button></a>
		<br><br>
		<a href="publicaoNoticia.php"><button class="btn brn-default fonte tamanho">Publicar notícias</button></a>
		<br><br>
		<a href="Peticao.php"><button class="btn brn-default fonte tamanho">Publicar Petições</button></a>
		<br><br>
		<a href="Curiosidade.php"><button class="btn brn-default fonte tamanho">Publicar Curiosidades</button></a>
		<br><br>
		<a href="video.php"><button class="btn brn-default fonte tamanho">Publicar Vídeos</button></a>

	</center>



	<br><br><br><br>
	<a href="sair.php"><button style="margin-left: 70px;" class="btn brn-default fonte tamanho" >Sair</button></a>
</body>
</html>