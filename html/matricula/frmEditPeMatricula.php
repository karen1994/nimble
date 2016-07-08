<?php
$db= new Conexion();
$ConsecutivoP_id= $_GET['id'];

$sql = "select * from Persona".$ConsecutivoP_id;

$query = $db->query($sql);
$ConsecutivoP=null;

if($query->num_rows >0){

     while($r=$query->fetch_object()){
        $ConsecutivoP=$r;
         break;
     }
}

?>

<?php if($ConsecutivoP != null){?>

  <!-- Formulario matricula-->
  <div class="container">
  <br>
      <form name="form1" action="" class="form-horizontal">

        <div class="form-group">
              <div class="col-md-4 col-md-offset-10">
        <a href="?view=verMatricula" class="btn btn-success">Regresar</a>
              </div>
        </div>

        <div class="form-group">
              <div class="col-md-4 col-md-offset-4">
        <h1> Formulario editar persona</h1>
              </div>
        </div>

       <div class="form-group">
         <label for="cedPersona" class="control-label col-md-4">Número de cédula</label>
            <div class="col-md-5">
        <input class="form-control" id="cedPersona" type="text" maxlength="9" placeholder="" value="65465" >
            </div>
       </div>

        <div class="form-group">
          <label for="nomPersona" class="control-label col-md-4">Nombre</label>
            <div class="col-md-5">
          <input class="form-control" id="nomPersona" type="text" placeholder="" value="Karen">
            </div>
        </div>

        <div class="form-group">
          <label for="ape1" class="control-label col-md-4">Primer apellido</label>
              <div class="col-md-5">
          <input class="form-control" id="ape1" type="text"  placeholder="" value="PRUEBA">
              </div>
        </div>


   <div class="form-group ">
        <label for="ape2" class="control-label col-md-4">Segundo apellido</label>
          <div class="col-md-5">
        <input class="form-control" id="ape2" type="text"  placeholder="" value="Karen">
          </div>
   </div>

  <div class="form-group">
      <div class="col-md-4 col-md-offset-4">
      <p id="_AJAX_Matricula_"></p>
      </div>
  </div>

  <div class="form-group">
      <div class="col-md-4 col-md-offset-4">
      <input id="btnGuardarMatricula" type="button"  value="Guardar">
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <input id="btnCancelarMatricula" type="button" value="Cancelar">
      </div>
  </div>

  <br>
  <br>

   </form>

  </div>
  <?php } else{ ?>
   <p class="alert alert_danger">404 No se Encuentra </p>
   <?php }?>