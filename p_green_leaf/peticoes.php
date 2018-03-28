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

/*$consulta = "SELECT * FROM peticao";
$con = mysqli_query($conexao,$consulta); */

$pagina = (isset($_GET['pagina']))? $_GET['pagina'] : 1;

$resultado_curiosidade = "SELECT * from peticao"; //Seleciona todos os vídeos
$resultado_curio = mysqli_query($conexao, $resultado_curiosidade); //Busca no banco de dados
$total_curiosidade = mysqli_num_rows($resultado_curio); // Ver quantas linhas tem
$quantidade_itens = 6; // Quantidade de vídeos que vai ser exibido por páginas
$numero_paginas = ceil($total_curiosidade/$quantidade_itens); // Dividir as páginas 
$inicio = ($quantidade_itens*$pagina)-$quantidade_itens;
$result = "SELECT* from peticao limit $inicio,$quantidade_itens";
$resulte = mysqli_query($conexao, $result);
$total = mysqli_num_rows($resulte);

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="icon"  href="img/fav.jpg">
	<title>Petições</title>
	<style type="text/css">

	div.gallery {
		margin: 10px;
		border: 1px solid #ccc;
		float: left;
		width: 380px;
		background-color: white;
		box-shadow: 0 8px 16px 8px rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.1);
		font-size: 18px;
	}

	div.desc {
		padding: 25px;
		text-align: justify;
	}
</style>



<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" media="all">

<link rel="stylesheet" type="text/css" href="css/index.css" media="all">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js" media="all"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" media="all"></script>
<script src="jquery.js"></script>

<style type="text/css">

@media only screen and (max-width: 500px) {
	.galery{
		background-color: red;
	}
}

#btn{
	box-shadow: 0 8px 16px 8px rgba(0,0,0,0.1), 0 6px 10px 0 rgba(0,0,0,0.1);
	width: 200px;
	height: 50px;
	color: white;
	border-radius: 250px;
	font-family: 'Montserrat', sans-serif;
	background-color: #2E8B57;
	margin-right: 30px;
	margin-top: -40px;
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

<body >



	<!-- Menu-->
	<?php include 'menu.php' ?>


	<p class="curiosidade fonte" align="center" style="font-size: 5em;font-family: 'Montserrat', sans-serif; "><b>Petições</b></p>

	<button id="btn" class="swing btn btn-default" style="float: right;">Envie sua petição</button><br><br><br>



	<!-- Lista todas petições que está no banco de dados -->
	<?php while ($dado = mysqli_fetch_array($resulte)) { ?>


	<div id="principal" style="margin-left: 73px;">
		<div class="gallery">

			<?php echo "<img  src='upload/".$dado["foto"]."' alt='Foto de exibição' width='378' height='200' />"; ?>

			<div class="desc" style="height: 180px;"><b class="fonte" style="font-size: 1em; margin-left: 20px;font-family: 'Montserrat',sans-serif; "><?php echo utf8_encode($dado["titulo"]) ?></b>
				<br><br>
				<b><a style="font-family: 'Montserrat',sans-serif;color:black" target="_blank" href="<?php $link = $dado["link"]; echo $link ?>"><span class="glyphicon glyphicon-pencil"></span> Clique aqui para assinar</a></b>
			</div>

		</div>


	</div>


	<?php } ?>

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
                    <a href="peticoes.php?pagina=<?php echo $pg_anterior; ?>" aria-label="Previous">
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
                        <a href="peticoes.php?pagina=<?php echo $i; ?>"><?php echo $i; ?></a>
                    </li>


                    <?php } ?>

                    <?php 

                    if ($pg_posterior != 0) { ?>

                    <li>
                        <a href="peticoes.php?pagina=<?php echo $pg_posterior; ?>" aria-label="Next">
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