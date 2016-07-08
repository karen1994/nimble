<?php
$db= new Conexion();
$Entrada_id = $_GET['id'];

$sql = "select * from alcoholimetro where alcoholimetro.idnumPatrimonio='$Entrada_id'";

$query = $db->query($sql);
$Entrada=null;

if($query->num_rows >0){

     while($r=$query->fetch_object()){
         $Entrada=$r;
         break;
     }
}

?>

<?php if($Entrada != null){?>


  <div class="container">

  <form action="" class="form-horizontal">

     <br>
     <div class="form-group">
           <div class="col-md-4 col-md-offset-10">
     <a href="?view=verAlcoholimetro" class="btn btn-success"><span class="glyphicon glyphicon-arrow-left"></span> Regresar</a>
           </div>
     </div>

       <div class="form-group">
             <div class="col-md-8 col-md-offset-4">
       <h1>Entrada de Alcoholimetro</h1>
             </div>
       </div>
  <br>

  <div class="form-group" style="display:none;">
       <label for="TipoActivo" class="control-label col-md-4">Tipo Activo:</label>
       <div class="col-md-5">
       <input class="form-control" id="TipoActivo" value="<?php echo $Entrada->idTipoActivo;?>" type="text" maxlength="15" placeholder="">
       </div>
     </div>

       <div class="form-group" id="Patrimonio">
            <label for="NumeroPatrimonio" class="control-label col-md-4">Numero de Patrimonio</label>
            <div class="col-md-5">
            <input class="form-control" id="NumeroPatrimonio" onfocus="return validaciones()" value="<?php echo $Entrada->idnumPatrimonio;?>" type="text" disabled maxlength="15" placeholder="">
            </div>
          </div>

          <div class="form-group" id="FecEntrada">
            <label for="FechaEntradaAlcohol" class="control-label col-md-4">Fecha de entrada</label>
            <div class="col-md-5">
            <input class="form-control" id="FechaEntradaAlcohol" onfocus="return validaciones()" type="date" maxlength="15" placeholder="">
            </div>
          </div>

     <div class="form-group" id="HoraEntrada">
          <label for="HoraEntradaAlcohol" class="control-label col-md-4">Hora de entrada</label>
          <div class="col-md-5">
          <input class="form-control" id="HoraEntradaAlcohol" onfocus="return validaciones()" type="time" placeholder="">
          </div>
     </div>

     <div class="form-group" id="ultimaPrueba">
          <label for="UltimaPrueba" class="control-label col-md-4">Número de ultima Prueba</label>
          <div class="col-md-5">
          <input class="form-control" id="UltimaPrueba" onfocus="return validaciones()" type="text" maxlength="3" placeholder="">
          </div>
     </div>

     <div class="form-group" id="EntregaEntrada">
          <label for="OfiEntregaEntrada" class="control-label col-md-4">Codigo del oficial que entrega</label>
          <div class="col-md-5">
          <input class="form-control" id="OfiEntregaEntrada" onfocus="return validaciones()" type="text" maxlength="5" placeholder="">
          </div>
    </div>


     <div class="form-group" id="RecibeEntrada">
          <label for="OfiRecibeEntrada" class="control-label col-md-4">Codigo del oficial que recibe</label>
          <div class="col-md-5">
          <input class="form-control" id="OfiRecibeEntrada" onfocus="return validaciones()" type="text" maxlength="5" placeholder="">
          </div>
    </div>


    <div class="form-group">
     <label for="observacionesEntrada" class="control-label col-md-4">Observaciones</label>
     <div class="col-md-5">
     <textarea id="observacionesEntrada" rows="8" cols="40"  maxlength="100" placeholder=""></textarea>
     </div>
</div>



    <div class="form-group">
         <div class="col-md-4 col-md-offset-4">
        <p id="_AJAX_RegEntradaAlcoholimetro_"></p>
         </div>
    </div>

  <br>

   <div class="form-group">
        <div class="col-md-8 col-md-offset-4">
          <a id="btnRegEntradaAlcoholimetro" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span> Guardar</a>
           &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <a href="?view=VerAlcoholimetro" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span> Cancelar</a>
        </form>

      </div>

      <?php } else{ ?>
      <p class="alert alert_danger">404 No se Encuentra </p>
      <?php }?>
