<!DOCTYPE html>
<html>
<head>  
  <meta charset="utf-8">
  <link rel="icon"  href="img/fav.jpg">
  <!-- Importando o Bootstrap, CSS e jquery-->
  <title>Green Leaf</title>
  

  <meta name="viewport" content="width=device-width, initial-scale=1" media="all">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" media="all">

  <link rel="stylesheet" type="text/css" href="css/multimidia.css" media="all">



  

  <style>
  @import url('https://fonts.googleapis.com/css?family=Flavors');

  div.gallery {
    float: left;
    background-color: white;
    /*  box-shadow: 0 8px 16px 8px rgba(0,0,0,0.6), 0 6px 20px 0 rgba(0,0,0,0.6); */
    font-size: 18px;
  }



  div.gallery img {
    width: 100%;
    height: 310px;
    background-color: white;
  }

  div#fotos{
    margin-right: 3px;
    margin-left: -45px;
    box-shadow: 0 8px 16px 8px rgba(0,0,0,0.6), 0 6px 20px 0 rgba(0,0,0,0.6);
    color: black;
    height: 1200px;
    background-color: rgba(255 ,250, 250, 0.6);
  }


  div#videos{
    margin-left: 40px;
    box-shadow: 0 8px 16px 8px rgba(0,0,0,0.6), 0 6px 20px 0 rgba(0,0,0,0.6);
    color: black;
    height: 1200px;
    background-color: rgba(255 ,250, 250, 0.6);
  }

  h1#multimidia{
    color: black;
    font-family: 'Montserrat', sans serif;
    font-size: 5em;
    
  }

  button.but{

    margin-left: -10px;
    background-color: #2E8B57;
    font-family: 'Montserrat', sans-serif;
    font-size: 15px;
    color: white;
    border-radius: 250px;
    box-shadow: 0 8px 16px 8px rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.2);
    height: 50px;
    width: 300px;

  }


</style>



</head>

<body >

  <?php include 'menu.php' ?>

  <header>
    <center>  <h1 align="center" id="multimidia" ><b>Multimídia</b></h1> </center>
  </header><br><br>


  <!-- Conteudo -->

  <section id="servicos">
    <div class="container">
      <div class="row">
        <!-- fotos -->
        <div class="col-md-6 " id="fotos" >
          <h1 align="center" style="font-family: 'Montserrat', sans-serif;">Fotos</h1><br><br>     
          <div class="gallery">
            <img src="img/bambu.jpg" class="img-responsive"><br>
          </div>
          <div class="gallery">
            <img src="img/peixepalhaco.jpg" class="img-responsive fotof"><br>
          </div>
          <div class="gallery">
            <img src="img/guepardos.jpg" class="img-responsive fotof"><br>
          </div>

          <center><a href="galeria2.php" ><button class="but"><strong>VEJA MAIS</strong></button></a></center>
        </div>
        <!-- Vídeos -->

        <div class="col-md-6 "  id="videos">
          <h1 align="Center" style="font-family: 'Montserrat', sans-serif;">Vídeos</h1><br><br>
          <div class="embed-responsive embed-responsive-16by9 videof">
            <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/0SRBL-ETDjU"></iframe>
          </div><br>
          <div class="embed-responsive embed-responsive-16by9 videof">
            <iframe src="https://www.youtube.com/embed/AlAsagaN43E"></iframe>
          </div><br>
          <div class="embed-responsive embed-responsive-16by9 videof">
            <iframe src="https://www.youtube.com/embed/DHqMmFzAjP8"></iframe>
          </div><br>
          <center><a href="video.php" ><button class="but"><strong>VEJA MAIS</strong></button></a></center>

          

        </div>
        <br><br>
        
      </div>
    </div>
  </div>

</section>

<!-- Fim de contéudos -->

<!-- Rodapé -->
<br><br><br>
<footer >
  <div  container-fluid navbar-bottom" >
    <center>
      <b align="right" style="color: black;">&nbsp; &nbsp;&nbsp; Copyright Green Leaf - 2018 &copy;</b>
    </div>
  </center>

</footer>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js" media="all"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" media="all"></script>
<script src="jquery.js"></script>
<!-- Javascript bootstrapp-->
<script src="js/bootstrap.js"></script>
<!-- Jquery -->
<script src= "http://code.jquery.com/jquery-1.12.0.min.js"></script>



</body>
</html>