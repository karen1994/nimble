function registroSalidaVehiculo(){
  var connect, form, response, result, FechaSalida, HoraSalida, OficEntregaSalida, OficRecibeSalida, observSalida, NumeroPlaca,
  TipoActivo;
  //Parametros capturados del formulario de HTML


FechaSalida= __('FechaSalida');
 HoraSalida=   __('HoraSalida');
 OficEntregaSalida= __('OficEntregaSalida');
 OficRecibeSalida=__('OficRecibeSalida');
 observSalida=__('observSalida');
 NumeroPlaca=__('NumeroPlaca');
 TipoActivo= __('TipoActivo');

 if(FechaSalida.value == ""){
   alert("El campo fecha salida es requerido");
   FechaSalida.focus();
    $("#FecSalida").addClass('has-error');
 }else if(HoraSalida.value == ""){
   alert("El campo hora de salida es requerido");
   HoraSalida.focus();
    $("#horaSalida").addClass('has-error');
 }else if(OficEntregaSalida.value == ""){
   alert("El campo oficial que entrega es requerido");
   OficEntregaSalida.focus();
    $("#EntregaSalida").addClass('has-error');
 }else if(OficRecibeSalida.value == ""){
   alert("El campo oficial que recibe es requerido");
   OficRecibeSalida.focus();
    $("#RecibeSalida").addClass('has-error');
 }else{

   //************** Se abre la conexion, si todo esta bien
    form = 'FechaSalida=' + FechaSalida.value + '&HoraSalida=' + HoraSalida.value  +
    '&OficEntregaSalida=' + OficEntregaSalida.value +'&OficRecibeSalida='+ OficRecibeSalida.value + '&observSalida='
    + observSalida.value + '&NumeroPlaca=' + NumeroPlaca.value + '&TipoActivo=' + TipoActivo.value;

  connect = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP'); //Función que permite que se visualice en todos los  navegadores
  connect.onreadystatechange = function() {
      /*Estados del objeto connect:
      1= Esta desactivado.
      2= Esta enviando los datos desde cero.
      3= PHP recibe los datos.
      4= PHP devuelve los datos a JavaScript
      STATUS: 404= Cuando no se encuentra ajax.php?mode=login
              200= Cuando si se encuentra el archivo*/
    if(connect.readyState == 4 && connect.status == 200) { //Revisa el estado de la conexión con ajax
      if(connect.responseText == 1) {

        result = '<div class="alert alert-dismissible alert-success">';
        result += '<h4>Registro Completado !</h4>';
         result += '</div>';
        __('_AJAX_SalidaVehiculo_').innerHTML = result;
        location.reload();
      } else {
        __('_AJAX_SalidaVehiculo_').innerHTML = connect.responseText; //Se muestran los errores
      }
    } else if(connect.readyState != 4) {
        //Muestra mensaje de procesamiento.
      result = '<div class="alert alert-dismissible alert-warning">';
      result += '<button type="button" class="close" data-dismiss="alert">x</button>';
      result += '<h4>Procesando...</h4>';
      result += '<p><strong>Registrando Datos...</strong></p>';
      result += '</div>';
      __('_AJAX_SalidaVehiculo_').innerHTML = result;
    }
  }
  connect.open('POST','ajax.php?mode=regSalidaVehiculo',true); //Abre una conexión con ajax
  connect.setRequestHeader('Content-Type','application/x-www-form-urlencoded'); //Mantiene los datos encriptados.
  connect.send(form); //Envia los datos a ajax

 //Boton del Registro
}
}

function validaciones(){
  if(FechaSalida.value != ""){
       $("#FecSalida").removeClass('has-error');
       $("#FecSalida").addClass('has-success');
  } if (HoraSalida.value != ""){
       $("#horaSalida").removeClass('has-error');
        $("#horaSalida").addClass('has-success');
   }if(OficEntregaSalida.value != ""){
        $("#EntregaSalida").removeClass('has-error');
        $("#EntregaSalida").addClass('has-success');
   } if (OficRecibeSalida.value != ""){
        $("#RecibeSalida").removeClass('has-error');
         $("#RecibeSalida").addClass('has-success');
    }
}

window.onload = function(){
    var btnRegSalidaVehiculo= __('btnRegSalidaVehiculo');
    btnRegSalidaVehiculo.addEventListener("click",registroSalidaVehiculo);

}
