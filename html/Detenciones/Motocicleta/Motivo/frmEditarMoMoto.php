<?php
$db= new Conexion();
$Consecutivo_id= $_GET['id'];

$sql = "SELECT * FROM detenciones INNER JOIN Motivo ON detenciones.idMotivo = Motivo.`idMotivo`
WHERE  `motivo`.`idMotivo` =".$Consecutivo_id;

$query = $db->query($sql);
$Consecutivo=null;

if($query->num_rows >0){

     while($r=$query->fetch_object()){
        $Consecutivo=$r;
         break;
     }
}

?>

<?php if($Consecutivo != null){?>
  <!-- Formulario editar placa-->
  <div class="container">
  <br>
      <form name="form1" action="" class="form-horizontal">

        <div class="form-group">
              <div class="col-md-4 col-md-offset-10">
        <a href="?view=verMotocicleta" class="btn btn-success"><span class="glyphicon glyphicon-arrow-left"></span> Regresar</a>
              </div>
        </div>

        <div class="form-group">
              <div class="col-md-8 col-md-offset-4">
        <h1>Editar motivo de la detención</h1>
              </div>
        </div>


   <div class="form-group">
         <div class="col-md-4 col-md-offset-4">
   <h3> Datos del motivo </h3>
         </div>
   </div>

 <!--Motivo de la detención-->
 <div class="form-group" style="display:none;">
      <label for="numConsecutivo" class="control-label col-md-4">Número de consecutivo</label>
        <div class="col-md-5">
      <input class="form-control" id="numConsecutivo" type="text" disabled="" value="<?php echo $Consecutivo->idMotivo;?>">
        </div>
 </div>

 <div class="form-group">
      <label for="numBoletaMatricula" class="control-label col-md-4">Número de boleta</label>
        <div class="col-md-5">
      <input class="form-control" id="numBoletaMatricula" type="text" maxlength="12" disabled=""   value="<?php echo $Consecutivo->numBoletaDetencion;?>">
        </div>
 </div>

 <div class="form-group" id="articulo">
   <label for="numArticulo" class="control-label col-md-4">Número de artículo</label>
     <div class="col-md-5">
   <input class="form-control" onfocus="return datosCorrectos()" id="numArticulo" type="text"  maxlength="10" disabled="" value="<?php echo $Consecutivo->numArticulo;?>">
     </div>
 </div>

 <div class="form-group" id="motivo">
 <label for="desMotivo" class="control-label col-md-4">Motivo de la detención</label>
 <div class="col-md-5">
 <textarea onfocus="return datosCorrectos()" id="desMotivo" rows="8" cols="40" placeholder="Escribe el motivo de la detención" maxlength="100" disabled=""><?php echo $Consecutivo->descripMotivo;?></textarea>
   </div>
 </div>

  <br>

  <div class="form-group">
      <div class="col-md-4 col-md-offset-4">
      <p id="_AJAX_Motivo_Moto_"></p>
      </div>
  </div>

  <div class="form-group">
      <div class="col-md-8 col-md-offset-4">
      <a id="btnEditarMotivo" class="btn btn-warning"><span class="glyphicon glyphicon-pencil"></span> Editar</a>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <a id="btnGuardarMotivo" class="btn btn-primary" style="display:none;"><span class="glyphicon glyphicon-floppy-disk"></span> Guardar cambios</a>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <a href="?view=verMotocicleta"  class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span> Cancelar</a>
      </div>
  </div>


   </form>

   <?php } else{ ?>
   <p class="alert alert_danger">404 No se Encuentra </p>
   <?php }?>
