<?php if(!isset($_SESSION)) 
{ 
  session_start(); 
} 

// Verifica se não há a variável da sessão que identifica o usuário
if (!isset($_SESSION['id_adm'])) {
// Destrói a sessão por segurança
  session_destroy();

// Redireciona o visitante de volta pro login
  header("Location: indexadm.php"); exit;

  
}


?>
<!DOCTYPE html>
<html>
<head>
  <title>Green Leaf</title>
  <meta charset="utf-8">
  <meta http-equiv="content-type" content="text/html;charset=utf-8" />
  
  <link rel="icon"  href="../img/fav.jpg">
  <style type="text/css">

  textarea {
    width: 700px;
    height: 150px;
    padding: 12px 20px;
    box-sizing: border-box;
    border: 2px solid #ccc;
    border-radius: 8px;
    background-color: #f8f8f8;
    font-size: 16px;
    resize: none;
    box-shadow: 0 8px 16px 8px rgba(0,0,0,0.1), 0 6px 20px 0 rgba(0,0,0,0.1);

  }

  #enviar{
    height: 43px;
    width: 680px;
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


<script type="text/javascript">

  function validarTextArea(){

    if(conteudo.comentario.value == '' || conteudo.comentario.value == null ||  conteudo.comentario.value == "Escreva algo") {
      alert("Escreva alguma publicação");
      return false;
    }
  }


</script>

<script type="text/javascript">
  $(document).on("input", "#comentario", function() {
    var limite = 500;
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


</head>


<body>
  <header>
    <h1 align="center" class="fonte" style="font-size: 3.8em; color:#00B2EE; margin-bottom: -25px;"><b>Publicar Curiosidade</b><img style="margin-left: 20px;" src="curiosidade.png" width="150" height="150"></h1>
  </header>
  <br><br>

  <style type="text/css">

  .tamanho{
    width: 700px;
  }

  .fonte{
    font-family: 'Bree Serif', serif;
    font-size: 1.2em;
  }

  #enviar{
    height: 50px;
    width: 190px;
    border-radius: 300px;
    border-color: #f8f8f8;
    box-shadow: 0 8px 16px 8px rgba(0,0,0,0.1), 0 6px 20px 0 rgba(0,0,0,0.1);
  }
</style>

<a href="listarcuriosidade.php"><button  class="btn btn-info hover" style="float: right; margin-right: 20px;">Ver todas petições</button></a><br><br>


<center>
  <form method="post"  name="conteudo" action="inserircuriosidade.php"  enctype="multipart/form-data">
  

    <textarea maxlength="500" class="fonte" name="comentario" required="" id="comentario" data-toggle="tooltip" title="Digite algo neste campo de texto" placeholder="Descrição da Curiosidade" ></textarea>
    <br> 
    <p class="caracteres"></p>

    <label class="fonte">Foto: </label><input type="file" required="" name="foto" accept="image/*">

    <br><br>

    <input type="submit" id="enviar" class="btn btn-info fonte" style="font-size: 1.8em;" data-toggle="Clique aqui para enviar" title="Clique aqui para enviar" value="Publicar" id="enviar" onclick="return validarTextArea();">

  
    <a href="inicioADM.php"><input id="enviar" type="button" data-toggle="Clique aqui para voltar"  class="btn btn-default" value="Voltar" style="font-size: 1.8em;" ></a>
  </form>


</center><br>




</body>
</html>