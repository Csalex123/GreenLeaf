<?php

if(!isset($_SESSION)) 
{ 
	session_start(); 
} 
include('../conexao.php');

  // Verifica se não há a variável da sessão que identifica o usuário
if (!isset($_SESSION['UsuarioID'])) {
      // Destrói a sessão por segurança
	session_destroy();

      // Redireciona o visitante de volta pro login
	header("Location: ../index.php"); exit;

}

$id_publicacao = intval($_POST['id_publicacao']);


$_SESSION['id_publicacao'] = $id_publicacao;

$query =  mysqli_query($conexao, "SELECT  * FROM publicacao WHERE id_publicacao = '$id_publicacao'  LIMIT 1");// Seleciona todos dados do usuário que está registrado no banco de dados

$resultado = mysqli_fetch_assoc($query);// Array que guarda todos dados do usuário

$_SESSION['titulo'] = $resultado['titulo'];  //Guarda título da publicação
$_SESSION['conteudo'] = $resultado['conteudo'];  //Guarda o conteúdo da publicação





?>
<!DOCTYPE html>
<html style="position: relative;
min-height: 100%;">
<head>  
	<meta charset="utf-8">
	<!-- Importando o Bootstrap, CSS e jquery-->
	<title>Green Leaf</title>
	<link rel="icon"  href="img/fav.jpg">

	<style type="text/css">

	textarea {
		width: 40%;
		height: 150px;
		padding: 12px 20px;
		box-sizing: border-box;
		border: 2px solid #ccc;
		border-radius: 8px;
		background-color: #f8f8f8;
		font-size: 16px;
		resize: none;
		box-shadow: 0 8px 16px 8px rgba(0,0,0,0.1), 0 6px 20px 0 rgba(0,0,0,0.1);
		-webkit-box-sizing: border-box;
		-moz-box-sizing: border-box;
		box-sizing: border-box;



	}

	#enviar{
		height: 43px;
		width: 170px;
		border-radius: 300px;
		border-color: #f8f8f8;
		box-shadow: 0 8px 16px 8px rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.2);
	}

	#assunto{
		margin-bottom: 10px;
	}

	#titulo{
		box-sizing: border-box;
		border: 2px solid #ccc;
		border-radius: 8px;
		background-color: #f8f8f8;
		font-size: 16px;
		resize: none;
		box-shadow: 0 8px 16px 8px rgba(0,0,0,0.1), 0 6px 20px 0 rgba(0,0,0,0.1);
		width: 60%;
		-webkit-box-sizing: border-box;
		-moz-box-sizing: border-box;
		box-sizing: border-box;
	}
	body{

		background-size: 100%;
		background-attachment: fixed;
		background-repeat: no-repeat;
		background-size: cover;
		-webkit-background-size: cover; 
		-moz-background-size: cover; 
		-ms-background-size: cover; 
		-o-background-size: cover; 
	}


	.fonte{
		font-size: 1em;
		color: black;

	}

</style>

<meta name="viewport" content="width=device-width, initial-scale=1" media="all">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" media="all">
<link rel="stylesheet" type="text/css" href="css/index.css" media="all">

<!-- Bootstrap css -->
<link rel="stylesheet" type="text/css" href="css/bootstrap.css">

<!-- CSS materialize --> 
<link rel="styleseet" href="css/materialize.css">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js" media="all"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" media="all"></script>
<script src="jquery.js"></script>



<style type="text/css">


</style>

</head>

<body >
	


	<header>
		<h1 align="center" id="forum" style="font-family: 'Montserrat', sans-serif; font-size: 3.5em;"><b>Edite sua publicação </b></h1>
	</header><br><br>

	<center>

		<form  method="post" action="atualizarpublicacao.php"  onsubmit="return validarTextArea(); ">

			<input type="hidden" name="id_publicacao" value="<?php echo $_SESSION['id_publicacao']; ?>">

			<label style="font-family: 'Montserrat', sans-serif;">Título: </label><input type="text" name="titulo" size="50" id="titulo" required="" value="<?php echo utf8_encode($_SESSION['titulo']); ?>" minlength="5" maxlength="100">

			<p class="caracteres"></p>

			<textarea  maxlength="2000" required=""  wrap="hard" name="comentario" id="comentario" data-toggle="tooltip" title="Digite algo neste campo de texto" placeholder="Escreva algo"><?php echo utf8_encode($_SESSION['conteudo']); ?></textarea><br><br>

		
			
			<br><br><br>

		</div>
	</div>
</div>

<br> 


<center>
	<input style="font-family: 'Montserrat', sans-serif;"" type="submit" class="btn btn-info" data-toggle="tooltip" title="Clique aqui para enviar" value="Atualizar publicação" id="enviar" >

	<input style="font-family: 'Montserrat', sans-serif;"" id="enviar" type="button" class="btn btn-default" value="Voltar" onClick="history.go(-1)">
</center>

</form>


</center>
</div>
</div>



<script type="text/javascript">
  //Contador de caracteres para o campo de conteúdo.
  $(document).on("input", "#comentario", function() {
  	var limite = 2000;
  	var informativo = "caracteres restantes.";
  	var caracteresDigitados = $(this).val().length;
  	var caracteresRestantes = limite - caracteresDigitados;

  	if (caracteresRestantes <= 0) {
  		var comentario = $("textarea[name=comentario]").val();
  		$("textarea[name=comentario]").val(comentario.substr(0, limite));
  		$(".caracteres").text("0 " + informativo);
  	} else {
  		$(".caracteres").text(caracteresRestantes + " " + informativo);
  	}
  });
</script>

<br><br>
<footer >
	<div  container-fluid navbar-bottom" >
		<center>

			<b align="right" style="color: black;">&nbsp; &nbsp;&nbsp; Copyright Green Leaf - 2018 &copy;</b>
		</div>
	</center>

</footer>


<script type="text/javascript">




	function validarTextArea(){

		if(conteudo.comentario.value == '' || conteudo.comentario.value == null ||  conteudo.comentario.value == "Escreva algo") {
			alert("Escreva algum conteudo");
			return false;
		}
	}

	function validarTitulo(){
		if (conteudo.titulo.value = '') {
			alert('Escreva um título')
			return false;
		}
	}


</script>
<!-- Javascript materializa -->
<script src="js/materialize.js"></script>

<!-- Javascript bootstrapp-->
<script src="js/bootstrap.js"></script>
<!-- Jquery -->
<script src= "http://code.jquery.com/jquery-1.12.0.min.js"></script>
</body>
</html>