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

$pagina = (isset($_GET['pagina']))? $_GET['pagina'] : 1;

$resultado_curiosidade = "SELECT * from video"; //Seleciona todos os vídeos
$resultado_curio = mysqli_query($conexao, $resultado_curiosidade); //Busca no banco de dados
$total_curiosidade = mysqli_num_rows($resultado_curio); // Ver quantas linhas tem
$quantidade_itens = 9; // Quantidade de vídeos que vai ser exibido por páginas
$numero_paginas = ceil($total_curiosidade/$quantidade_itens); // Dividir as páginas 
$inicio = ($quantidade_itens*$pagina)-$quantidade_itens;
$result = "SELECT* from video limit $inicio,$quantidade_itens";
$resulte = mysqli_query($conexao, $result);
$total = mysqli_num_rows($resulte);



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
<div class="container col-lg-12">
	<div>
		<form class="navbar-form navbar-right"  action="filtrovideo.php" method="GET" style="margin-right: -20px; margin-left: -100px; margin-top: -30px;">
			<div class="input-group ">
				<input style="box-shadow: 0 8px 25px 8px rgba(0,0,0,0.1), 0 6px 10px 0 rgba(0,0,0,0.1)"; type="text" class="form-control" style="float: center; " name="pesquisar"  autocomplete="" id="procurar" placeholder="Filtre por categoria">
				<div class="input-group-btn" >

					<button class="btn btn-default hover"  type="submit">
						<i class="glyphicon glyphicon-search" ></i>
					</button>

				</div>
			</div>
		</form>

	</div><br>

	<?php while ($dado = mysqli_fetch_array($resulte)) { ?>

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

	<div class="footer">
		<nav class="text-center">
			<ul class="pagination">

				<!-- Paginação -->
				<?php

				$pg_anterior = $pagina - 1;
				$pg_posterior = $pagina + 1;

				?>

				<?php 
				if ($pg_anterior != 0) { ?>
				<li>
					<a href="video.php?pagina=<?php echo $pg_anterior; ?>" aria-label="Previous">
						<span aria-hidden="true">&laquo;</span>
					</a>

					<?php }else{ ?>	
					<li>
						<span aria-hidden="true">&laquo;</span>
					</li>
					<?php } ?>

				</li>

				<?php for($i = 1; $i < $numero_paginas + 1; $i++){ 

					$estilo = "";
					if($pagina == $i) 
						$estilo = "class=\"active\"";


					?>

					<li <?php echo $estilo; ?> >
						<a href="video.php?pagina=<?php echo $i; ?>"><?php echo $i; ?></a>
					</li>


					<?php } ?>

					<?php 

					if ($pg_posterior != 0) { ?>

					<li>
						<a href="video.php?pagina=<?php echo $pg_posterior; ?>" aria-label="Next">
							<span aria-hidden="true">&raquo;</span>
						</a>

						<?php }else{ ?>	
						<li>
							<span aria-hidden="true">&raquo;</span>
						</li>
						<?php } ?>

					</li>
				</ul>	
			</nav>
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