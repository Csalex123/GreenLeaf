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



$query =  mysqli_query($conexao, "SELECT  * FROM noticia WHERE id_noticia = 3  LIMIT 1");
$resultado = mysqli_fetch_assoc($query);

$_SESSION['titulo'] = $resultado['titulo'];
$_SESSION["conteudo"] = $resultado['conteudo'];
$_SESSION["fonte"] = $resultado['fonte'];
$_SESSION["data_hora"] = $resultado['data_hora'];

// Foto da publicação 
$_SESSION["foto"] = $resultado['foto'];



?>
<!DOCTYPE html>
<html>
<head>  
  <meta charset="utf-8">
  <link rel="icon"  href="img/fav.jpg">
  <!-- Importando o Bootstrap, CSS e jquery-->

 <style type="text/css">

  div#curiosidades{
    margin-right: 3px;
    margin-left: -45px;
    box-shadow: 0 8px 16px 8px rgba(0,0,0,0.6), 0 6px 20px 0 rgba(0,0,0,0.6);
    color: black;
    height: 900px;
    background-color: rgba(255 ,250, 250, 0.6);
  }


  div#noticias{
    margin-left: 40px;
    box-shadow: 0 8px 16px 8px rgba(0,0,0,0.6), 0 6px 20px 0 rgba(0,0,0,0.6);
    color: black;
    height: 900px;
    background-color: rgba(255 ,250, 250, 0.6);
  }


  img:hover{
   -webkit-transform: scale(1.3);
   -webkit-transition: all .4s ease-in;
 }

 div.gallery {
  margin: 10px;
  border: 1px solid #ccc;
  float: left;
  width: 380px;
  background-color: white;
  box-shadow: 0 8px 16px 8px rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.2);
  font-size: 18px;
}

</style>

<meta name="viewport" content="width=device-width, initial-scale=1" media="all">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" media="all">

<link rel="stylesheet" type="text/css" href="css/index.css" media="all">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js" media="all"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" media="all"></script>
<script src="jquery.js"></script>


<style type="text/css">
.fonte{
  font-family: 'Montserrat', sans-serif;
}
</style>

</head>

<body >

  <?php include 'menu.php' ?>



  <!-- Container para notícias -->



 <div class="container">
    <div class="row">
      <!-- fotos -->
      <div class="col-md-5 " id="curiosidades" >
        <p align="center" style="font-family: 'Montserrat',sans-serif;font-size: 2em;margin-top: 20px">
          <strong>Curiosidades</strong>
        </p>

          <style type="text/css">
            .stilocuriosidade{
              color: black;font-family: 'Montserrat', sans-serif;
              text-align: justify;
              font-size: 13px;
              padding: 19px;
            }

            .fotoCuriosidade{
              border-radius: 150px;
              margin-left: 20px
            }
          </style>
        <!-- Curiosidade 1 -->
        <table>
          <tr>
            <td><img src="img/tartaruga.jpg" width="200" height="180" class="fotoCuriosidade"></td>
            <td class="stilocuriosidade">
              <b>Você pode identificar o sexo de uma tartaruga pelos sons que ela faz. Machos soltam um grunhido, e fêmeas um assobio.</b>
            </td>
          </tr>
        </table>

        <table style="margin-top: 50px; ">
          <!-- Curiosidade 2 -->
          <tr>
           <td>
             <td><img src="img/flor.jpg" width="200" height="180"  class="fotoCuriosidade"></td>
             <td class="stilocuriosidade">
              <b>“Flor-esqueleto” é mais um fenômeno lindo da natureza. Quando chove, as suas pétalas ficam transparentes e quase imperceptíveis.</b>
            </td>
          </td>
        </tr>

      </table>

      <table style="margin-top: 50px; margin-bottom: 100px;">
        <!-- Curiosidade 2 -->
        <tr>
         <td>
           <td><img src="img/aguaviva.jpg" width="200" height="180"  class="fotoCuriosidade"></td>
           <td class="stilocuriosidade">
            <b>Águas-vivas não possuem cérebro, coração e nem ossos. Para se orientar, abusam dos sensores nervosos presentes em seus tentáculos</b>
          </td>
        </td>
      </tr>
    </table>


       <center>
        <a href="curiosidades.php" target="_blank"><button style="float: center; background-color: #2E8B57;font-family: 'Montserrat', sans-serif;
        font-size: 15px;color: white;border-radius: 250px;box-shadow: 0 8px 16px 1px rgba(0,0,0,0.1), 0 6px 20px 0 rgba(0,0,0,0.1); height: 35px;
        width: 200px;">Veja mais</button></a>
      </center><br>
    </div>
    <!-- Vídeos -->

    <div class="col-md-7 "  id="noticias"  style="margin-bottom: 20px;">
     <p id="noticia" align="center" style=" font-family: 'Montserrat', sans-serif; font-size: 3em;margin-top: 20px;"><b> Notícias</b></p>

     <center>
      <div class="img-responsive ">
       <?php $foto = $_SESSION["foto"];//Guarda o nome da foto 
       echo "<img class='img-responsive img-thumbnail' alt='imagem 1' src='upload/".$foto."'  width='500px' height='200px' /><br>"; ?>
     </div><br>

     <header><p style="text-align: center; font-size: 17px; color: black; font-family: 'Montserrat', sans-serif;">
      <b> <?php  $titulo = utf8_encode($_SESSION['titulo']); echo $titulo;  ?></b></p>
    </header><br>

    <p style="font-size: 15px; text-indent:4em;text-align: justify; font-family: 'Montserrat', sans-serif;"><?php  $conteudo = utf8_encode($_SESSION['conteudo']); echo $conteudo; ?></p>
    <br>

    <label style="font-size: 12px; font-family: 'Montserrat', sans-serif;">Fonte:</label>
    <a style="font-size: 12px; font-family: 'Montserrat', sans-serif;" href="<?php  $fonte = utf8_encode($_SESSION['fonte']); echo $fonte;  ?>" target="_blank"><?php  $fonte2 = utf8_encode($_SESSION['fonte']); echo $fonte2;  ?></a>

    <p align="right"><b style="font-family: 'Montserrat', sans-serif;">Publicado: </b> <?php 

    $data = $_SESSION['data_hora'];
    $objDate = DateTime::createFromFormat('Y-m-d H:i:s', $data);
    $data = $objDate->format('d/m/Y');
    $hora = $objDate->format('H:i:s');
    echo $data." <b>às</b> ".$hora;

    ?>
  </p>

  <center>
    <nav aria-label="...">
      <ul class="pagination pagination-lg">
        <li class="page-item">     
        </li>
        <li class="page-item"><a class="page-link" href="paginainicial.php">1</a></li>
        <li class="page-item"><a class="page-link " href="paginainicial2.php">2</a></li>
        <li class="page-item"><a class="page-link active" href="#">3</a></li>
        <li class="page-item"><a class="page-link" href="paginainicial4.php">4</a></li>
      </ul>
    </nav>
  </center> 


</div>

<!-- Fim do container notícias -->



<!-- Rodapé -->

<br><br>
<footer >
  <div  container-fluid navbar-bottom" >
    <center>

      <b align="right" style="color: black;">&nbsp; &nbsp;&nbsp; Copyright Green Leaf - 2018 &copy;</b>
    </div>
  </center>

</footer>


</body>
</html>