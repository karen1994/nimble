function registroEntradaSalidaAlcohol(){
  var connect, form, response, result,FechaSalidaAlcohol,HoraSalidaAlcohol,OfiEntregaSalida,OfiRecibeSalida,FechaEntradaAlcohol,
  HoraEntradaAlcohol,UltimaPrueba,OfiEntregaEntrada,OfiRecibeEntrada,ObservacionesSalida,observacionesEntrada,NumeroPatrimonio;
  //Parametros capturados del formulario de HTML
 
 
 FechaSalidaAlcohol = __('FechaSalidaAlcohol').value;
 HoraSalidaAlcohol = __('HoraSalidaAlcohol').value;
 OfiEntregaSalida= __('OfiEntregaSalida').value;
 OfiRecibeSalida= __('OfiRecibeSalida').value;
 FechaEntradaAlcohol= __('FechaEntradaAlcohol').value;
 HoraEntradaAlcohol= __('HoraEntradaAlcohol').value;
 UltimaPrueba= __('UltimaPrueba').value;
 OfiEntregaEntrada= __('OfiEntregaEntrada').value;
 OfiRecibeEntrada= __('OfiRecibeEntrada').value;
 ObservacionesSalida= __('ObservacionesSalida').value;
 observacionesEntrada= __('observacionesEntrada').value;
 NumeroPatrimonio= __('NumeroPatrimonio').value;



  /*alert("Datos enviados"+ idnumPatrimonio + numUltimaPrueba  + estadoAlcoholimetro +
        observaciones  + estadoServicioalcoh );*/   
        //************** Se abre la conexion, si todo esta bien
     form = 'FechaSalidaAlcohol=' + FechaSalidaAlcohol + '&HoraSalidaAlcohol=' + HoraSalidaAlcohol  +
    '&OfiEntregaSalida=' + OfiEntregaSalida +'&OfiRecibeSalida='+ OfiRecibeSalida + '$FechaEntradaAlcohol' + FechaEntradaAlcohol
    + '&HoraEntradaAlcohol' + HoraEntradaAlcohol + '&UltimaPrueba' + UltimaPrueba + '&OfiEntregaEntrada' + OfiEntregaEntrada
    + '&OfiRecibeEntrada' + OfiRecibeEntrada + '&ObservacionesSalida' + ObservacionesSalida + '&observacionesEntrada'+ observacionesEntrada
    + '&NumeroPatrimonio' + NumeroPatrimonio;
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
        __('_AJAX_EntradaSalidaAlcoholimetro_').innerHTML = result;
        location.reload();
      } else {
        __('_AJAX_EntradaSalidaAlcoholimetro_').innerHTML = connect.responseText; //Se muestran los errores
      }
    } else if(connect.readyState != 4) {
        //Muestra mensaje de procesamiento.
      result = '<div class="alert alert-dismissible alert-warning">';
      result += '<button type="button" class="close" data-dismiss="alert">x</button>';
      result += '<h4>Procesando...</h4>';
      result += '<p><strong>Registrando Datos...</strong></p>';
      result += '</div>';
      __('_AJAX_EntradaSalidaAlcoholimetro_').innerHTML = result;
    }
  }
  connect.open('POST','ajax.php?mode=editEntraSaliAlcoholimetro',true); //Abre una conexión con ajax
  connect.setRequestHeader('Content-Type','application/x-www-form-urlencoded'); //Mantiene los datos encriptados.
  connect.send(form); //Envia los datos a ajax
 
 //Boton del Registro
 

}

function runScriptEntraSaliAlcohol(e) {
  if(e.keyCode == 13) {
    registroEntradaSalidaAlcohol();
  } 
}

window.onload = function(){
    var btnRegistrar=__('btnEntradaSalidaAlcohol');
    btnRegistrar.addEventListener("click",registroEntradaSalidaAlcohol);
    
}
