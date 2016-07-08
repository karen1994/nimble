<?php
$db= new Conexion();
$Salida_id= $_GET['id'];

$sql = "select * from vehiculooficial where vehiculooficial.numPlacaVehiculoOfic = '$Salida_id'";

$query = $db->query($sql);
$Salida=null;

if($query->num_rows > 0){

     while($r=$query->fetch_object()){
         $Salida=$r;
         break;
     }
}

?>

<?php if($Salida != null){?>

  <div class="container">
    <br>
  <form action="" class="form-horizontal">

          <div class="form-group">
        <div class="col-md-4 col-md-offset-10">
  <a href="?view=verVehiculoOfic" class="btn btn-success"><span class="glyphicon glyphicon-arrow-left"></span> Regresar</a>
        </div>
  </div>

 <div class="form-group">
       <div class="col-md-6 col-md-offset-4">
 <h2>Salida de Vehiculo Oficial</h2>
       </div>
 </div>

 <div class="form-group" style="display:none;">
      <label for="TipoActivo" class="control-label col-md-4">Tipo Activo:</label>
      <div class="col-md-5">
      <input class="form-control" id="TipoActivo" value="<?php echo $Salida->idTipoActivo;?>" type="text" maxlength="15" placeholder="">
      </div>
    </div>

  <div class="form-group" >
    <label for="NumeroPlaca" class="control-label col-md-4">Numero de Placa:</label>
    <div class="col-md-5">
    <input class="form-control" id="NumeroPlaca"  value="<?php echo $Salida->numPlacaVehiculoOfic;?>" type="text" disabled maxlength="15" placeholder="">
    </div>
</div>

    <div class="form-group" id="FecSalida">
      <label for="FechaSalida" class="control-label col-md-4">Fecha de salida del Vehiculo:</label>
      <div class="col-md-5">
      <input class="form-control" id="FechaSalida" onfocus="return validaciones()" type="date" maxlength="15" placeholder="">
      </div>
    </div>

<div class="form-group" id="horaSalida">
    <label for="HoraSalida" class="control-label col-md-4">Hora de salida del Vehiculo:</label>
    <div class="col-md-5">
    <input class="form-control" id="HoraSalida" onfocus="return validaciones()" type="time" placeholder="">
    </div>
</div>


<div class="form-group" id="EntregaSalida">
    <label for="OficEntregaSalida" class="control-label col-md-4">Codigo del oficial que entrega:</label>
    <div class="col-md-5">
    <input class="form-control" id="OficEntregaSalida" onfocus="return validaciones()" type="text" maxlength="15" placeholder="">
    </div>
</div>


<div class="form-group" id="RecibeSalida">
    <label for="OficRecibeSalida" class="control-label col-md-4">Codigo del oficial que recive:</label>
    <div class="col-md-5">
    <input class="form-control" id="OficRecibeSalida" onfocus="return validaciones()" type="text" maxlength="15" placeholder="">
    </div>
</div>


    <div class="form-group">
         <label for="observSalida" class="control-label col-md-4">Observaciones</label>
           <div class="col-md-5">
         <textarea id="observSalida"  rows="8" cols="40"  maxlength="100" placeholder="Escribe la observación del vehiculo"></textarea>
           </div>
   </div>


    <div class="form-group">
            <label  class="control-label col-md-4"></label>
            <div class="col-md-8">
             <div id="_AJAX_SalidaVehiculo_" ></div>
            </div>
    </div>
    <br>

</div>
<div class="form-group">
  <div class="col-md-8 col-md-offset-4">
<a id="btnRegSalidaVehiculo" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span> Guardar</a>
 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href="?view=VerVehiculoOfic" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span> Cancelar</a>
  </div>
</div>

  </form>

</div>

<?php } else{ ?>
<p class="alert alert_danger">404 No se Encuentra </p>
<?php }?>
