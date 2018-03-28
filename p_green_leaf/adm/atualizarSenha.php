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
if ($nivel != 2) {
    
echo "<script>alert('Só para administradores com nível de acesso Geral'); location.href='inicioADM.php';</script>"; exit;

}

?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Gren leaf</title>
	<link rel="icon"  href="../img/fav.jpg">
	<link href="https://fonts.googleapis.com/css?family=Bree+Serif" rel="stylesheet">

	<meta name="viewport" content="width=device-width, initial-scale=1" media="all">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" media="all"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" media="all">

	<script src="jquery.js"></script>

	<style type="text/css">
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

	.fonte{
		font-family: 'Bree Serif', serif;


	}


	
	.tamanho{
		width: 250px;
		font-family: 'Bree Serif', serif;
	}

	button:hover{

		background-color: #00BFFF;
		
	}

	.hover:hover{
		-webkit-animation: swing 1s ease;
        animation: swing 1s ease;
        -webkit-animation-iteration-count: 1;
        animation-iteration-count: 1;
	}

	.novotamanho:focus{
		width: 320px;
		transition: ease-in-out, width .35s ease-in-out;
	}
	
	
</style>

<script type="text/javascript">

	function validaSenha(){ 

		if (formulario.senha.value != formulario.repetir_senha.value){
			alert('Senhas diferentes');
			return false;
		}

</script>



</head>
<body>

	<h1 align="center" class="fonte">Atualizar dados do administrador</h1><br>

	<a href="inicioADM.php"><button  class="form-control tamanho fonte hover">Voltar para página inicial</button></a>

	<form method="post" action="atualizarsenhasql.php" name="formulario" id="formulario">
		<center>
			<label class="fonte">Login</label>
			<input type="text" name="login" class="form-control tamanho fonte novotamanho" required="" minlength="4" maxlength="20">

			<label class="fonte">Nova-senha:</label>
			<input type="password" name="senha" id="senha" class="form-control tamanho novotamanho" required="" minlength="6" maxlength="20">

			<label class="fonte">Repita a nova-senha:</label>
			<input type="password" id="repetir_senha" class="form-control tamanho novotamanho" required="" minlength="6" maxlength="20">		
            <label class="fonte">Novo nível de acesso(Não obrigatório):</label>
            <input style="width: 90px;" type="number" placeholder="1 ou 2"  name="nivel"  class="form-control " min="1" max="2">

			<br>
			<input type="submit" name="verificar" id="verificar" value="Cadastrar" class="form-control tamanho fonte btn btn-success hover" onsubmit="return validaSenha();">

			<div id="resultado"></div>
		</center>
	</form>

</body>
</html>