<!DOCTYPE html>
<html>
<head>
  <title>Green Leaf</title>
  <meta http-equiv="content-type" content="text/html;charset=utf-8" />
  
  <link rel="icon"  href="img/fav2.png">
  <style type="text/css">

  textarea {
    width: 700px;
    height: 200px;
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
    var limite = 4000;
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
    <h1 align="center" class="fonte" style="font-size: 3.8em; color:#4682B4;">Publicar Notícia</h1>
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

<center>
  <form method="post"  name="conteudo" action="publicarNoticia.php"  enctype="multipart/form-data">
    <label class="fonte">Título: </label><input type="text" class="form-control tamanho fonte" name="titulo" size="74"  required="" minlength="6" maxlength="300" placeholder="Digite um título"> <br>


    <textarea maxlength="4000" class="fonte" name="comentario" id="comentario" data-toggle="tooltip" title="Digite algo neste campo de texto" placeholder="Escreva algo"></textarea>
    <br> 
    <p class="caracteres"></p>

    <label class="fonte">Fonte: </label><input type="text" name="fonte" required="" class="form-control tamanho fonte" size="50" placeholder="Exemplo: https://GreenLeaf.com.br"><br><br>

    <label class="fonte">Foto: </label><input type="file" required="" name="foto" accept="image/*">

    <br><br>

    <label class="fonte">Número da página:&nbsp;</label><input placeholder="1 a 4"  required="" type="number" step="1" min="0" max="4" name="pagina"><br><br><br>

    <input type="submit" id="enviar" class="btn btn-info fonte" style="font-size: 1.8em;" data-toggle="Clique aqui para enviar" title="Clique aqui para enviar" value="Publicar" id="enviar" onclick="return validarTextArea();">

    <input id="enviar" type="button" data-toggle="Clique aqui para voltar"  class="btn btn-default" value="Voltar" style="font-size: 1.8em;" onClick="history.go(-1)">
  </form>


</center><br>




</body>
</html>