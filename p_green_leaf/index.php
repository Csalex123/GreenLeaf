<?php if(!isset($_SESSION)) 
{ 
	session_start(); 
} 


if (isset($_SESSION['UsuarioID'])) {
	header("Location: paginainicial.php");
}

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<title>Green Leaf</title>
	<link rel="icon"  href="img/fav.jpg">
	<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">

	<link href="https://fonts.googleapis.com/css?family=Bree+Serif" rel="stylesheet">

	<link href="https://fonts.googleapis.com/css?family=Vast+Shadow" rel="stylesheet">

	<meta name="viewport" content="width=device-width, initial-scale=1" media="all">

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" media="all">

	<link href="https://fonts.googleapis.com/css?family=Rye" rel="stylesheet"> 
	<link rel="stylesheet" type="text/css" href="css/csspaginainicial.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js" media="all"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" media="all"></script>


	<script src="jquery.js"></script>


	<style type="text/css">
	@import url('https://fonts.googleapis.com/css?family=Rancho');
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
		-webkit-animation: swing 0.7s ease;
		animation: swing 0.7s ease;
		-webkit-animation-iteration-count: 0.7s;
		animation-iteration-count: 0.7s;
	}

	.telamodal{
		color: black;
		font-family: 'Montserrat',sans-serif;
	}

		h1{
		
		
		background: linear-gradient(to right, rgb(245, 245, 245), rgb(245, 245, 245));
		margin-right: 20px;
		margin-left: 20px;
		color: white;
	}

</style>

<script language="Javascript">
	function validacaoEmail() {
		if( formulario.tx_email.value=="" || formulario.tx_email.value.indexOf('@')==-1 || document.formulario.tx_email.value.indexOf('.')==-1 ){

			alert( "Preencha campo E-MAIL corretamente!" );
			return false;
		}

	}


	function validaSenha(){ 

		if (formulario.senha.value!= formulario.repetir_senha.value) {
			alert('Senhas diferentes');
			return false;
		}
	} 

</script>

<script type="text/javascript">

	function validarLogin(){
		if (formulario1.nickname-login.value == "" || formulario1.senha-login.value == "" ) {
			alert('Preencha o campo');
			return false;
		}
	}
</script>

</head>


<body style="background-image: url(img/back3.jpg);		
		background-repeat: no-repeat;
		background-size: 100% 120%;">
	
	<div >
		<h1  style="font-size: 12em;font-family: 'Rancho', cursive;color:#228B22; text-align: center"><img src="img/OP(verde).png" height="170" width="200" style="margin-top: -32px; margin-right: 50px; margin-left: -30px;" ><b>Green Leaf</b></h1>
	</div>
	
	<div>
		<center><input type="submit" value="Entrar" class="buttonper btn btn-default swing"  data-toggle="modal" data-target="#login1" style="height: 50px; width: 350px; border-radius: 250px; font-size: 2em;font-family: 'Montserrat', sans-serif;font-weight: bold;color: black; box-shadow: 0 8px 16px 8px rgba(0,0,0,0.1), 0 6px 20px 0 rgba(0,0,0,0.1);" id="login">
		</center>
	</div>
	<div>
		<center>
			<input type="submit" class=" btn btn-default swing" id="cadastrar" data-toggle="modal" data-target="#myModalCadastro"  style="height: 50px; width: 350px; border-radius: 250px; font-size: 2em;font-family:  'Montserrat', sans-serif;font-weight: bold;color: black; box-shadow: 0 8px 16px 8px rgba(0,0,0,0.1), 0 6px 20px 0 rgba(0,0,0,0.1);" value="Cadastre-se">
		</center>
	</div>

	<br>

	<div class="container" >
		
		<center>
			<input type="submit" class="btn btn-info swing" data-toggle="collapse" data-target="#demo" id="quemsomos" style="height: 50px; width: 350px; border-radius: 250px; font-size: 1.9em;font-family: 'Montserrat',sans-serif;color: black;background-color: white;box-shadow: 0 8px 16px 8px rgba(0,0,0,0.1), 0 6px 20px 0 rgba(0,0,0,0.1);font-weight: bold;" value="Quem Somos">
		</center>



		<div id="demo" class="collapse conteudo"  >
			<p style="text-indent: 2em; font-family: 'Montserrat', sans-serif; ">

				O sistema Green Leaf passou a tomar forma a partir do interesse de jovens estudantes sobre sustentabilidade. Mas não apenas isso, mas também o desejo de ajudar e guiar pessoas a terem uma  visão diferenciada.<br><br>A sociedade atual visa o agora, o hoje, e infelizmente, muitas vezes o seu próprio eu. Com ou sem intenção, passam a desaperceber-se de que a visão em sociedade é algo essencial. Essencial tanto para o restante das pessoas que vivem em nosso mundo, quando para o próprio planeta. Ter uma visão sustentável, vai além de reclamar sobre empresas poluentes. Claro que isto deve ser feito, mas para construirmos um futuro e um presente melhor, é necessário que essa mudança comece conosco.<br><br>O simples fato de ir a um supermercado e não usar sacolas de plástico, mas sacolas de tecido (reutilizáveis) ou de preferir guardar o lixo no bolso a jogá-lo na rua faz toda a diferença! Imagine como seria se todos pensassem desta forma? A questão não é o que a sociedade faz, mas o que cada indivíduo faz sozinho. Os pensamentos de ecológico corretos de uma pessoa podem influenciar o de outras tantas. O simples fato de ter educação e não sujar as ruas, já pode ser a influência boa que os outros precisam.<br><br>O Green Leaf, então, trouxe várias ideias para ajudá-lo(a) na missão de construir um mundo melhor para a nossa e próximas gerações. Desde artesanato com materiais reciclaveis a economia de energia. Isto, ajuda não apenas o meio amibiente, mas também seu bolso. Visto que, você pode economizar sua verba e gastá-la com algo que seja mais importante (como passeios em família ou doações para necessitados).<br><br>A sociedade atual precisa que tenhamos voz e atitudes que causem impacto e transformação. Não bastam apenas discursos e expressões, precisamos de atitudes. Cada um de nós é responsável pelo presente e futuro do planeta em que vivemos. Com o intuito de mostrar isso às pessoas, o Projeto Green Leaf ganhou forma.</p> 



			

		
			</div>
		</div>





		<!-- Rodapé -->
		<footer class="footer">
			<center><br><br>
				<b align="right" style="color: black;">&nbsp; &nbsp;&nbsp; Copyright Green Leaf - 2018  &copy;</b>

			</center>
		</footer>



		<!-- Tela modal para login -->
		<div class="modal fade" id="login1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" media="all" data-backdrop="static">

			<!-- definindo o tamanho de janela modal -->
			<div class="modal-dialog modal-sm" role="document" >
				<div class="modal-content">
					<div class="modal-header" style="background-color:#9FB6CD;">

					<!-- Botão "X" que tem a funcionalidade fechar a janela modal  -->

					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

					<!-- Cabeçalho e icone de usuário -->
					<img src="img/usuariologin.png " height="42" width="42" align="right">
					<h2 class="modal-title telamodal" id="id_login" >Efetuar login</h2>
				</div>
				<div class="modal-body">



					<!-- Formulário de login -->
					<form class="form-inline form-group" method="post" action="Cadastro/verificarLogin.php" name="formulario1"  >

						<!-- campo de texto para por o login -->

						<div class="input-group">
							<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>

							<input style="font-family: 'Montserrat', sans-serif;" type="text" class="form-control" name="usuario"  id="nickname-login" placeholder="Digite seu email..." required="" maxlength="50" minlength="6" />
						</div>

						<br><br>
						<!-- campo de texto para por a senha -->

						<div class="input-group" >
							<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>

							<input type="password" class="form-control"  required="" id="senha-login" placeholder="Digite sua senha..." maxlength="13" name="senha" minlength="6" />
						</div> 

						<br><br>                                     
						<div class="checkbox">
							<label>
								<!-- caixa alternativa para manter o usuário conectado -->
								<input style="font-family: 'Montserrat', sans-serif;"	 type="checkbox"> Mantenha-me conectado 
							</label>
						</div>
						<br><br>

						<!-- Botão para submeter o login-->
						<input type="submit"  class="btn btn-info" data-toggle="tooltip" title="Clique aqui para logar" value="Entrar" name="entrar" onclick="return validarLogin();" />

						<!-- Botão de cancelar -->
						<button type="button" class="btn btn-default" data-dismiss="modal" data-toggle="tooltip" title="Clique aqui para fechar a janela">Cancelar</button><br><br>

					</form>


				</div>

			</div>

		</div>

	</div>



	<!-- Tela modal para cadastro -->
	<div class="modal fade" id="myModalCadastro" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-backdrop="static" >

		<div class="modal-dialog modal-xs" role="document">

			<div class="modal-content">

				<div class="modal-header" style="background-color:#9FB6CD;">

				<!-- Botão "X" que tem a funcionalidade fechar a janela modal  -->

				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

				<!-- Cabeçalho e icone de usuário -->
				<img src="img/usuariocadastro.png " height="42" width="42" align="right">
				<h2 class="modal-title" id="id_cadastro" ">Faça seu cadastro</h2>

			</div>
			<!-- Corpo do modal, que irá conter o formulário de cadastro -->
			<div class="modal-body">


				<form action="Cadastro/validacaoCadastro.php" method="POST" enctype="multipart/form-data" name="cadastro" class="form-inline form-group" name="formulario" onsubmit="return validaSenha()" >

					<!-- definindo o formulário de cadastro -->
					<label  for="nickname" class="telamodal" >Nome de Usuário: </label><br>
					<input  name="nome" type="text" required maxlength="15"  minlength="4" class="form-control" id="nickname"  placeholder="Digite um nickname..." size="17"  /><br>

					<label  for="senha" class="telamodal" >Senha:</label><br>
					<input name="senha" id="senha" type="password" class="form-control" id="senha" required placeholder="Digite uma senha" size="17"  maxlength="13" minlength="6" /><br>

					<label  for="senha2" class="telamodal">Confirme sua senha: </label><br>
					<input id="repetir_senha" type="password" class="form-control" required id="senha2" placeholder="Repita sua senha" size="17"  maxlength="13" minlength="6" /><br>

					<label  for="email" class="telamodal">E-mail: </label><br>
					<input  name="tx_email" id="tx_email"  type="text" required class="form-control" placeholder="Digite seu e-mail" size="45" maxlength="50" minlength="6" /><br>

					<label for="data" class="telamodal" >Data de nascimento: </label><br>
					<input type="date" name="outra_data" id="outra_data" maxlength="10"  required class="form-control" size="12" placeholder="Data de nascimento" />
					<br><br>


					<label for="sexo" class="telamodal">Gênero:</label><br>	
					<input type="radio" id="M" name="sexo" value="M" checked=""><label class="telamodal" for="M"> Masculino </label><br>
					<input type="radio" id="F" name="sexo" value="F"><label class="telamodal" for="F">Feminino </label>
				
							<br><br>

					<div class="checkbox" >
						<label class="telamodal">Eu aceito os termos de uso <input type="checkbox" required="" /> 
						</label>
						<div></div><br>

						<label  class="telamodal"  data-toggle="collapse" data-target="#termos" ><b style="color: black;">Termos</b></label>

						<div id="termos" class="collapse "  >
							<ul type="none"><br>
								<li>Respeitar todos os usuários</li>
								<li>Não xingar ninguém</li>
								<li>Não postar coisas impróprias</li>
							</ul>
						</div>


					</div> <br><br>

					<input type="submit" class="btn btn-success butaoredendo telamodal" data-toggle="tooltip" title="Clique aqui para realizar o cadastro" name="Cadastrar" value="Cadastrar" onclick="return validacaoEmail(); return validaSenha();" />
					<!-- Botão que serve para fechar a página, com a mesma funcionalidade que o "X" -->
					<button type="button" class="btn btn-default butaoredendo telamodal" data-dismiss="modal" data-toggle="tooltip"  title="Clique aqui para fechar a janela" >Cancelar </button>


				</form>

			</div>

		</div>

	</div>

</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
</body>
</html>