function registroMatricula() {
  var connect, form, response, result, numConsecutivo, numBoletaMatricula,
  fecBoleta, numPlaca,  tomEntMatricula, folEntMatricula, ofiDetMatricula, ofiRecMatricula;
// Parametros capturados del formulario

  numConsecutivo= __('numConsecutivo').value;
  numBoletaMatricula= __('numBoletaMatricula').value;
  fecBoleta= __('fecBoleta').value;
  numPlaca= __('numPlaca').value;
  tomEntMatricula= __('tomEntMatricula').value;
  folEntMatricula= __('folEntMatricula').value;
  ofiDetMatricula= __('ofiDetMatricula').value;
  ofiRecMatricula= __('ofiRecMatricula').value;



  //************** Se abre la conexion, si todo esta bien
      form ='numConsecutivo=' + numConsecutivo +
      '&numBoletaMatricula=' + numBoletaMatricula +
      '&fecBoleta=' +  fecBoleta +
      '&numPlaca=' + numPlaca +
      '&tomEntMatricula=' + tomEntMatricula +
      '&folEntMatricula=' + folEntMatricula +
      '&ofiDetMatricula=' + ofiDetMatricula +
      '&ofiRecMatricula=' + ofiRecMatricula;
  


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
        result += '<h4>Actualización completada !</h4>';
        result += '</div>';
        __('_AJAX_Matricula_').innerHTML = result;
        location.reload();
      } else {
        __('_AJAX_Matricula_').innerHTML = connect.responseText; //Se muestran los errores
      }
    } else if(connect.readyState != 4) {
        //Muestra mensaje de procesamiento.
      result = '<div class="alert alert-dismissible alert-warning">';
      result += '<button type="button" class="close" data-dismiss="alert">x</button>';
      result += '<h4>Procesando...</h4>';
      result += '<p><strong>Registrando datos...</strong></p>';
      result += '</div>';
      __('_AJAX_Matricula_').innerHTML = result;
    }
  }
  connect.open('POST','ajax.php?mode=editMatricula',true); //Abre una conexión con ajax
  connect.setRequestHeader('Content-Type','application/x-www-form-urlencoded'); //Mantiene los datos encriptados.
  connect.send(form); //Envia los datos a ajax

}

function runScriptEditMatricula(e) { //Método par detectar la tecla enter
  if(e.keyCode == 13) {
    registroMatricula(); //Llama el método
  }
}

window.onload= function(){

  var btnActualizar= __('btnActualizar');
  var btnCancelarSaMatricula= __('btnCancelarSaMatricula');

  btnActualizar.addEventListener("click", registroMatricula);
  btnCancelarSaMatricula.addEventListener("click", registroMatricula);
};
