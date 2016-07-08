<?php
$db= new Conexion();
$Vehiculo_id= $_GET['id'];

$sql = "select * from VehiculoOficial where VehiculoOficial.idVehiculoOficial = ".$Vehiculo_id;

$query = $db->query($sql);
$Vehiculo=null;

if($query->num_rows >0){

     while($r=$query->fetch_object()){
         $Vehiculo=$r;
         break;
     }
}

?>

<?php if($Vehiculo != null){?>



<!--Inicia el div container-->
  <div class="container">
  <br>

   <form id="RegVehiculoOficial"class="form-horizontal">

     <div class="form-group">
           <div class="col-md-4 col-md-offset-10">
     <a href="?view=verVehiculoOfic" class="btn btn-success"><span class="glyphicon glyphicon-arrow-left"></span> Regresar</a>
           </div>
     </div>


     <div class="form-group">
           <div class="col-md-4 col-md-offset-4">
     <h2>Editar vehiculo Oficial</h2>
           </div>
     </div>

     <br>

     <div class="form-group">
       <label for="consecutivo" class="control-label col-md-4">Consecutivo:</label>
       <div class="col-md-5">
       <input class="form-control" id="consecutivo" value="<?php echo $Vehiculo->idVehiculoOficial;?> "type="text"  disabled="">
       </div>
     </div>

     <div class="form-group">
          <label for="ServicioVehiculo" class="control-label col-md-4">Disponibilidad:</label>
          <div class="col-md-5">
          <input class="form-control" id="ServicioVehiculo" value="<?php echo $Vehiculo->estadoVehO;?> "type="text" disabled>
          </div>
     </div>

        <div class="form-group" id="numeroPlaca">
          <label for="numPlaca" class="control-label col-md-4">Numero de placa:</label>
          <div class="col-md-5">
          <input class="form-control" id="numPlaca" onfocus="return validaciones()" value="<?php echo $Vehiculo->numPlacaVehiculoOfic;?> "type="text" maxlength="15" placeholder="">
          </div>
        </div>

   <div class="form-group " id="tipoVehiculo">
        <label for="TipoVehiculo" class="control-label col-md-4">Tipo de vehiculo:</label>
        <div class="col-md-5">
        <input class="form-control" id="TipoVehiculo" onfocus="return validaciones()" value="<?php echo $Vehiculo->tipoVehiculoOfic;?> "type="text" placeholder="">
        </div>
   </div>


  <div class="form-group " id="marcaVehiculo">
        <label for="MarcaVehiculo " class="control-label col-md-4">Marca del Vehiculo:</label>
        <div class="col-md-5">
        <input class="form-control" id="MarcaVehiculo" onfocus="return validaciones()" value="<?php echo $Vehiculo->marcaVehiculoOfic;?> "type="text" placeholder="">
        </div>
   </div>


   <div class="form-group" id="km">
        <label for="KmInicial" class="control-label col-md-4">Kilometraje Inicial:</label>
        <div class="col-md-5">
        <input class="form-control" id="KmInicial" onfocus="return validaciones()"  value="<?php echo $Vehiculo->kmInicial;?> "type="text" maxlength="15" placeholder="">
        </div>
   </div>


  <div class="form-group">
       <label for="Observaciones" class="control-label col-md-4">Observaciones</label>
         <div class="col-md-5">
       <textarea id="Observaciones" rows="8" cols="40"  maxlength="100" placeholder="Escribe la observación del alcoholimetro"><?php echo $Vehiculo->observ;?></textarea>
         </div>
 </div>

 <div class="form-group">
      <div class="col-md-4 col-md-offset-4">
     <p id="_AJAX_VehiculoOficial_"></p>
      </div>
 </div>


 <div class="form-group">
      <div class="col-md-8 col-md-offset-4">
        <a id="btnReg" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span> Guardar cambios</a>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
   <a href="?view=VerVehiculoOfic" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span> Cancelar</a>
      </div>
 </div>
      </form>

    </div>
    <!--Fin el div container-->

<?php } else{ ?>
<p class="alert alert_danger">404 No se Encuentra </p>
<?php }?>
