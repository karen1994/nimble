<!DOCTYPE html>
<html lang="en">
	<head>
    <meta charset = "utf-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Policía de Tránsito</title>
                
    <script src="views/bootstrap/jquery/jquery.min.js"></script> 
     <script src="views/bootstrap/js/bootstrap.min.js"></script>
     <link rel="stylesheet" href="views/bootstrap/css/bootstrap.min.css">
      <link rel="stylesheet" href="views/app/css/index.css">
	</head>
	<body>
		<!--Incluye el documento navbar.php en la búsqueda-->
<div class="container">
<div class="row">
<div class="col-md-6">
    <?php include(HTML_DIR . '/menu/menu.html'); ?> <!--Incluye el documento formulario.php-->
    <br>
     
</div>
</div>
 <?php include(HTML_DIR . '/accidente/frmEditar.php'); ?>
<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="views/app/js/generales.js"></script>
<script src="views/app/js/accidente/editarAccidente.js"></script>
	</body>
</html>


