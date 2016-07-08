<?php
$db= new Conexion();
$Alcoholimetro_id= $_GET['id'];

$sql = "select * from Alcoholimetro where Alcoholimetro.idnumPatrimonio = ".$Alcoholimetro_id;

$query = $db->query($sql);
$Alcoholimetro=null;

if($query->num_rows >0){

     while($r=$query->fetch_object()){
        $Alcoholimetro=$r;
         break;
     }
}

?>

<?php if($Alcoholimetro != null){?>

<!--Inicia el div container-->
      <div class="container">
        <br>
      <form  name="form1"action="" class="form-horizontal">

        <div class="form-group">
              <div class="col-md-4 col-md-offset-10">
        <a href="?view=verAlcoholimetro" class="btn btn-success"><span class="glyphicon glyphicon-arrow-left"></span> Regresar</a>
              </div>
        </div>

        <div class="form-group">
              <div class="col-md-8 col-md-offset-4">
        <h1>Salida de alcoholimetro</h1>
              </div>
        </div>

       <div class="form-group">
          <label for="NumeroPatrimonio" class="control-label col-md-4">Numero de Patrimonio</label>
          <div class="col-md-5">
          <input class="form-control" id="NumeroPatrimonio"  type="text" maxlength="15"  placeholder="" disabled="" value="<?php echo $Alcoholimetro->idnumPatrimonio;?>">
          </div>
        </div>

        <div class="form-group" style="display:none;">
           <label for="tipoActivo" class="control-label col-md-4">Tipo Activo</label>
           <div class="col-md-5">
           <input class="form-control" id="tipoActivo" onfocus="return validaciones()" type="text" maxlength="15"  placeholder="" disabled="" value="<?php echo $Alcoholimetro->idTipoActivo;?>">
           </div>
         </div>

        <div class="form-group" id="fecSalida">
          <label for="FechaSalidaAlcohol" class="control-label col-md-4">Fecha de salida</label>
          <div class="col-md-5">
          <input class="form-control" id="FechaSalidaAlcohol" onfocus="return validaciones()" type="date" maxlength="15" placeholder="">
          </div>
        </div>

   <div class="form-group" id="HoraSalida">
        <label for="HoraSalidaAlcohol" class="control-label col-md-4">Hora de salida</label>
        <div class="col-md-5">
        <input class="form-control" id="HoraSalidaAlcohol" onfocus="return validaciones()" type="time" placeholder="">
        </div>
   </div>


   <div class="form-group" id="entregaSalida">
        <label for="OfiEntregaSalida" class="control-label col-md-4">Codigo del oficial que entrega</label>
        <div class="col-md-5">
        <input class="form-control" id="OfiEntregaSalida" onfocus="return validaciones()" type="text" maxlength="15" placeholder="">
        </div>
  </div>


   <div class="form-group" id="recibeSalida">
        <label for="OfiRecibeSalida" class="control-label col-md-4">Codigo del oficial que recibe</label>
        <div class="col-md-5">
        <input class="form-control" id="OfiRecibeSalida" onfocus="return validaciones()" type="text" maxlength="15" placeholder="">
        </div>
  </div>

   <div class="form-group">
        <label for="ObservacionesSalida" class="control-label col-md-4">Observaciones</label>
        <div class="col-md-5">
        <textarea id="ObservacionesSalida" rows="8" cols="40"  maxlength="100" placeholder="Escribe la observación de la salida del alcoholimetro"></textarea>
        </div>
  </div>

  <div class="form-group">
          <label  class="control-label col-md-4"></label>
          <div class="col-md-8">
           <div id="_AJAX_SalidaAlcoholimetro_" ></div>
          </div>
  </div>

 <div class="form-group">
      <div class="col-md-8 col-md-offset-4">
        <a id="btnSalidaAlcohol" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span> Guardar</a>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <a href="?view=VerAlcoholimetro" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span> Cancelar</a>
      </div>
</div>

      </form>

    </div>
    <!--Fin el div container-->

    <?php } else{ ?>
    <p class="alert alert_danger">404 No se Encuentra </p>
    <?php }?>
