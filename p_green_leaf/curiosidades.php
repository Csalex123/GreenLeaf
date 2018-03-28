<?php 

if(!isset($_SESSION)) 
{ 
	session_start(); 
} 

if (!isset($_SESSION['UsuarioID'])) {
	session_destroy();
	header("Location: index.php"); exit;

}

include('conexao.php');

$pagina = (isset($_GET['pagina']))? $_GET['pagina'] : 1;

$resultado_curiosidade = "Select * from curiosidade";
$resultado_curio = mysqli_query($conexao, $resultado_curiosidade);
$total_curiosidade = mysqli_num_rows($resultado_curio);
$quantidade_itens = 12;
$numero_paginas = ceil($total_curiosidade/$quantidade_itens);
$inicio = ($quantidade_itens*$pagina)-$quantidade_itens;
$result = "select * from curiosidade limit $inicio,$quantidade_itens";
$resulte = mysqli_query($conexao, $result);
$total = mysqli_num_rows($resulte);


?>

<!DOCTYPE html>
<html>
<head>

	<meta charset="utf-8">
	<link rel="icon"  href="img/fav.jpg">
	<title>Curiosidades</title>
	<meta name="viewport" content="width=device-width, initial-scale=1" media="all">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" media="all">
	<link rel="stylesheet" type="text/css" href="css/index.css" media="all">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js" media="all"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" media="all"></script>
	<script src="jquery.js"></script>

	<style type="text/css">
	div.gallery {
		margin-left: -20px;
		margin-bottom: 20px;
		margin-top: auto ;
		margin-right: 25px; 

		border: 1px solid #ccc;
		float: left;
		width: 400px;
		background-color: white;
		box-shadow: 0 8px 16px 8px rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.2);

	}		

</style>
</head>

<body>
	<?php include 'menu.php';?>

	<div class="container col-lg-12">
		<p class="curiosidade" align="center" style="font-family: 'Montserrat', sans-serif;font-size: 5em;color: black"><b>Curiosidades</b></p>

		<!-- Lista todas as curiosidades -->
		<?php while ($dado = mysqli_fetch_array($resulte)) { ?>
		
		<!-- Foto -->
		<div class="gallery" style="margin-left: 15px;">
			<?php echo "<img src='upload/".$dado["foto"]."' width='400' height='200'>";	?>

			<!-- Descrição da curiosidade -->
			<h3 style="color: black;font-family: 'Montserrat', sans-serif;font-size: 13px;"><b><center>
				<?php  echo utf8_encode($dado["descricao"]); ?> </center></b></h3></div>

				<?php } ?>	
				<?php

				$pg_anterior = $pagina - 1;
				$pg_posterior = $pagina + 1;

				?>
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
							<a href="curiosidades.php?pagina=<?php echo $pg_anterior; ?>" aria-label="Previous">
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
								<a href="curiosidades.php?pagina=<?php echo $i; ?>"><?php echo $i; ?></a>
							</li>


							<?php } ?>

							<?php 

							if ($pg_posterior != 0) { ?>

							<li>
								<a href="curiosidades.php?pagina=<?php echo $pg_posterior; ?>" aria-label="Next">
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