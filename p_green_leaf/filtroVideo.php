<?php 
require ('conexao.php');

if(!isset($_SESSION)) 
{ 
	session_start(); 
} 

// Verifica se não há a variável da sessão que identifica o usuário
if (!isset($_SESSION['UsuarioID'])) {
// Destrói a sessão por segurança
	session_destroy();

// Redireciona o visitante de volta pro login
	header("Location: index.php"); exit;

}



//verifica a página atual caso seja informada na URL, senão atribui como 1ª página 
$valor_pesquisar =  utf8_encode((isset($_GET['pesquisar'])))? $_GET['pesquisar'] : ''; 


if ($valor_pesquisar == 'Educação' || $valor_pesquisar == 'educação'){
	$valor_pesquisar = 'Educa';
}




 //seleciona todos os itens da tabela video
$consulta = "SELECT * FROM video where categoria LIKE '%$valor_pesquisar%' ";

$con = mysqli_query($conexao,$consulta) or print mysql_error($conexao);


if (mysqli_num_rows($con) == 0) {
	echo "<script>alert('Não existe nenhum filtro com este nome $valor_pesquisar'); history.back(); </script>";
}


?>

<!DOCTYPE html>
<html>
<head>

	<meta charset="utf-8">
	<link rel="icon"  href="img/fav.jpg">
	<!-- Importando bootstrap -->
	<meta name="viewport" content="width=device-width, initial-scale=1" media="all">

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" media="all">

	<link rel="stylesheet" type="text/css" href="css/index.css" media="all">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js" media="all"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" media="all"></script>
	<script src="jquery.js"></script>

	<style>
	div.gallery {
		margin-left: 20px;
		margin-bottom: 20px;
		margin-top: auto ;
		margin-right: 5px;

		border: 1px solid #ccc;
		float: left;
		width: 380px;
		background-color: white;
		box-shadow: 0 8px 16px 8px rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.2);
		font-size: 18px;
	}

	div.desc {
		padding: 25px;
		text-align: justify;
	}

	input#procurar:focus {
		width: 300px;
	}
</style>
</head>
<body>

	<?php include 'menu.php' ?>

	<h1 align="center" style="font-family: 'Montserrat', sans-serif; font-size: 5em;"><b>Galeria de vídeos</b></h1><br>

	<a href="video.php"><button class="btn btn-default" style="font-family: 'Montserrat', sans-serif; margin-top: -50px; margin-left: 20px;" >Voltar ao início</button></a>
	<div class="container col-lg-12">
		<div>

			<form class="navbar-form navbar-right"  action="filtrovideo.php" method="GET" style="margin-right: 20px; margin-left: 20px; margin-top: -30px;">
				<div class="input-group ">
					<input style="box-shadow: 0 8px 25px 8px rgba(0,0,0,0.1), 0 6px 10px 0 rgba(0,0,0,0.1)"; type="text" class="form-control" style="float: center; " name="pesquisar"  autocomplete="" id="procurar" placeholder="Filtre por categoria">
					<div class="input-group-btn" ">

						<button class="btn btn-default hover"  type="submit">
							<i class="glyphicon glyphicon-search" ></i>
						</button>

					</div>
				</div>
			</form>

		</div><br>

		<?php while($dado = $con->fetch_array()){ ?>

		
			<div class="gallery" style="margin-left: 40px;">
				<div class="embed-responsive embed-responsive-16by9">
					<?php $video = $dado['link_video'];

					echo "<iframe class='embed-responsive-item' width='400' height='200' src=' $video ' frameborder='0' allow='autoplay; encrypted-media' allowfullscreen></iframe>";

					?>

				</div>
				<div class="desc" style="color: black;font-family: 'Montserrat', sans-serif;"><?php echo utf8_encode($dado["titulo"]); ?>
				</div>


				<div class="desc" style="color: black;font-family: 'Montserrat', sans-serif;"><b>Categoria: <?php echo  utf8_encode($dado["categoria"]); ?></b>
				</div>



		</div>
		<?php } ?>
</div>

		<footer >
			<div  container-fluid navbar-bottom" >
				<center>
					<b align="right" style="color: black;">&nbsp; &nbsp;&nbsp; Copyright Green Leaf - 2018 &copy;</b>
				</div>
			</center>

		</footer>

	</body>
	</html>