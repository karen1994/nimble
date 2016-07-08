function registroEntradaVehiculo(){
  var connect, form, response, result, fechaEntrada, horaEntrada, kmFinal, recorrido, numeroFactura, autorizacion,
  horaFactura, litrosFacturados, km, montoFactura, pernote, OficEntregaEntrada, OficRecibeEntrada, observEntrada, NumeroPlaca,
  TipoActivo;

  //Parametros capturados del formulario de HTML


 fechaEntrada= __('fechaEntrada');
 horaEntrada= __('horaEntrada');
 kmFinal= __('kmFinal');
 recorrido= __('recorrido');
 numeroFactura= __('numeroFactura');
 autorizacion= __('autorizacion');
 horaFactura= __('horaFactura');
 litrosFacturados= __('litrosFacturados');
 km= __('km');
 montoFactura= __('montoFactura');
 pernote= __('pernote');
 OficEntregaEntrada= __('OficEntregaEntrada');
 OficRecibeEntrada= __('OficRecibeEntrada');
 observEntrada= __('observEntrada');
 NumeroPlaca= __('NumeroPlaca');
 TipoActivo= __('TipoActivo');

 if(fechaEntrada.value == ""){
   alert("El campo fecha de entrada es requerido");
  fechaEntrada.focus();
  $("#fecEntrada").addClass('has-error');
 }else if(horaEntrada.value == ""){
   alert("El campo hora de entrada es requerido");
   horaEntrada.focus();
   $("#HoEntrada").addClass('has-error');
 }else if(kmFinal.value == ""){
   alert("El campo kilometraje final es requerido");
   kmFinal.focus();
   $("#kmFi").addClass('has-error');
 }else if(recorrido.value == ""){
   alert("El campo recorrido es requerido");
   recorrido.focus();
   $("#Recorrido").addClass('has-error');
 }else if(numeroFactura.value == ""){
   alert("El campo numero de factura es requerido");
  numeroFactura.focus();
  $("#NumeroFact").addClass('has-error');
 }else if(autorizacion.value == ""){
   alert("El campo autorizacion es requerido");
  autorizacion.focus();
  $("#Autorizacion").addClass('has-error');
 }else if(horaFactura.value == ""){
   alert("El campo hora de factura es requerido");
  horaFactura.focus();
  $("#HoraFact").addClass('has-error');
 }else if(litrosFacturados.value == ""){
   alert("El campo litros facturados es requerido");
  litrosFacturados.focus();
  $("#litros").addClass('has-error');
 }else if(km.value == ""){
   alert("El campo kilometros es requerido");
  km.focus();
  $("#k").addClass('has-error');
 }else if(montoFactura.value == ""){
   alert("El campo monto de factura es requerido");
  montoFactura.focus();
  $("#montoFact").addClass('has-error');
 }else if(pernote.value == ""){
   alert("El campo pernote es requerido");
  pernote.focus();
  $("#perno").addClass('has-error');
 }else if(OficEntregaEntrada.value == ""){
   alert("El campo oficial que entrega es requerido");
  OficEntregaEntrada.focus();
  $("#EntregaEntrada").addClass('has-error');
 }else if(OficRecibeEntrada.value == ""){
   alert("El campo oficial que recibe es requerido");
  OficRecibeEntrada.focus();
  $("#recibeEntrada").addClass('has-error');
 }else{

   //************** Se abre la conexion, si todo esta bien

    form = 'fechaEntrada=' + fechaEntrada.value
    + '&horaEntrada=' + horaEntrada.value + '&kmFinal=' + kmFinal.value + '&recorrido=' + recorrido.value
    + '&numeroFactura=' +  numeroFactura.value + '&autorizacion=' + autorizacion.value + '&horaFactura='+ horaFactura.value
    + '&litrosFacturados=' + litrosFacturados.value + '&km=' + km.value + '&montoFactura=' + montoFactura.value + '&pernote=' + pernote.value
    +'&OficEntregaEntrada='+  OficEntregaEntrada.value + '&OficRecibeEntrada=' + OficRecibeEntrada.value
    + '&observEntrada=' + observEntrada.value + '&NumeroPlaca=' + NumeroPlaca.value + '&TipoActivo=' + TipoActivo.value;

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
                  __('_AJAX_RegEntradaVehiculo_').innerHTML = result;
                  location.reload();
                } else {
                  __('_AJAX_RegEntradaVehiculo_').innerHTML = connect.responseText; //Se muestran los errores
                }
              } else if(connect.readyState != 4) {
                  //Muestra mensaje de procesamiento.
                result = '<div class="alert alert-dismissible alert-warning">';
                result += '<button type="button" class="close" data-dismiss="alert">x</button>';
                result += '<h4>Procesando...</h4>';
                result += '<p><strong>Registrando Datos...</strong></p>';
                result += '</div>';
                __('_AJAX_RegEntradaVehiculo_').innerHTML = result;
              }
  }
  connect.open('POST','ajax.php?mode=EntradaVehiculo',true); //Abre una conexión con ajax
  connect.setRequestHeader('Content-Type','application/x-www-form-urlencoded'); //Mantiene los datos encriptados.
  connect.send(form); //Envia los datos a ajax

 //Boton del Registro
}
}

function validaciones(){
if(fechaEntrada.value != ""){
  $("#fecEntrada").removeClass('has-error');
  $("#fecEntrada").addClass('has-success');
}if(horaEntrada.value != ""){
  $("#HoEntrada").removeClass('has-error');
  $("#HoEntrada").addClass('has-success');
}if(kmFinal.value != ""){
  $("#kmFi").removeClass('has-error');
  $("#kmFi").addClass('has-success');
}if(recorrido.value != ""){
  $("#Recorrido").removeClass('has-error');
  $("#Recorrido").addClass('has-success');
}if(numeroFactura.value != ""){
  $("#NumeroFact").removeClass('has-error');
  $("#NumeroFact").addClass('has-success');
}if(autorizacion.value != ""){
  $("#Autorizacion").removeClass('has-error');
  $("#Autorizacion").addClass('has-success');
}if(horaFactura.value != ""){
  $("#HoraFact").removeClass('has-error');
  $("#HoraFact").addClass('has-success');
}if(litrosFacturados.value != ""){
  $("#litros").removeClass('has-error');
  $("#litros").addClass('has-success');
}if(km.value != ""){
  $("#k").removeClass('has-error');
  $("#k").addClass('has-success');
}if(montoFactura.value != ""){
  $("#montoFact").removeClass('has-error');
  $("#montoFact").addClass('has-success');
}if(pernote.value != ""){
  $("#perno").removeClass('has-error');
  $("#perno").addClass('has-success');
}if(OficEntregaEntrada.value != ""){
  $("#EntregaEntrada").removeClass('has-error');
  $("#EntregaEntrada").addClass('has-success');
}if(OficRecibeEntrada.value != ""){
  $("#recibeEntrada").removeClass('has-error');
  $("#recibeEntrada").addClass('has-success');
}
}

window.onload = function(){
    var btnRegEntrada= __('btnRegEntrada');
    btnRegEntrada.addEventListener("click",registroEntradaVehiculo);

}
