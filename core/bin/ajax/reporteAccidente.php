<!DOCTYPE html>
<html lang="en">
	<head>
    <meta charset = "utf-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Policía de Tránsito</title>
    <script type="text/javascript" language="javascript" src="ajax.js"></script>
    <script src="views/bootstrap/jquery/jquery.min.js"></script> 
     <script src="views/bootstrap/js/bootstrap.min.js"></script>
     
    <link rel="stylesheet" href="views/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="views/app/css/index.css">
    
  <link rel="stylesheet" type="text/css" href="views/dataTable/media/css/jquery.dataTables.css" />
  <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/tabletools/2.2.4/css/dataTables.tableTools.css" />
  <script type="text/javascript" language="javascript" src="views/app/js/dataTable.js"></script> 
  <script type="text/javascript" language="javascript" src="views/dataTable/media/js/jquery.js"></script> 
  <script type="text/javascript" language="javascript" src="views/dataTable/media/js/jquery.dataTables.js"></script>
  <script type="text/javascript" language="javascript" src="//cdn.datatables.net/tabletools/2.2.4/js/dataTables.tableTools.min.js"></script>
</head>


<body>
<?php include(HTML_DIR . '/menu/menu.html'); ?>

<div class="container">


 
<!-- Botón para garegar accidente-->

<br>
<br>


<?php 
$db = new Conexion();

$fecInicio = $_GET['id'];
$fecFinal = $_GET['id2'];
          
    



$sql= $db->query("SELECT *FROM accidente INNER JOIN `ubicacion` ON accidente.`idUbicación` = `ubicacion`.`idUbicacion` 
INNER JOIN `inspector` ON accidente.`idAccidente` = inspector.`idAccidente`
INNER JOIN `autoridadjudicial` ON inspector.`idAccidente` = autoridadjudicial.`idAccidente`
INNER JOIN implicados ON autoridadjudicial.`idAccidente`= implicados.`idAccidente`
INNER JOIN `ruta` ON implicados.`idAccidente` = ruta.`idAccidente` INNER JOIN `delegacion` ON accidente.`idDelegacion` = delegacion.`IDdelegacion`
INNER JOIN `provincia` ON ubicacion.`idProvincia` = provincia.`idProvincia`
INNER JOIN `canton` ON ubicacion.`idCanton` = canton.`idCanton` INNER JOIN `distrito` ON 
ubicacion.`idDistrito` = distrito.`idDistrito`  WHERE `fecAccidente` BETWEEN '$fecInicio' AND '$fecFinal' ");

?>


<!-- Tabla-->
<?php if($sql->num_rows>0):?>
<div class="container">

    <br>
    <div class="col-md-4 col-md-offset-10">
    <a id="regresar3" class="btn btn-success" href="?view=reporteAccidente"><span class="glyphicon glyphicon-arrow-left"></span> Regresar</a>
      </div>
  
    </div>
    
 <div class="card card-inverse card-info text-xs-center">
  <div class="card-block">
    
    <h3>Rango de fechas</h3>
    <h3>Inicio:  <p><?php $fecha1= $fecInicio;
              echo $fec1= formatear($fecha1);  ?></p></h3>   
    <h3>Fin:  <p><?php $fecha2 = $fecFinal;
         echo $fec2 =formatear($fecha2);?></p></h3>  
         
  </div>
 </div>

<div class="card card-block" style="background:#eeeeee ">
<div class="table-responsive">
<table id="example" class="display table-bordered" cellspacing="0" width="100%"> <!--Inico de tabla-->
<!-- Campos de la tabla -->
<thead>
	<th>Número de boleta</th>
        <th>Inspector</th>
	<th>Fecha del accidente</th>
	<th>Hora del accidente</th>
        <th>Día del accidente</th>
	<th>Ruta del accidente</th>
	<th>Kilómetro</th>
	<th>Número de implicados</th>
	<th>Accidente con</th>
        
        <!--
  <th>Estructura Especial</th>
  <th>Clase de calzada</th>
  <th>Condición de calzada</th>
  <th>Estado de la calzada</th>
  <th>Iluminación</th>
  <th>Estado del ambiente</th>
  <th>Alinea. vertical</th>
  <th>Alinea. Horizontal</th>
  <th>Señalamiento vial</th>
  <th>Tipo de intersección</th>
  <th>Carriles</th>
  <th>Existencia de</th>
  <th>Sentido vía</th>
  <th>Tipo de accidente</th>
  <th>Vehículo en circulación</th>
  <th>Obstaculos en la vía</th>
  <th>Velocidad de la carretera</th>
        -->
 
  
 
</thead>
<!-- Muestra los datos en los campos correspondientes -->
<?php while ($r=$sql->fetch_array()):?>
<tr>
  <td><?php echo $r["numBoletaAccidente"]; ?></td>
  <td><?php echo $r["codigoInspector"]; ?></td>
  <td><?php $fecha= $r["fecAccidente"];
     echo $fec= formatear($fecha); ?></td>
  <td><?php echo $r["HoraAccidente"]; ?></td>
  <td><?php echo $r["DiaAccidente"]; ?></td>
  <td><?php echo $r["numRuta"]; ?></td>
  <td><?php echo $r["km"]; ?></td>
  <td><?php echo $r["numeroImplicados"]; ?></td>
  <td><?php echo $r["estadoImplicados"]; ?></td>
    </tr>
    
<?php endwhile;?>
</table> <!--Fin de tabla-->
  </div>
  </div>
<?php else:?>
	<p class="alert alert-warning">No hay resultados</p> <!-- Alerta de si hay registros -->
<?php endif;?>

    </div>
</body>
</html>




