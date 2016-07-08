function editarImplicados () {
    var  form , numBoleta, numImplicados,accCon;
  
  numBoleta = __('numBoleta').value;
 numImplicados = __('numImplicados').value;
 accCon =         __('accCon').value;
 
   
    
    form = 'numBoleta=' + numBoleta +
      '&numImplicados=' + numImplicados+
      '&accCon=' +  accCon;
    
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

       result = '<div class="alert alert-dismissible alert-info">';
      result += '<button type="button" class="close" data-dismiss="alert">x</button>';
      result += '<h4>Registro realizado !</h4>';
      result += '<p><strong>Se guardaron los datos.</strong></p>';
      result += '</div>';
        
        __('_AJAX_').innerHTML = result;
        
        window.location.assign("?view=verAccidente");
        
      } else {
        __('_AJAX_').innerHTML = connect.responseText; //Se muestran los errores
      }
    } else if(connect.readyState != 4) {
        //Muestra mensaje de procesamiento.
      result = '<div class="alert alert-dismissible alert-info">';
      result += '<button type="button" class="close" data-dismiss="alert">x</button>';
      result += '<h4>Procesando...</h4>';
      result += '<p><strong>Se esta ejecuntando la petición.</strong></p>';
      result += '</div>';
      __('_AJAX_').innerHTML = result;
    }
  }
  connect.open('POST','ajax.php?mode=editarImplicados',true); //Abre una conexión con ajax
  connect.setRequestHeader('Content-Type','application/x-www-form-urlencoded'); //Mantiene los datos encriptados.
  connect.send(form);//Envia los datos a ajax
}  


function validarFRM1 () {
    
    if(numBoleta.disabled){
          numImplicados.disabled= false;
         accCon.disabled= false;
         
      }
    
    $("#btnGuadarDIV").show();
    $("#btnCancelarDIV").show();
    
}



window.onload= function () {
  var btnEditar= __('btnEditar');
   var btnGuardar= __('btnGuardar');
    //var btnCancelar __('btnCancelarAmbiente');
  //var select= __('estEspecial');
  
  //btnTerminar.addEventListener("click",regAccidente);
   btnEditar.addEventListener("click", validarFRM1);
    btnGuardar.addEventListener("click", editarImplicados);
    // btnCancelar.addEventListener("click", cancelar);
  //select.addEventListener("onchange", combo);
  };
