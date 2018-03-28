<?php if(!isset($_SESSION)) 
{ 
	session_start(); 
} 


if (isset($_SESSION['id_adm'])) {
	header("Location: inicioADM.php");
}

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
	.tamanho{
		width: 400px;
		font-family: 'Bree Serif', serif;
	}

	.fonte{
		font-family: 'Bree Serif', serif;
	}


	@-webkit-keyframes swing
{
    15%
    {
        -webkit-transform: translateX(5px);
        transform: translateX(5px);
    }
    30%
    {
        -webkit-transform: translateX(-5px);
       transform: translateX(-5px);
    } 
    50%
    {
        -webkit-transform: translateX(3px);
        transform: translateX(3px);
    }
    65%
    {
        -webkit-transform: translateX(-3px);
        transform: translateX(-3px);
    }
    80%
    {
        -webkit-transform: translateX(2px);
        transform: translateX(2px);
    }
    100%
    {
        -webkit-transform: translateX(0);
        transform: translateX(0);
    }
}
@keyframes swing
{
    15%
    {
        -webkit-transform: translateX(5px);
        transform: translateX(5px);
    }
    30%
    {
        -webkit-transform: translateX(-5px);
        transform: translateX(-5px);
    }
    50%
    {
        -webkit-transform: translateX(3px);
        transform: translateX(3px);
    }
    65%
    {
        -webkit-transform: translateX(-3px);
        transform: translateX(-3px);
    }
    80%
    {
        -webkit-transform: translateX(2px);
        transform: translateX(2px);
    }
    100%
    {
        -webkit-transform: translateX(0);
        transform: translateX(0);
    }
}

.swing:hover
{
        -webkit-animation: swing 1s ease;
        animation: swing 1s ease;
        -webkit-animation-iteration-count: 1;
        animation-iteration-count: 1;
        background-color: #4682B4;
}
	</style>



</head>
<body>
	<center>
		<h1 class="tamanho">LOGIN ADMINISTRATIVO</h1>
	</center>
	<center>
		<form method="post" action="
		validarLoginadm.php">

		<label for="login" class="fonte">Login:</label>
		<input type="text" name="login" id="login" class="form-control tamanho" required="" minlength="4" maxlength="18">

		<label for="senha" class="fonte">Senha:</label>
		<input type="password" id="senha" class="form-control tamanho" name="senha" required="" minlength="6" maxlength="20"> 
		<br>

		<br>
		<input type="submit"  value="Entrar" class="btn btn-default swing tamanho">
	</form>
</center>


</body>
</html>