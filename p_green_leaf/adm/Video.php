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
  <link rel="icon"  href="../img/fav.jpg">
  <meta http-equiv="content-type" content="text/html;charset=utf-8" />
  
  <link rel="icon"  href="img/fav2.png">
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

    <h1 align="center" class="fonte" style="font-size: 3.8em; color:#836FFF;"><b>Publicar Vídeo </b><img src="video.png" width="150px" height="150px">
    </h1>

  </header>
  <br><br>

  <style type="text/css">

  .tamanho{
    width: 700px;
    height: 42px;
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
  },


</style>


<a href="listarvideo.php"><button  class="btn btn-info hover" style="float: right; margin-right: 20px;">Ver todos vídeos</button></a><br><br>
<center>
  <form method="post"  name="conteudo" action="inserirvideo.php" >
  
    <div class="form-group">
    <label class="fonte ">Título do vídeo: </label><input  type="text" placeholder="Título" name="titulo" required="" class="form-control tamanho fonte " size="50" ><br><br>

     <label class="fonte">Link do vídeo(Youtube): </label> <input type="text" placeholder="Link" value="https://www.youtube.com/embed/" name="link" required="" class="form-control tamanho fonte " size="50" ><br><br>

     <label class="fonte" >Categoria</label>
     <select required="" name="categoria" class="form-control" style="width: 300px;">
       <option value="Educação" class=" fonte">Educação</option>
       <option value="Informativo" class=" fonte">Informativo</option>
       <option value="Documentário" class=" fonte">Documentário</option>
       <option value="Desenho" class=" fonte">Desenho</option>
     </select>


     </div>

    <br><br>

    <input type="submit" id="enviar" class="btn btn-info fonte" style="font-size: 1.8em;" data-toggle="Clique aqui para enviar" title="Clique aqui para enviar" value="Publicar" id="enviar" onclick="return validarTextArea();">

    <input id="enviar" type="button" data-toggle="Clique aqui para voltar"  class="btn btn-default" value="Voltar" style="font-size: 1.8em;" onClick="history.go(-1)">
  </form>


</center><br>




</body>
</html>