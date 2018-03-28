<?php 

 include '../menu.php';

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="icon"  href="img/fav.jpg">
	<title>Green Leaf</title>

	<link rel="stylesheet" type="text/css" href="../css/index.css" media="all">
	<link rel="stylesheet" type="text/css" href="../css/menu.css" media="all">
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


	function pergunta(){ 
	
	if (!confirm('Tem certeza que deseja apagar este comentário?')){ 
      	return false;
   }else{
   		
   		document.seuformulario.submit();
   }
   	 
   
} 
</script>


</head>
<body >

</body>
</html>