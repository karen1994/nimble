function EditarEntradaAlcoholimetro(){
  var connect, form, response, result, FechaEntradaAlcohol, HoraEntradaAlcohol, UltimaPrueba, OfiEntregaEntrada, OfiRecibeEntrada,
  observacionesEntrada, NumeroPatrimonio;
  //Parametros capturados del formulario de HTML



 FechaEntradaAlcohol= __('FechaEntradaAlcohol');
 HoraEntradaAlcohol= __('HoraEntradaAlcohol');
 UltimaPrueba= __('UltimaPrueba');
 OfiEntregaEntrada= __('OfiEntregaEntrada');
 OfiRecibeEntrada= __('OfiRecibeEntrada');
 observacionesEntrada= __('observacionesEntrada');
 NumeroPatrimonio= __('NumeroPatrimonio');

 if(FechaEntradaAlcohol.value == ""){
   alert("El campo fecha de entrada es requerido");
   FechaEntradaAlcohol.focus();
   $("#FecEntrada").addClass('has-error');
 }else if(HoraEntradaAlcohol.value == ""){
   alert("El campo hora de entrada es requerido");
   HoraEntradaAlcohol.focus();
   $("#HoraEntrada").addClass('has-error');
 }else if(UltimaPrueba.value == ""){
     alert("El campo numero de la ultima prueba es requerido");
     UltimaPrueba.focus();
     $("#ultimaPrueba").addClass('has-error');
   }else if(OfiEntregaEntrada.value == ""){
   alert("El campo oficial que entrega es requerido");
   OfiEntregaEntrada.focus();
   $("#EntregaEntrada").addClass('has-error');
 }else if(OfiRecibeEntrada.value == ""){
   alert("El campo oficial que recibe es requerido");
   OfiRecibeEntrada.focus();
   $("#RecibeEntrada").addClass('has-error');
 }else{
   
  /*alert("Datos enviados"+ idnumPatrimonio + numUltimaPrueba  + estadoAlcoholimetro +
        observaciones  + estadoServicioalcoh );*/
        //************** Se abre la conexion, si todo esta bien
     form = 'FechaEntradaAlcohol=' + FechaEntradaAlcohol.value
    + '&HoraEntradaAlcohol=' + HoraEntradaAlcohol.value + '&UltimaPrueba=' + UltimaPrueba.value + '&OfiEntregaEntrada=' + OfiEntregaEntrada.value
    + '&OfiRecibeEntrada=' + OfiRecibeEntrada.value + '&observacionesEntrada='+ observacionesEntrada.value
    + '&NumeroPatrimonio=' + NumeroPatrimonio.value;

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
                  result += '<h4>Actualizacion Completada !</h4>';
                   result += '</div>';
                  __('_AJAX_EditarEntradaAlcoholimetro_').innerHTML = result;
                   location.reload();
                } else {
                  __('_AJAX_EditarEntradaAlcoholimetro_').innerHTML = connect.responseText; //Se muestran los errores
                }
              } else if(connect.readyState != 4) {
                  //Muestra mensaje de procesamiento.
                result = '<div class="alert alert-dismissible alert-warning">';
                result += '<button type="button" class="close" data-dismiss="alert">x</button>';
                result += '<h4>Procesando...</h4>';
                result += '<p><strong>Actualizando Datos...</strong></p>';
                result += '</div>';
                __('_AJAX_EditarEntradaAlcoholimetro_').innerHTML = result;
              }
}
connect.open('POST','ajax.php?mode=EditarEntradaAlcoholimetro',true); //Abre una conexión con ajax
connect.setRequestHeader('Content-Type','application/x-www-form-urlencoded'); //Mantiene los datos encriptados.
connect.send(form); //Envia los datos a ajax

}
}

function validaciones(){
  if(FechaEntradaAlcohol.value != ""){
       $("#FecEntrada").removeClass('has-error');
       $("#FecEntrada").addClass('has-success');
  } if (HoraEntradaAlcohol.value != ""){
       $("#HoraEntrada").removeClass('has-error');
       $("#HoraEntrada").addClass('has-success');
   }if (UltimaPrueba.value != ""){
        $("#ultimaPrueba").removeClass('has-error');
        $("#ultimaPrueba").addClass('has-success');
    }if (OfiEntregaEntrada.value != ""){
         $("#EntregaEntrada").removeClass('has-error');
         $("#EntregaEntrada").addClass('has-success');
     }if (OfiRecibeEntrada.value != ""){
          $("#RecibeEntrada").removeClass('has-error');
          $("#RecibeEntrada").addClass('has-success');
      }

}

window.onload = function(){
    var btnEditarEntradaAlcohol=__('btnEditarEntradaAlcohol');
    btnEditarEntradaAlcohol.addEventListener("click",EditarEntradaAlcoholimetro);

}
