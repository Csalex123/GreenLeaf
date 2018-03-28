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
  <meta http-equiv="content-type" content="text/html;charset=utf-8" />
  <meta charset="utf-8">
  <link rel="icon"  href="../img/fav.jpg">
  <style type="text/css">



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





</head>


<body>
  <header>
    <h1 align="center" class="fonte" style="font-size: 3.8em; color:#006400; margin-bottom: -25px;"><b>Publicar Petição </b><img class="img-responsive img-thumbnail " src="peticao.png" height="180px" width="250"></h1>

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


  
  .hover:hover{

    
        background-color: #00BFFF;
  }
</style>
<a href="listarpeticao.php"><button  class="btn btn-info hover" style="float: right; margin-right: 20px;">Ver todas petições</button></a><br><br>

<center>
  <form method="post"  name="conteudo" action="inserirpeticao.php"  enctype="multipart/form-data">
  

    <label class="fonte ">Título da petição: </label><input  type="text" required="" maxlength="200"  placeholder="Título" name="titulo" required="" class="form-control tamanho fonte " size="50" ><br><br>

     <label class="fonte">Link da Petição: </label><input type="text" required="" placeholder="Link" maxlength="150" name="link" required="" class="form-control tamanho fonte " size="50" ><br><br>

   

    <label class="fonte">Foto: </label><input type="file" required="" name="foto" accept="image/*">

    <br><br>

    <input type="submit" id="enviar" class="btn btn-info fonte" style="font-size: 1.8em;" data-toggle="Clique aqui para enviar" title="Clique aqui para enviar" value="Publicar" id="enviar" onclick="return validarTextArea();">

    <a href="inicioADM.php"><input id="enviar" type="button" data-toggle="Clique aqui para voltar"  class="btn btn-default" value="Voltar" style="font-size: 1.8em;" ></a>
  </form>


</center><br>




</body>
</html>