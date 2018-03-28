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

?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="icon"  href="img/fav.jpg">
	<title>Sobre o Green Leaf</title>
	<meta name="viewport" content="width=device-width, initial-scale=1" media="all">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" media="all">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js" media="all"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" media="all"></script>
	<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
	<script src="jquery.js"></script>

</head>
<body>

	<?php include 'menu.php'; ?>

		<style type="text/css">
			.fonteSobre{
				font-family: 'Montserrat', sans-serif;
				font-size: 1.4em;	
				text-indent: 2em;
			}
		</style>
	<center><p style="font-family: 'Montserrat', sans-serif;font-size: 4em;"><strong>Sobre o Green Leaf</strong>


		<p class="fonteSobre">O projeto Green Leaf foi desenvolvido por alunos do Instituto Federal de Ciência e Tecnologia de Pernambuco (IFPE), campus Jaboatão dos Guararapes. São eles: Alex Ricardo, Chirleny França, Gleice Kelly e Marcone Alberto. Todos cursistas do curso Técnico em Informática para Internet. </p>

		<p class="fonteSobre">Não apenas com a intenção de criar um ambiente eletrônico, mas também de conscientizar, o site Green Leaf tomou forma. Os estudantes tem consciência de que uma vida com atitudes ecologicamente corretas fazem da vivência humana, um existência mais leve.</p>

		<p class="fonteSobre">Para a atualidade, significa um planeta mais limpo, para as futuras gerações um planeta habitável.</p>

		<p class="fonteSobre">Cuidar de noso planeta é uma questão de necessidade!</p>

		<br><br>

			<img style="align-items: center;"   src="img/agua.jpg" class="img-responsive img-thumbnail" width="600" height="170" >
		<br><br>


	</center>

	<footer >
		<div  container-fluid navbar-bottom" >
			<center>
				<b align="right" style="color: black;">&nbsp; &nbsp;&nbsp; Copyright Green Leaf - 2018 &copy;</b>
			</div>
		</center>

	</footer>

</body>
</html>