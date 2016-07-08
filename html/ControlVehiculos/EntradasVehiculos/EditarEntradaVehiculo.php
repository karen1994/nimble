<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset = "utf-8">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <title>Entrada de Vehiculos Oficiales</title>
  <link rel="stylesheet" href="views/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="views/app/css/index.css">
</head>
<body>


    <div class="container">
<div class="row">
<div class="col-md-6">
    <?php include(HTML_DIR.'/menu/menu.html');?>

    <div class="container">
<div class="row">
<div class="col-md-15">
		<h2>FORMULARIO EDITAR</h2>

<?php include(HTML_DIR.'/ControlVehiculoOfic/EntradasVehiculos/frmEditarEntradaVehiculo.php');?>

</div>
</div>
</div>




</body>
<script src="views/bootstrap/jquery/jquery.min.js"></script>
<script src="views/bootstrap/js/bootstrap.min.js"></script>
<script src="views/app/js/generales.js"></script>
<script src="views/app/js/EditarEntradaVehiculo.js"></script>

</html>
