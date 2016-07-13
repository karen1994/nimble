
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

<?php include(HTML_DIR . '/menu/menu.html'); 

$db= new Conexion(); /*Incluye el documento conexion.php*/

$accidente_id= $_GET['id'];
/*Realiza la consulta por el id en la base de datos*/


$sql ="SELECT *FROM `implicados` WHERE numBoletaAccidente= ".$accidente_id;


$query = mysqli_query($db, $sql);
$accidente = null;
//$sql1= "select * from person where id = ".$_GET["id"];
//$query = mysqli_query($db, $sql1);
$b=0;
  
     if($query->num_rows >0){
         
while ($r=$query->fetch_object()){
        $accidente=$r;
          break;
    
}
     }
?>
    
     <div class="form-horizontal">
<div class="form-group">
      <div class="col-md-4 col-md-offset-5">
<h2> Implicados </h2>
      </div>
</div>
      </div>
    <hr>
<br>

  <form name="form2" action="" class="form-horizontal">
   
    <!--  <input  id="rutAccidente" type="text" value="323" maxlength="3" placeholder=""> -->
      <div class="form-group" style="display: none;">
      <label for="ruta" class="control-label col-md-4">Número de boleta</label>
        <div class="col-md-5">
      <input class="form-control" id="numBoleta" type="text" disabled="true" value=<?php echo $accidente_id?> maxlength="3" placeholder="">
        </div>
</div>
    
   <div class="form-group">
     <label for="nImplicados" class="control-label col-md-4">Número de implicados</label>
       <div class="col-md-5">
     <input class="form-control" id="numImplicados" type="text" disabled="true" value=<?php echo $accidente->numeroImplicados ?> maxlength="3" placeholder="">
       </div>
</div>

<div class="form-group">
    <label for="option" class="control-label col-md-4">Accidente con</label>
       <div class="col-md-5">
    <select class="form-control" disabled="true" name="" id="accCon">
      <option value="">Seleccione</option>
      <?php
            $op2="Heridos";  $op3="Muertes";  $op4="Daños materiales"; 
          $op= array($op2,$op3,$op4);
           $b=0;
         while($b < count($op)):
            
              if($op[$b] == $accidente->estadoImplicados):
             ?>
             <option value="<?php echo $accidente->estadoImplicados; ?>" selected="selected" ><?php echo $accidente->estadoImplicados; ?> </option>
         <?php
         else: ?>
           <option value="<?php echo $op[$b]; ?>" > <?php echo $op[$b]; ?> </option>
         <?php
      
         endif;
         $b= $b+1;
         endwhile;
         ?>
    
    </select>
         </div>
</div>

<!-- Boton Terminar -->
 <div class="form-group" id="btnTerminarDIV">
    <div class="col-md-4 col-md-offset-4">
     <input id='btnEditar' type="button" class="btn btn-warning" value="Editar">
      <!--<button class="btn btn-primary">Guardar</button> -->
    </div>
     </div>
     
     
          <div class="form-group">
           <div class="col-md-4 col-md-offset-4">
            <div id="_AJAX_"></div>
              </div>
               </div>  

 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;


<!-- Boton Terminar -->
 <div class="form-group" id="btnGuadarDIV" style="display:none;">
    <div class="col-md-4 col-md-offset-4">
     <input id='btnGuardar' type="button" class="btn btn-primary" value="Guardar">
      <!--<button class="btn btn-primary">Guardar</button> -->
    </div>
     </div>

<!-- Boton Terminar -->
 <div class="form-group" id="btnCancelarDIV" style="display:none;">
    <div class="col-md-4 col-md-offset-4">
     <input id='btnCancelar' type="button" class="btn btn-danger" value="Cancelar">
      <!--<button class="btn btn-primary">Guardar</button> -->
    </div>
     </div>
<br>
<br>

  </form>
  
  <script src="views/bootstrap/jquery/jquery.min.js"></script>
<script src="views/bootstrap/js/bootstrap.min.js"></script>
<script src="views/app/js/generales.js"></script>
<script src="views/app/js/accidente/editarImplicados.js"></script>

</body>

</html>


