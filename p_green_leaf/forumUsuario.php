<?php 


if(!isset($_SESSION)) 
{ 
	session_start(); 
} 

  // Verifica se não há a variável da sessão que identifica o usuário
if (!isset($_SESSION['UsuarioID'])) {


      // Redireciona o visitante de volta pro login
	header("Location: index.php"); exit;

}
include('conexao.php');



$id_usuario = $_SESSION['UsuarioID'];

//verifica a página atual caso seja informada na URL, senão atribui como 1ª página 
$pagina = (isset($_GET['pagina']))? $_GET['pagina'] : 1; 



  //seleciona todos os itens da tabela publicacao
$consultaPublicacao = "SELECT *,usuario.nome as nomeUsuario, usuario.foto as fotoUsuario, publicacao.id_publicacao as id_publicacao  FROM publicacao inner join usuario on publicacao.id_usuario = usuario.id_usuario where publicacao.id_usuario = $id_usuario ORDER BY data_hora DESC";

$resultado_publi = mysqli_query($conexao,$consultaPublicacao);

   //Contar o total de cursos
$total_publicacoes = mysqli_num_rows($resultado_publi);


   //Seta a quantidade de itens por pagina
$quantidade_pagina = 5;

   //calcular o número de página necessárias para aparesentar as publicações
$num_paginas = ceil($total_publicacoes/$quantidade_pagina);


	//Calcular o início da visualização
$inico = ($quantidade_pagina*$pagina)-$quantidade_pagina;



	//Selecionar as publicações a serem apresentada na página
$result_publicacao = "SELECT *,usuario.nome as nomeUsuario, usuario.foto as fotoUsuario, publicacao.id_publicacao as id_publicacao FROM publicacao inner join usuario on publicacao.id_usuario = usuario.id_usuario where publicacao.id_usuario = '$id_usuario'   ORDER BY data_hora DESC limit $inico, $quantidade_pagina
";
$resulte_publicacao = mysqli_query($conexao, $result_publicacao);

$total_publicacoes = mysqli_num_rows($resulte_publicacao);





?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="icon"  href="img/fav.jpg">
	<title>Green Leaf</title>

	<link rel="stylesheet" type="text/css" href="css/index.css" media="all">
	<!-- Importando o Bootstrap, CSS e jquery-->

	<meta name="viewport" content="width=device-width, initial-scale=1" media="all">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" media="all">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js" media="all"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" media="all"></script>
	<script src="jquery.js"></script>

	<style type="text/css">
	.fonte{
		font-size: 1.2em;
		color: black;
		display: block;
		position: absolute;

	}

	#publicacao{
		box-shadow: 0 8px 16px 8px rgba(0,0,0,0.6), 0 6px 20px 0 rgba(0,0,0,0.6);
		background-color: #FFFAFA;
	}


	.fonte2{
		font-family: 'Bree Serif', serif;
		font-size: 1.4em;
	}

	a:hover{
		color: red;
	}

	.tamanhoNome{
		font-size: 4em;
	}


</style>


<script>
	function recarregar() {
		location.reload();
	}

	function pergunta(){ 

		if (!confirm('Tem certeza que deseja ir para página de editar publicação?')){ 
			return false;
		}else{
			document.seuformulario.submit();
		}
	}

	function pergunta2(){ 

		if (!confirm('Tem certeza que deseja apagar este comentário?')){ 
			return false;
		}else{
			document.seuformulario2.submit();
		}
	}

	function perguntaPublicacao(){ 

		if (!confirm('Tem certeza que deseja editar esta publicação?')){ 
			return false;
		}else{

			document.seuformulario.submit();
		}


	} 

</script>



</head>
<body>


	<?php include 'menu.php' ?>

		<style type="text/css">
	.buttonForum{
		position: relative; 
		color: #4F4F4F;
		border-radius: 50px;
		background-color: white; 
		font-size: 1.2em;
		width: 300px;
		height: 45px; 
		font-family: 'Montserrat', sans-serif;
	}

	#secao{
		padding: 20px 14px;
		margin: 0 20px 20px 40px;
		border: 2px solid #BEBEBE;
		border-radius: 15px;
		background-color: #2E8B57 
	}



</style>
<div class=" col-sm-4" style="margin-top: 22px;">
	<div >
		<section id="secao" style="box-shadow: 0 8px 25px 8px rgba(0,0,0,0.2), 0 6px 10px 0 rgba(0,0,0,0.1)";>

			<center>	



				<a href="foruminicio.php"><button class="btn btn-default buttonForum" class="btn btn-default"><span class="glyphicon glyphicon-text-size"></span><b> Início do Fórum</b></button></a></a><br><br>
				

				<a href="forumPublicacao.php" ><button class="btn btn-default buttonForum"   class="btn btn-default"><span class="glyphicon glyphicon-pencil"></span><b> Fazer uma Publicação</b></button></a>
				<br><br>

				<button  onclick="recarregar();"  class="btn btn-default buttonForum"><span class="glyphicon glyphicon-refresh"></span><b>  Atualizar Página</b>
				</button>
				<br><br>


		</center>		
	</section>
</div>




</div>



<br><br>





<div class="container col-sm-7" id="publicacao" style="margin-bottom:  20px; margin-top: -12px;">

	<h2 id="forum" style="color: black; font-size: 3.5em; font-family: 'Montserrat', sans-serif; text-align: center;">Minhas publicações</h2><br><br>

	<label class="fontemodal" style="float: right; font-size: 1.3em; color: #008B45;font-family: 'Montserrat',sans-serif;">

		<?php 
		

		

		$query = "SELECT COUNT(id_publicacao) as total FROM publicacao WHERE publicacao.id_usuario =". $resultado['id_usuario']; 


		$resultado = mysqli_query($conexao, $query); 
		$values = mysqli_fetch_assoc($resultado); 
		$total = $values['total']; 

		if ($total == 0) {
			echo "Você ainda não tem nenhuma publicação.";
		}else if($total == 1){
			echo "Você tem 1 publicação";
		}else if($total > 1 ){
				echo "Você tem ".$total." publicações.";
		}
		
		?>
	</label><br><br><br>	


	<?php while($dado = mysqli_fetch_assoc($resulte_publicacao)){ ?>

	<table border="0" style="width: 100%; border-style: solid; border-color: red;">

		<table border="0" style="width: 95%; border-style: solid; border-color: red;">

			<tr>					<!-- assunto da publicacção-->
				<td  class="fonte2" style="margin-left: 5px; font-size: 1.2em;font-family: 'Montserrat', sans-serif;" colspan="3"><b>Assunto: </b>

					<?php 

					$tema = $dado["tema"];

					echo utf8_encode($tema);


					?>

					<td><br><br><br></td>	
				</td>
			</tr>


			<tr style="margin-left: 4px" >
				<!-- Foto do usuário que publicou-->
				<td><?php echo "<img  class='img-thumbnail'   src='upload/".$dado["fotoUsuario"]."' alt='Foto de exibição' width='55px' height='40px' />"; ?></td>

				<!-- Nome do usuário que publicou-->
				<td style="font-size: 22px; margin-left: 50px; color: #008B45;font-family: 'Montserrat', sans-serif;" class="fonte2 tamanhoNome"><b><?php  echo utf8_encode (ucwords(($dado["nomeUsuario"]))); ?></b></td>

				<!-- Data da públicação-->
				<td><b>Publicado na data: </b>

					<?php 

					$data = $dado["data_hora"];


					$objDate = DateTime::createFromFormat('Y-m-d H:i:s', $data);
					$data = $objDate->format('d/m/Y');
					$hora = $objDate->format('H:i:s');
					echo $data." <b>às</b> ".$hora;

					?>

					&nbsp;&nbsp;


					<!-- Ação de deletar a publicação-->
					<button class="btn btn-default"><a style="font-size: 1.2em;" href="javascript: if(confirm('Tem certeza que deseja apagar a publicação ? ')) 
					location.href='forum/deletarpublicacao.php?p=excluir&publicacao=<?php  echo $dado["id_publicacao"]; ?>';">Excluir&nbsp;</a></button>

					<form>
						
					</form>


					<style type="text/css">

					#editar{
						font-size: 1.0em;
						margin-bottom: 30px;
						margin-left: 10px;
					}
				</style>
				<!-- Ação de Editar a publicação-->
				<br><br>
				<form action="forum/editarpublicacao.php" name="seuformulario" method="POST">
					<input type="hidden" name="id_publicacao" value="<?php  echo $dado["id_publicacao"] ?>">
					<input class="btn btn-info" id="editar" onclick='return perguntaPublicacao()' type="submit" value="Editar publicação" >
				</form>
			</td>

		</tr>


		<!-- Título da publicação-->
		<td class="fonte2"  colspan="3" style="font-size: 1.6em; color: #008B45;font-family: 'Montserrat', sans-serif;"><b>Titulo: </b> 

			<?php 
			$titulo = $dado["titulo"];


			echo utf8_encode(ucfirst($titulo)); ?>

		</td>

		<tr></tr>


		<tr ><!-- Conteúdo da publicação -->
			<td class="fonte2" colspan="5" style="font-size: 1.2em;"><p style="text-indent: 2.5em; margin-top: 30px;font-family: 'Montserrat', sans-serif;text-align: justify; "><?php  echo nl2br(utf8_encode(ucfirst($dado["conteudo"]))); ?></p></td>
			<td><br><br><br><br></td>
		</tr>

		<tr>

			<td colspan="3">
				<br>
				<!-- Botão para mostrar comentários-->	
				<button style="background-color: rgba(0 ,191, 255,0.2);"   type="button" class="btn btn-default" data-toggle="collapse" data-target="#<?php  echo utf8_encode($dado["id_publicacao"]); ?>">Mostrar comentários</button>
				<label style="margin-left: 4px;">Quantidade de comentários: 
					<?php 



					$query3 = "SELECT COUNT(id_publicacao) as total FROM comentario WHERE comentario.id_publicacao =".$dado["id_publicacao"]; 


					$resultado = mysqli_query($conexao, $query3); 
					$values = mysqli_fetch_assoc($resultado); 
					$total = $values['total']; 
					echo $total;

					?>

				</label>
				<br><br><br><br>



				<div  id="<?php  echo utf8_encode($dado["id_publicacao"]); ?>" class="collapse">
					<?php

					$id_publicacao = $dado["id_publicacao"];

					$consultaComentario = "SELECT comentario.data_hora as dtComentario,  comentario.conteudo as conteudoComentario, usuario.nome as nomeUsuario, usuario.foto as fotoUsuario2, comentario.id_comentario as id_comentario from ((comentario inner join  publicacao on comentario.id_publicacao = publicacao.id_publicacao) inner join usuario on comentario.id_usuario = usuario.id_usuario) where comentario.id_publicacao = '$id_publicacao' ORDER BY comentario.data_hora DESC ";

					$con2 = mysqli_query($conexao,$consultaComentario) or die (mysqli_erro());


					while($dado2 = $con2->fetch_array()){ 



						?>
						<table border="0" style="width:70%; float: right;" >

							<tr><!-- Imprime foto do usuário que comentou-->
								<td><?php echo "<img   class='img-thumbnail'  src='upload/".$dado2["fotoUsuario2"]."' alt='Foto de exibição' width='68px' height='57px' />"; ?></td>

								<!-- Gambiarra kkk-->
								<td><br><br><br><br><br></td>

								<!-- Data da públicação-->
								<td><b  class="fonte2" ><?php  echo utf8_encode (ucwords(($dado2["nomeUsuario"]))); ?></b>
								</td>

								<td>
									<?php 

									$data = $dado2["dtComentario"];


									$objDate = DateTime::createFromFormat('Y-m-d H:i:s', $data);
									$data = $objDate->format('d/m/Y');
									$hora = $objDate->format('H:i:s');
									echo $data." <b>às</b> ".$hora;

									?>
								</td>

								<td>

									<form name='seuformulario2' method='POST' action='forum/deletarcomentario.php'>

										<input type='hidden' value="<?php  echo $dado2["id_comentario"]; ?>" name='comentario' />

										<input class='btn btn-danger' type='submit'onclick='return pergunta2()' value='Excluir'/>

									</form>

								</td>

								<tr >


									<td  class="fonte2" colspan="6"><?php  echo nl2br(utf8_encode($dado2["conteudoComentario"])); ?>  <br><br>

										<hr style="height:4px; border:none; color:#606060; background-color:white; margin-top: 0px; margin-bottom: 0px; border-style: inset;"/>
									</td>

								</tr>

							</table>
							<?php } ?>

							<table border="0" style="width:90%; float: right;">
								<tr><td><br><br><br></td></tr>
								<tr>
									<style type="text/css"></style>
									<td>
										<form   action="forum/inserircomentario.php"  method="post" onsubmit="alterarValor();">
											<textarea  rows="4" cols="35" wrap="hard" class="form-control fonte2" minlength="1" required="" name="conteudo" placeholder="Escreva um comentário "></textarea>

											<input type="hidden" id="id_publicacao" name="id_publicacao" value="<?php  echo $dado["id_publicacao"]; ?>" /><br>

											<input class="btn btn-default " type="submit" value="Enviar" style="float: right;">
											<br><br><br>
										</form>

									</td>
								</tr>
							</table>
						</div>
					</td>
				</tr>
			</table>
			<?php } ?>


			<?php 
					//Verificar a página anterior e posterior
			$pagina_anterior = $pagina -1;
			$pagina_posterior = $pagina +1;
			?>

			<nav class="text-center">
				<ul class="pagination">
					<?php 

					if ($pagina_anterior != 0) { ?>

					<li>
						<a href="forumusuario.php?pagina=<?php echo $pagina_anterior; ?>" aria-label="Previous">
							<span aria-hidden="true">&laquo;</span>
						</a>

						<?php }else{ ?>	
						<li>
							<span aria-hidden="true">&laquo;</span>
						</li>
						<?php } ?>

					</li>






					<?php for($i = 1; $i < $num_paginas + 1; $i++){ 

						$estilo = "";
						if($pagina == $i) 
							$estilo = "class=\"active\"";


						?>


						<li <?php echo $estilo; ?> >
							<a href="forumusuario.php?pagina=<?php echo $i; ?>"><?php echo $i; ?></a>
						</li>


						<?php } ?>

						<?php 

						if ($pagina_posterior != 0) { ?>

						<li>
							<a href="forumusuario.php?pagina=<?php echo $pagina_posterior; ?>" aria-label="Next">
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


				<!-- Roda pé -->
				<footer >
					<div  container-fluid navbar-bottom" >
						<center>
							<b align="right" style="color: black;">&nbsp; &nbsp;&nbsp; Copyright Green Leaf - 2018 &copy;</b>
						</div>
					</center>
				</footer>

			</div>

			<script src="jquery-3.3.1.min.js"></script>

		</body>
		</html>