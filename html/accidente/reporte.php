<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset = "utf-8">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
                                   <title>Policía de Tránsito</title>
  <link rel="stylesheet" href="views/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="views/app/css/index.css">
  
  

</head>
<body>

<?php include(HTML_DIR . '/menu/menu.html'); ?>

  <!-- Formuario accidente-->
<div class="container">
<br>
 <div class="form-group">
      <div class="col-md-4 col-md-offset-10">
<a id="regresar3" class="btn btn-success" href="?view=verAccidente"><span class="glyphicon glyphicon-arrow-left"></span> Regresar</a>
      </div>
</div>
  <form name="form1" action="POST" class="form-horizontal">
   
            <br>
             <div class="form-group">
                      <div class="col-md-4 col-md-offset-4">
                      <h3> Reporte Accidentes </h3>
               
                      </div>
                      <div class="col-md-8 col-md-offset-7">
        <!-- <input id='btnGenerar' type="button" class="btn btn-primary" value="Regresar"> -->
        <!--  <a href="?view=frmAmbiente" id='btnTerminar1' class="btn btn-primary">Terminar</a> -->
        <!--<button class="btn btn-primary">Guardar</button> -->
        </div>
                </div>
                
                                   <!-- Boton Terminar -->
  <hr>
  
  
   <div class="form-group">
        <label for="fecInicio" class="control-label col-md-4">Fecha inicio</label>
          <div class="col-md-5">
        <input class="form-control"  id="fecIncio" type="date"  >
          </div>
   </div>
    
    
   <div class="form-group">
        <label for="fecFinal" class="control-label col-md-4">Fecha final</label>
          <div class="col-md-5">
        <input class="form-control" id="fecFinal" type="date" >
          </div>
   </div>

               
             


                <br>
                   <!-- Boton Terminar -->
 <div class="form-group">
    <div class="col-md-4 col-md-offset-4">
     <input id='btnGenerar' type="button" class="btn btn-primary" value="Generar"> 
    <!--  <a href="?view=frmAmbiente" id='btnTerminar1' class="btn btn-primary">Terminar</a> -->
      <!--<button class="btn btn-primary">Guardar</button> -->
    </div>
     </div>
      </form>


</div> <!--Fin del div container-->


</div>


<!--Sección del footer-->
<footer>
</footer>

<script src="views/bootstrap/jquery/jquery.min.js"></script>
<script src="views/bootstrap/js/bootstrap.min.js"></script>
<script src="views/app/js/generales.js"></script>
<script src="views/app/js/accidente/reporte.js"></script>



</body>
</html>
