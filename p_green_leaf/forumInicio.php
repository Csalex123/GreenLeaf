<?php 


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

include('conexao.php');



//verifica a página atual caso seja informada na URL, senão atribui como 1ª página 
$pagina = (isset($_GET['pagina']))? $_GET['pagina'] : 1; 



  //seleciona todos os itens da tabela publicacao
$resultado_publicacao = "SELECT *,usuario.nome as nomeUsuario, usuario.foto as fotoUsuario, publicacao.id_publicacao as id_publicacao FROM publicacao inner join usuario on publicacao.id_usuario = usuario.id_usuario ORDER BY data_hora DESC"; 

$resultado_publi = mysqli_query($conexao, $resultado_publicacao);

   //Contar o total de cursos
$total_publicacoes = mysqli_num_rows($resultado_publi);


   //Seta a quantidade de itens por pagina
$quantidade_pagina = 5;

   //calcular o número de página necessárias para aparesentar as publicações
$num_paginas = ceil($total_publicacoes/$quantidade_pagina);


	//Calcular o início da visualização
$inico = ($quantidade_pagina*$pagina)-$quantidade_pagina;



	//Selecionar as publicações a serem apresentada na página
$result_publicacao = "SELECT *,usuario.nome as nomeUsuario, usuario.foto as fotoUsuario, publicacao.id_publicacao as id_publicacao, usuario.sexo as sexo, usuario.descricao descricao, usuario.data_nascimento as data_nascimento, publicacao.id_usuario as id_usuarioPublicacao FROM publicacao inner join usuario on publicacao.id_usuario = usuario.id_usuario ORDER BY data_hora DESC limit $inico, $quantidade_pagina
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
			box-shadow: 0 8px 16px 8px rgba(0,0,0,0.4), 0 6px 20px 0 rgba(0,0,0,0.4);
			background-color: #FFFAFA;
		}


	</style>

	<script>
		function recarregar() {
			location.reload();
		}

		function perguntaComentario(){ 

			if (!confirm('Tem certeza que deseja apagar este comentário?')){ 
				return false;
			}else{

				document.seuformulario.submit();
			}


		} 


		function perguntaPublicacao(){ 

			if (!confirm('Tem certeza que deseja apagar esta publicação?')){ 
				return false;
			}else{

				document.seuformulario.submit();
			}


		} 
		
	</script>

	<style type="text/css">

		input#procurar:focus {
			width: 400px;
		}


	</style>

</head>
<body >


	<?php include 'menu.php' ?>

	<header>
		<h1 align="center" id="forum" style="font-family: 'Montserrat', sans-serif; font-size: 5.5em;"><b>Fórum</b></h1>
	</header>

	<div>
		<form class="navbar-form navbar-right"  action="Filtro.php" method="GET" style="margin-right: 20px; margin-left: 20px; margin-top: -20px;">
			<div class="input-group ">
				<input style="box-shadow: 0 8px 25px 8px rgba(0,0,0,0.1), 0 6px 10px 0 rgba(0,0,0,0.1)"; type="text" class="form-control" style="float: center; " name="pesquisar"  autocomplete="" id="procurar" placeholder="Filtre por assunto">
				<div class="input-group-btn" ">

					<button class="btn btn-default hover"  type="submit">
						<i class="glyphicon glyphicon-search" ></i>
					</button>

				</div>
			</div>
		</form>

	</div>




	<br><br><br>

	<style type="text/css">
		.buttonForum{
			position: relative; 
			color: #4F4F4F;
			border-radius: 30px;
			background-color: white; 
			font-size: 1.3em;
			width: 250px;
			height: 45px; 
			font-family: 'Montserrat', sans-serif;
		}

		#secao{
			padding: 20px 14px
			;margin: 0 20px 20px 40px;
			border: 2px solid #BEBEBE;
			border-radius: 15px;
			background-color: #2E8B57 
		}

		

	</style>
	<div class="container col-sm-4">
		<div >
			<section id="secao" style="box-shadow: 0 8px 25px 8px rgba(0,0,0,0.2), 0 6px 10px 0 rgba(0,0,0,0.1)";>

				<center>	



					<a href="forumUsuario.php"><button class="btn btn-default buttonForum" class="btn btn-default"><span class="glyphicon glyphicon-duplicate"></span><b> Minhas Publicações</b></button></a>
					<br><br>

					<a href="forumPublicacao.php" ><button class="btn btn-default buttonForum"   class="btn btn-default"><span class="glyphicon glyphicon-pencil"></span><b> Fazer uma Publicação</b></button></a>
					<br><br>

					<button  onclick="recarregar();"  class="btn btn-default buttonForum"><span class="glyphicon glyphicon-refresh"></span><b>  Atualizar Página</b>
					</button>
					<br><br>



					<button type="button" class="btn btn-default buttonForum" data-toggle="collapse" data-target="#demo"><span class="glyphicon glyphicon-search"></span><b> Filtros disponíveis</b>
					</button>



					<br><br><br>



					<div class="collapse" id="demo">
						<ul class="nav nav-pills nav-fill " id="filtro">
							<label  style="color: blue; font-size: 1.3em ; font-family: 'Montserrat', sans-serif";>Lista de Filtros para serem pesquisado na barra de pesquisa: </label><br><br>
							<li class="nav-item fonte" style="font-family: 'Montserrat', sans-serif";>
								Animais
							</li><br><br>
							<li class="nav-item fonte" >
								Reciclagem e Meio Ambiente
							</li><br><br>
							<li class="nav-item fonte" >
								Fauna
							</li><br><br>
							<li class="nav-item fonte" >
								Animais em Extinção
							</li><br><br>
							<li class="nav-item fonte" >
								Ecossistemas
							</li><br><br>
							<li class="nav-item fonte" >
								Reflorestamento
							</li><br><br>
							<li class="nav-item fonte" >
								Poluição ambiental
							</li><br><br>
							<li class="nav-item fonte" >
								Aquecimento Global
							</li><br><br>
							<li class="nav-item fonte" >
								Desflorestamento e suas consequências
							</li><br><br>
							<li class="nav-item fonte" >
								Ambientalismo
							</li><br><br>
							<li class="nav-item fonte" >

								Desmatamento Florestal no Brasil e no mundo
							</li>	
						</ul>
					</li>
				</div>

			</center>		
		</section>
	</div>




</div>
<br>


<div class="container col-sm-7" id="publicacao" style="margin-bottom:  20px; margin-top: -14px;">

	<h2 id="forum" style="color: black; font-size: 3.5em; font-family: 'Montserrat', sans-serif; text-align: center;"> Todas publicações</h2><br><br>

	<?php while($dado = mysqli_fetch_assoc($resulte_publicacao)){ ?>


	<table border="0" style="width: 95%; border-style: solid; border-color: red;">

		<tr>					<!-- assunto da publicacção-->
			<td  class="fonte2" style="margin-left: 5px; font-size: 1.2em; " colspan="3"><b>Assunto: </b>

				<?php 

				$tema = $dado["tema"];

				echo utf8_encode($tema);


				?>

				<td><br><br><br></td>	
			</td>
		</tr>

		<tr style="margin-left: 4px" >

			<!-- Foto do usuário que publicou-->
			<td><a data-toggle="modal" data-target="#<?php echo $dado["id_usuario"];?>"><?php echo "<img  class='img-thumbnail'   src='upload/".$dado["fotoUsuario"]."' alt='Foto de exibição' width='55px' height='40px' />"; ?></a></td>

			<!-- Nome do usuário que publicou-->
			<td style="font-size: 15px; margin-left: 50px;"><a data-toggle="modal" data-target="#<?php echo $dado["id_usuario"];?>"><?php  echo utf8_encode (ucwords(($dado["nomeUsuario"]))); ?> </td>


			<!-- Data da públicação-->
			<td><b>Publicado na data: </b>

				<?php 

				$data = $dado["data_hora"];


				$objDate = DateTime::createFromFormat('Y-m-d H:i:s', $data);
				$data = $objDate->format('d/m/Y');
				$hora = $objDate->format('H:i:s');
				echo $data." <b>às</b> ".$hora;

				?>



			</td>

			<td>
				<?php 
				$id_usuario = $_SESSION['UsuarioID'];
				$id_usuario_publicacao = $dado["id_usuarioPublicacao"];
				$id_publicacao = $dado['id_publicacao'];



				if ($id_usuario == $id_usuario_publicacao) {

					echo "<form name='formulario' method='POST' action='forum/DeletarPublicacaoInicio.php'>

					<input type='hidden' value='$id_publicacao' name='publicacao' />

					<input class='btn btn-danger' type='submit'onclick='return perguntaPublicacao()' value='Excluir'/>

				</form>";


			}



			?>
		</td>





	</tr>

	<!-- *************************************************************************************** -->
	<tr>
		

		<!-- Título da publicação -->
		<td colspan="3" style="font-size: 1.4em; color: #3CB371;"><br><b>Titulo:</b> 

			<?php 
			$titulo = $dado["titulo"];


			echo utf8_encode(ucfirst($titulo)); ?>


		</td>
		<tr>

		</tr>
		<tr >
			<!-- O conteúdo em si do comentário -->
			<td colspan="3" style="font-size: 1.2em;"><p style="text-indent: 2.5em; margin-top: 30px;"><?php  echo nl2br(utf8_encode(ucfirst($dado["conteudo"]))); ?></p></td>
			<td><br><br><br><br></td>
		</tr>




		<!-- *************************************************************************************** -->

		<!-- *************************************************************************************** -->
		<!-- *************************************************************************************** -->

		<!-- Modal para perfil no fórum -->
		<div class="modal fade" id="<?php echo $dado["id_usuario"];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<center><h3 class="modal-title" style="font-family: 'Montserrat', sans-serif;">Perfil</h3></center>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<ul type="none">
							<li><center><?php echo "<img id='perfil' class='img-thumbnail'  src='upload/".$dado["fotoUsuario"]."' alt='Foto de exibição' width='130px' height='80px' />"; ?></center></li>
							<br><br>

							<style type="text/css">
								.fontemodal{
									font-size: 1.2em;
									font-family: 'Montserrat', sans-serif;
								}
							</style>
							<li>
								<label class="fontemodal">Número de postagem que o usuário já fez: </label><br>

								<?php 

								

								$query = "SELECT COUNT(id_publicacao) as total FROM publicacao WHERE publicacao.id_usuario =". $dado['id_usuario']; 

								
								$resultado = mysqli_query($conexao, $query); 
								$values = mysqli_fetch_assoc($resultado); 
								$total = $values['total']; 
								echo $total;
								
								?>
							</li><br>

							<li>
								<label class="fontemodal">Nome:	&nbsp;&nbsp;</label> <?php  echo '<p>'. utf8_encode (ucwords(($dado["nomeUsuario"]))).'</p>'; ?>
							</li>
							<br>
							<li><label class="fontemodal">Sexo:	&nbsp;&nbsp;</label><?php if($dado["sexo"] == "M"){
								echo "<p  style='color: blue; font-family: 'Montserrat', sans-serif;'>Masculino</p>";
							}else {
								echo "<p style='color: #FF1493'; font-family: 'Montserrat', sans-serif;' >Femenino</p>";
							} ?> </li>

							<br>

							<li>
								<label class="fontemodal">Data de nascimento:&nbsp;&nbsp;</label><?php echo '<p>'.date("d/m/Y", strtotime($dado["data_nascimento"])).'</p>'; ?>
							</li>

							<br>
							<li><label class="fontemodal">Descrição do usuário:	&nbsp;&nbsp;</label><?php 
								$descricao = $dado["descricao"]; 

								if ($descricao == '') {
									echo "<p style= color:red;><span class='glyphicon glyphicon-remove'></span> Usuário não quis se expor</p>";
								}else{
									echo '<p>'. utf8_encode(ucfirst (($dado["descricao"]))).'</p>';
								}

								

								?> </li>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-dismiss="modal" >Fechar</button>
							</div>
						</div>
					</div>
				</div>
				<!-- Fim modal -->



				<!-- *************************************************************************************** -->

				<!-- *************************************************************************************** -->

				<!-- *************************************************************************************** -->
				<tr>

					<td colspan="3">
						<br>
						<!-- Botão que irá iniciar uma função do bootstrap collapse e irá exibir todos comentários -->
						<button style="background-color: rgba(0 ,191, 255,0.2);;" type="button" class="btn btn-default" data-toggle="collapse" data-target="#<?php  echo utf8_encode($dado["id_publicacao"]); ?>">Mostrar comentários</button>
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

						//Buscando todos os dados do comentário e guardando na variável consultaComentário
							$consultaComentario = "SELECT comentario.data_hora as dtComentario,  comentario.conteudo as conteudoComentario, usuario.nome as nomeUsuario, usuario.foto as fotoUsuario2, comentario.id_comentario as id_comentario, comentario.id_usuario as id_usuario from ((comentario inner join  publicacao on comentario.id_publicacao = publicacao.id_publicacao) inner join usuario on comentario.id_usuario = usuario.id_usuario) where comentario.id_publicacao = '$id_publicacao' ORDER BY comentario.data_hora DESC ";



						//Fazendo a consulta do SELECT no banco de dados 
							$con2 = mysqli_query($conexao,$consultaComentario) or die (mysqli_erro());

						//Estrutura para pegar todos comentários
							while($dado2 = mysqli_fetch_assoc($con2)){ 



								?>
								<table border="0" style="width:70%; float: right;" >

									<tr>
										<!-- Foto do usuário que postou o comentário -->
										<td><?php echo "<img   class='img-thumbnail'  src='upload/".$dado2["fotoUsuario2"]."' alt='Foto de exibição' width='55px' height='40px' />"; ?>
										</td>



										<td><br><br><br><br><br></td>

										<!-- Nome do usuário que postou o comentário -->
										<td>
											<b ><a data-toggle="modal" data-target="#<?php echo $dado2["id_usuario"];?>"><?php  echo utf8_encode (ucwords(($dado2["nomeUsuario"]))); ?></a>
											</b>
										</td>

										<!-- Data que comentário foi postado -->

										<td>

											<?php 

											$data = $dado2["dtComentario"];


											$objDate = DateTime::createFromFormat('Y-m-d H:i:s', $data);
											$data = $objDate->format('d/m/Y');
											$hora = $objDate->format('H:i:s');
											echo $data." <b>às</b> ".$hora;

											?>
										</td>


										<!-- Opção de apagar o comentário -->
										<td>
											<?php 
											$id_usuario = $_SESSION['UsuarioID'];
											$id_usuario_comentario = $dado2["id_usuario"];
											$id_comentario = $dado2['id_comentario'];



											if ($id_usuario == $id_usuario_comentario) {

												echo "<form name='formulario1' method='POST' action='forum/deletarcomentarioUsuario.php'>

												<input type='hidden' value=$id_comentario name='comentario' />

												<input class='btn btn-danger' type='submit'onclick='return perguntaComentario()' value='Excluir'/>

											</form>";


										}



										?>
									</td>

								</tr>

								<tr>
									<!-- O comentário em si está aqui -->
									<td colspan="6"><?php  echo nl2br(utf8_encode($dado2["conteudoComentario"])); ?> <br><br>

										<!-- Colocando uma linha para separar cada comentário -->
										<hr style="height:4px; border:none; color:#606060; background-color:white; margin-top: 0px; margin-bottom: 0px; border-style: inset;"/>
									</td>

								</tr>

							</table>

							<!-- *************************************************************************************** -->

							<!-- *************************************************************************************** -->

							<!-- *************************************************************************************** -->


							


							<!-- *************************************************************************************** -->

							<!-- *************************************************************************************** -->

							<!-- *************************************************************************************** -->
							<?php } ?>

							<table border="0" style="width:90%; float: right;">
								<tr><td><br><br><br></td></tr>
								<tr>
									<style type="text/css"></style>
									<td>
										<!-- Campo de formulário pra enviar um novo comentário -->
										<form action="forum/inserircomentario.php"  method="post" onsubmit="alterarValor();">

											<textarea rows="4" cols="45" wrap="hard" class="form-control" minlength="1" required="" name="conteudo" placeholder="Escreva um comentário "></textarea>

											<input type="hidden" id="id_publicacao" name="id_publicacao" value="<?php  echo $dado["id_publicacao"]; ?>" /><br>

											<input class="btn btn-default" type="submit" value="Enviar" style="float: right;">
											<br><br>
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
						<a href="foruminicio.php?pagina=<?php echo $pagina_anterior; ?>" aria-label="Previous">
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
							<a href="foruminicio.php?pagina=<?php echo $i; ?>"><?php echo $i; ?></a>
						</li>


						<?php } ?>

						<?php 

						if ($pagina_posterior != 0) { ?>

						<li>
							<a href="foruminicio.php?pagina=<?php echo $pagina_posterior; ?>" aria-label="Next">
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
				<footer  style="margin-top: 20px; margin-bottom: 10px;">
					<div  container-fluid navbar-bottom" >
						<center>

							<b align="right" style="color: black;">&nbsp; &nbsp;&nbsp; Copyright Green Leaf - 2018  &copy;</b>
						</div>
					</center>
				</footer>



			</div>




		</body>
		</html>