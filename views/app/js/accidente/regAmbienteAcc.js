
function regAmbiente(){
  alert("Hola");  
  var form, numBoleta,Iluminacion, estAmbiente, aliVertical, aliHorizontal, senVial, tipInterseccion, carriles,estEspecial, claCalzada,
  condCalzada, estCalzada ,exiDe, sentVia, tipAccidente, vehCirculacion, obsVia; 
  
  estEspecial= __('estEspecial');
  claCalzada= __('claCalzada');
  numBoleta= __('numBoleta');
  condCalzada= __('condCalzada');
   estCalzada= __('estCalzada');
   Iluminacion= __('Iluminacion');
   estAmbiente= __('estAmbiente');
   aliVertical= __('aliVertical');
   aliHorizontal= __('aliHorizontal');
   senVial= __('senVial');
   tipInterseccion= __('tipInterseccion');
   carriles= __('carriles');
   exiDe= __('exiDe');
   sentVia= __('sentVia');
   tipAccidente= __('tipAccidente');
   vehCirculacion= __('vehCirculacion');
   obsVia= __('obsVia');
   
  form= 'estEspecial=' + estEspecial.value +
      '&claCalzada=' + claCalzada.value +
      '&numBoleta='+ numBoleta.value +
     '&condCalzada=' + condCalzada.value +
       '&estCalzada=' + estCalzada.value +
       '&Iluminacion=' + Iluminacion.value +
       '&estAmbiente=' + estAmbiente.value +
       '&aliVertical=' + aliVertical.value +
       '&aliHorizontal=' + aliHorizontal.value +
       '&senVial=' + senVial.value +
       '&tipInterseccion=' + tipInterseccion.value +
       '&carriles=' + carriles.value +
       '&exiDe=' + exiDe.value +
       '&sentVia=' + sentVia.value +
       '&tipAccidente=' + tipAccidente.value +
       '&vehCirculacion=' + vehCirculacion.value  +
       '&obsVia=' + obsVia.value ;
       alert("hola2");
       connect = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP'); //Función que permite que se visualice en todos los  navegadoresconnect.onreadystatechange = function() {
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
        
        __('_AJAX_ACCIDENTE_').innerHTML = result;
        
        window.location.assign("?view=verAccidente");
        
      } else {
        __('_AJAX_ACCIDENTE_').innerHTML = connect.responseText; //Se muestran los errores
      }
    } else if(connect.readyState != 4) {
        //Muestra mensaje de procesamiento.
      result = '<div class="alert alert-dismissible alert-info">';
      result += '<button type="button" class="close" data-dismiss="alert">x</button>';
      result += '<h4>Procesando...</h4>';
      result += '<p><strong>Se esta ejecuntando la petición.</strong></p>';
      result += '</div>';
      __('_AJAX_ACCIDENTE_').innerHTML = result;
     
    }
  
  connect.open('POST','ajax.php?mode=regAmbiente',true); //Abre una conexión con ajax
  connect.setRequestHeader('Content-Type','application/x-www-form-urlencoded'); //Mantiene los datos encriptados.
  connect.send(form);//Envia los datos a ajax
    
}

function validarFRM2(){
    if(estEspecial.value === "0"){
          //$("#1").removeClass('has-error');
          $("#1").addClass('has-error');
          estEspecial.focus();
     }else if(claCalzada.value === "0"){
          $("#2").addClass('has-error');
          claCalzada.focus();
     }else if(condCalzada.value === "0"){
          $("#3").addClass('has-error');
          condCalzada.focus();
     }else if(estCalzada.value === "0"){
          $("#4").addClass('has-error');
          estCalzada.focus();
     }else if(Iluminacion.value === "0"){
          $("#5").addClass('has-error');
          Iluminacion.focus();
     }else if(estAmbiente.value === "0"){
          $("#6").addClass('has-error');
         estAmbiente.focus();
     }else if(aliVertical.value === "0"){
          $("#7").addClass('has-error');
          aliVertical.focus();
     }else if(aliHorizontal.value === "0"){
          $("#8").addClass('has-error');
          aliHorizontal.focus();
     }else if(senVial.value === "0"){
          $("#9").addClass('has-error');
          senVial.focus();
     }else if(tipInterseccion.value === "0"){
          $("#10").addClass('has-error');
          tipInterseccion.focus();
     }else if(carriles.value === "0"){
          $("#11").addClass('has-error');
          carriles.focus();
     }else if(exiDe.value === "0"){
          $("#12").addClass('has-error');
          exiDe.focus();
     }else if(sentVia.value === "0"){
          $("#13").addClass('has-error');
         sentVia.focus();
     }else if(tipAccidente.value === "0"){
          $("#14").addClass('has-error');
          tipAccidente.focus();
     }else if(vehCirculacion.value === "0"){
          $("#15").addClass('has-error');
          vehCirculacion.focus();
     }else if(obsVia.value === "0"){
          $("#16").addClass('has-error');
          obsVia.focus();
     }else{
         $("#btnGuadarDIV").show();
     }
       
}

function datosCorrectos(){
    
     if(estEspecial.value !== "0"){
          $("#1").removeClass('has-error');
          $("#1").addClass('has-success');
     } if (claCalzada.value != 0){
         $("#2").removeClass('has-error');
          $("#2").addClass('has-success');
     } if (condCalzada.value != 0){
         $("#3").removeClass('has-error');
          $("#3").addClass('has-success');
     } if (estCalzada.value != 0){
         $("#4").removeClass('has-error');
          $("#4").addClass('has-success');
     } if (Iluminacion.value != 0){
         $("#5").removeClass('has-error');
          $("#5").addClass('has-success');
     } if (estAmbiente.value != 0){
         $("#6").removeClass('has-error');
          $("#6").addClass('has-success');
     } if (aliVertical.value != 0){
         $("#7").removeClass('has-error');
          $("#7").addClass('has-success');
     } if (aliHorizontal.value != 0){
         $("#8").removeClass('has-error');
          $("#8").addClass('has-success');
     } if (senVial.value != 0){
         $("#9").removeClass('has-error');
          $("#9").addClass('has-success');
     } if (tipInterseccion.value != 0){
         $("#10").removeClass('has-error');
          $("#10").addClass('has-success');
     } if (carriles.value != 0){
         $("#11").removeClass('has-error');
          $("#11").addClass('has-success');
     } if (exiDe.value != 0){
         $("#12").removeClass('has-error');
          $("#12").addClass('has-success');
     } if (sentVia.value != 0){
         $("#13").removeClass('has-error');
          $("#13").addClass('has-success');
     } if (tipAccidente.value != 0){
         $("#14").removeClass('has-error');
          $("#14").addClass('has-success');
     } if (vehCirculacion.value != 0){
         $("#15").removeClass('has-error');
          $("#15").addClass('has-success');
     } if (obsVia.value != 0){
         $("#16").removeClass('has-error');
          $("#16").addClass('has-success');
     }
}


/*function combo1(){
    var label=    __('amb1');
    var select= __('estEspecial').value;
    label.innerHTML= select; }
function combo2(){
     var label=   __('amb2');
     var select= __('claCalzada').value;
     label.innerHTML= select;  }
function combo3(){
     var label=   __('amb3');
     var select= __('condCalzada').value;
     label.innerHTML= select;  }
function combo4(){
     var label=   __('amb4');
     var select= __('estCalzada').value;
     label.innerHTML= select;  }
function combo5(){
     var label=   __('amb5');
     var select= __('Iluminacion').value;
     label.innerHTML= select;  }
function combo6(){
     var label=   __('amb6');
     var select= __('estAmbiente').value;
     label.innerHTML= select;  }
function combo7(){
     var label=   __('amb7');
     var select= __('aliVertical').value;
     label.innerHTML= select;  }
function combo8(){
     var label=   __('amb8');
     var select= __('aliHorizontal').value;
     label.innerHTML= select;  }
function combo9(){
     var label=   __('amb9');
     var select= __('senVial').value;
     label.innerHTML= select;  }
function combo10(){
     var label=   __('amb10');
     var select= __('tipInterseccion').value;
     label.innerHTML= select;  }
function combo11(){
     var label=   __('amb11');
     var select= __('carriles').value;
     label.innerHTML= select;  }
function combo12(){
     var label=   __('amb12');
     var select= __('exiDe').value;
     label.innerHTML= select;  }
function combo13(){
     var label=   __('amb13');
     var select= __('sentVia').value;
     label.innerHTML= select;  }
function combo14(){
     var label=   __('amb14');
     var select= __('tipAccidente').value;
     label.innerHTML= select;  }
function combo15(){
     var label=   __('amb15');
     var select= __('vehCirculacion').value;
     label.innerHTML= select;  }
function combo16(){
     var label=   __('amb16');
     var select= __('obsVia').value;
     label.innerHTML= select;  } */

window.onload= function(){
  var btnTerminar2= __('btnTerminar2');
  var btnGuardar= __('btnGuardarAmbiente');
  //var select= __('estEspecial');
  
  //btnTerminar.addEventListener("click",regAccidente);
   btnTerminar2.addEventListener("click", validarFRM2);
  btnGuardar.addEventListener("click", regAmbiente);
  //select.addEventListener("onchange", combo);
};

