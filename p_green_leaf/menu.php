<?php 
require ('conexao.php');
if(!isset($_SESSION)) // Verifica se existe alguma sessão. Senão existir, a função cria uma
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

$id_usuario = $_SESSION['UsuarioID'];// Pega o Id do usuário 

$query =  mysqli_query($conexao, "SELECT  * FROM usuario WHERE id_usuario = '$id_usuario'  LIMIT 1");// Seleciona todos dados do usuário que está registrado no banco de dados

$resultado = mysqli_fetch_assoc($query);// Array que guarda todos dados do usuário

//Guarda todos dados do usuário em session
$_SESSION['local'] = $resultado['foto'];  //Guarda foto
$_SESSION["nome2"] = $resultado['nome'];	//Guarda nome
$_SESSION["senha2"] = $resultado['senha'];	//Guarda senha 
$_SESSION["data_nascimento2"] = $resultado['data_nascimento']; //....
$_SESSION["sexo2"] = $resultado['sexo']; //.....
$_SESSION["email2"] = $resultado['email']; //.....
$_SESSION["descricao"] = $resultado['descricao'];

ucwords($_SESSION["nome2"]);// altera o nome do usuário para maiúscula

?>
<script type="text/javascript">
	
	//Funcação para deixar todas letras maiúscula quando estiver digirando
	function alteraMaiusculo3(){
		var valor = document.getElementById("campo").email;
		var novoTexto = valor.value.toUpperCase();
		valor.value = novoTexto;
	}

	


</script>



<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="icon"  href="img/fav.jpg">
	<title>Green Leaf</title>
	
	<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
	<!-- Importando o Bootstrap, CSS e jquery-->
	<meta name="viewport" content="width=device-width, initial-scale=1" media="all">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" media="all">
	<link rel="stylesheet" type="text/css" href="css/index.css">
	<link rel="stylesheet" type="text/css" href="css/menu.css" media="all">

	
	<script src="jquery.js"></script>

	<style type="text/css">
		img:hover{
      -webkit-transform: scale(1.3);
      -webkit-transition: all .4s ease-in;
    }
	</style>

</head>

<body>

	<!-- Menu -->

	<nav class="navbar navbar-inverse" style="margin-right: 0px;border: none;padding: 3px 0px;background: #2E8B57;">
		<div class="container-fluid"  >
			<div class="navbar-header"  >
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#barra">
					<!-- Menu responsivo -->
					<span class="sr-only">Alternar navegação</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span> 
				</button>

				<!-- logo -->
				<a href="paginainicial.php" data-toggle="tooltip" title="Clique aqui para ir ao inicio da página"><img src="img/OP(branco).png" width="50" height="50" style="margin-top: 5px;"></a>

			</div>


			<!-- Menu -->
			<div class="collapse navbar-collapse" id="barra" style="margin-top: 3px" >
				<ul class="nav navbar-nav" >

					<!-- Educação, Inicio, Multímidia e forum do menu -->
					<li><a href="paginainicial.php" class="btn links" data-toggle="tooltip" title="Clique aqui para ir ao inicio da página" ><span class="glyphicon glyphicon-home" id="inicio"></span><b> INÍCIO </b></a></li><!-- Bloco de início. Icone importado da internet 'glyphicon-home' -->

					<li><a href="multimidia.php" class="btn links" data-toggle="tooltip" title="Clique aqui para ir a Multimídia"><span class="glyphicon glyphicon-picture"></span> <b>MULTIMÍDIA</b></a></li><!-- Bloco Multimídia. Icone importado da internet 'glyphicon-picture' -->

					<li><a href="educacao.php" class="btn links" data-toggle="tooltip" title="Clique aqui para ir a parte de Educação"><span class="glyphicon glyphicon-education"></span><b>EDUCAÇÃO</b></a></li><!-- Bloco Educação. Icone importado da internet 'glyphicon-education' -->

					<li><a href="peticoes.php" class="btn links " data-toggle="tooltip" title="Clique aqui para ir a Petições"><b><span class="glyphicon glyphicon-pencil"></span> PETIÇÕES</b></a></li>


					<li><a href="forumInicio.php" class="btn links" data-toggle="tooltip" title="Clique aqui para ir ao Fórum" ><span class="glyphicon glyphicon-text-size"></span> <b>FORUM</b></a></li>

					<li><a href="sobre.php" class="btn links" data-toggle="tooltip" title="Clique aqui para saber mais sobre o Green Leaf"><span class="glyphicon glyphicon-search"></span> <b>SOBRE</b></a></li>


					<!-- Mensagem de bem-vindo -->
					<li style="font-size: 1.3em; margin-top: 13px; margin-left: 8px; color: white; font-family: 'Montserrat', sans-serif;  "><b>Olá! Seja bem-vindo(a) ao Green Leaf , </b></li>

					<li ><a href="#"  data-toggle="modal" data-target="#myModal" class="dropdown-toggle" style="font-size: 16px; margin-top: -8px; font-family: 'Montserrat', sans-serif;">

						<span style="margin-right: 2px"><?php $foto = $_SESSION["local"];//Guarda o nome da foto que está registrada no banco de dados.

						echo "<img class='img-circle' src='upload/".$foto."' alt='Foto de exibição' width='45px' height='38px' />"; // Imprime a foto do usuário ?></span>

						<?php echo utf8_encode(ucwords($_SESSION['nome2'])); //Imprime o nome do usuário ?></a></li>
					</ul>


				</ul>


				<ul class="nav navbar-nav navbar-right" style="margin-left: -50px;">

					<li ><a style="font-size: 17px; margin-left: -80px; font-family: 'Montserrat', sans-serif;" href="sair.php"   class="dropdown-toggle"  style="font-size: 18px;"><span class="glyphicon glyphicon-log-out"></span>
					Sair </a>	
				</ul>    
			</li>
		</div>
	</div>
</nav>




<!-- Janela modal do boostrap -->

<div id="myModal" class="modal fade" role="dialog"  data-backdrop="static">
	<div class="modal-dialog">

		<!-- Modal content-->
		<div class="modal-content " >
			<div class="modal-header" >
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<div class="modal-header ">
					<h3 class="modal-title"  style="text-align: center; font-family: Arial; color: blue; font-family: 'Montserrat', sans-serif;">Perfil</h3>
				</div > <br>

				<style type="text/css">
				img#perfil{
					box-shadow: 0 8px 16px 8px rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.2);
				}
			</style>

			<center>
				<?php  
				$foto = $_SESSION["local"];//Guarda o nome da Foto 

				//Imprime a foto do usuário que estiver logado.
				echo "<img id='perfil' class='img-thumbnail' src='upload/".$foto."' alt='Foto de exibição' width='180' height='150' />"; ?> <br><br>

			</center>
			
			<form method="post" enctype="multipart/form-data" action="atualizarDados.php">

				<input type="file"  name="foto"  accept="image/*">
				<input type="submit" class="btn btn-default hover" value="Enviar a imagem" name="submit" style="float: right;">

			</form> <br>

		</div>
		
		<div class="modal-body">

			<style type="text/css">
			.largura{
				width: 185px;
				font-size: 1.1em;
			}

			.hover:hover{
				-webkit-transform: scale(1.2);
				-ms-transform: scale(1.2);
				transform: scale(1.2);
				background-color: #00BFFF;
			}
		</style>

		<!-- Função que perguntar antes de enviar os dados de alterar nome -->
		<script type="text/javascript">
			function alterarNome(){ 

				if (!confirm('Tem certeza que deseja alterar seu nome <?php echo utf8_encode(ucwords($_SESSION["nome2"])); ?>?')){ 
					return false;
				}else{
					document.seuformulario.submit();

				}
			}

		</script>

		<!-- formulário para alterar nome -->
		<form method="post" action="atualizardados/atualizarnome.php">	

			<p ><label style="font-family: 'Montserrat', sans-serif;"> Seu nome: </label> <input id="nome" required="" onkeyup="alteraMaiusculo();" class="form-control largura" placeholder="Digite um novo nome e sobre nome" type="text" name="nome" maxlength="16"  value="<?php echo utf8_encode(ucwords($_SESSION["nome2"])); ?>">  </p>

			<input type="submit" onclick="return alterarNome();" class="btn btn-default hover" value="Alterar nome" style="float: right;">

		</form><br><br>


		<!-- ************************************************************************************************ -->

		<script type="text/javascript">
			function alterarData(){ 

				if (!confirm('Tem certeza que deseja alterar sua data de nascimento <?php echo utf8_encode(ucwords($_SESSION["nome2"])); ?>?')){ 
					return false;
				}else{
					document.seuformulario.submit();

				}
			}

		</script>
		
		<!-- formulário para alterar data de nascimento -->
		<form method="post" action="atualizardados/atualizardata.php">
			<p><label style="font-family: 'Montserrat', sans-serif;"> Sua data de nascimento: </label> <input id="data" required=""  class="form-control largura" style="width: 17 0px;" type="date" name="data_nascimento" value="<?php echo $_SESSION["data_nascimento2"]; ?>">  </p>

			<input type="submit" onclick="return alterarData();" class="btn btn-default hover" value="Alterar data de nascimento" style="float: right;" >

		</form><br><br>


		<!-- ************************************************************************************************ -->

		<script type="text/javascript">
			function alterarEmail(){ 

				if (!confirm('Tem certeza que deseja alterar seu email <?php echo utf8_encode(ucwords($_SESSION["nome2"])); ?>?')){ 
					return false;
				}else{
					document.seuformulario.submit();

				}
			}

		</script>


		<!-- formulário para alterar Email -->
		<form method="post" action="atualizardados/atualizaremail.php" id="campo">
			<p><label style="font-family: 'Montserrat', sans-serif;"> Seu e-mail: </label> <input required="" id="email" onkeyup="alteraMaiusculo3()" class="form-control largura" style="width: 300px;" placeholder="Digite um novo e-mail" size="45" type="email" name="email" maxlength="50" value="<?php echo utf8_encode(strtoupper($_SESSION["email2"])); ?>">   </p>

			<input type="submit" onclick="return alterarEmail();" value="Alterar email" class=" hover btn btn-default" style="float: right;" >
		</form><br><br>


		<!-- ************************************************************************************************ -->

		<script type="text/javascript">
			function alterarSenha(){ 

				if (!confirm('Tem certeza que deseja alterar sua senha <?php echo utf8_encode(ucwords($_SESSION["nome2"])); ?>?')){ 
					return false;
				}else{
					document.seuformulario.submit();

				}
			}

		</script>

		<!-- formulário para alterar senha -->
		<form method="post" action="atualizardados/atualizarsenha.php">
			<p><label style="font-family: 'Montserrat', sans-serif;"> Sua senha: </label> <input required="" class="form-control largura" type="password" maxlength="13" minlength="6" placeholder="Digite uma nova senha" name="senha" value="<?php echo base64_decode($_SESSION["senha2"]); ?>"> </p>

			<input type="submit" onclick="return alterarSenha();" value="Alterar senha"  class="btn btn-default hover" style="float: right;">
		</form><br><br>

		<!-- ************************************************************************************************ -->


		<script type="text/javascript">
			function alterarSexo(){ 

				if (!confirm('Tem certeza que deseja alterar sue sexo  <?php echo utf8_encode(ucwords($_SESSION["nome2"])); ?>?')){ 
					return false;
				}else{
					document.seuformulario.submit();

				}
			}

		</script>

		<!-- formulário para alterar o sexo -->
		<form method="post" action="atualizardados/atualizarsexo.php">
			<p><label style="font-family: 'Montserrat', sans-serif;"> Seu sexo: </label> <?php if($_SESSION["sexo2"] == "M"){
				echo "<i style='color: blue;'>MASCULINO</i>";
			}else {
				echo "<i style='color: #FF1493'; >FEMININO</i>";
			} ?> 

			<br><br>
			<label >Altere seu sexo: </label>

			<label for="M" style="color: blue; font-family: 'Montserrat', sans-serif;">Masculino</label> <input type="radio" id="M" name="sexo" value="M" checked="">

			<label for="F" style="color: #FF1493; font-family: 'Montserrat', sans-serif;">Feminino</label> <input type="radio" id="F" name="sexo" value="F"><br>

			<input type="submit" onclick="return alterarSexo();" value="Alterar sexo" class="btn btn-default hover" style="float: right;">
		</form>




		<!-- ************************************************************************************************ -->

		<script type="text/javascript">
			function descricao(){ 

				if (!confirm('Tem certeza que deseja pôr está descrição no seu perfil <?php echo utf8_encode(ucwords($_SESSION["nome2"])); ?>?')){ 
					return false;
				}else{
					document.seuformulario.submit();

				}
			}

		</script>

		<!-- Descrição do usuário -->
		<form action="atualizardados/atualizardescricao.php" method="post">
			<label style="font-family: 'Montserrat', sans-serif; margin-top: 80px;">Sua Descrição</label>
			<textarea maxlength="300"  name="descricao" required="" minlength="5" rows="5" class="form-control" placeholder="Descreva seu perfil"><?php echo utf8_encode(ucfirst (($_SESSION["descricao"]))); ?> </textarea><br>
			<input type="submit" onclick="descricao();" style="float: right;" class="btn btn-default hover" value="Enviar Descrição">
		</form>



		<!-- ************************************************************************************************ -->

		<script type="text/javascript">
			function pergunta(){ 

				if (!confirm('Tem certeza que deseja desativar sua conta <?php echo utf8_encode(ucwords($_SESSION["nome2"])); ?>?')){ 
					return false;
				}else{
					document.seuformulario.submit();

				}
			}

		</script>


		<!-- opção de deletar a conta Deletar a conta -->
		<form method="post" action="cadastro/deletarusuario.php" name="seuformulario">
			<input style="margin-top: 80px;" type='submit' onclick='return pergunta()' name="desativar" class="btn btn-danger"  value="Desativar contar" >
		</form>


		
	</p>



</div>
<div class="modal-footer">
	<!-- Botão que fecha a modal -->
	<button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
</div>
</div>

</div>
</div>




</body>
</html>