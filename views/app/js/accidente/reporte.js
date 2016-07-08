function generarReporte(){
    
     var  fecIncio, fecFinal;
    
     fecIncio=  __('fecIncio');
     fecFinal=  __('fecFinal');
    
    
    
    if(fecIncio.value == ""){
        alert("El campo fecha de incio es requerido");
        fecIncio.focus();
        
    }else if(fecFinal.value == ""){
        alert("El campo fecha de incio es requerido");
        fecFinal.focus();
        
    }else{
      
 window.location.assign("?view=reporteGenerado&&id="+fecIncio.value+"&&id2="+fecFinal.value);
        
    }
      
}


function prueba(){
    alert("Hola");
}

window.onload= function(){
  var btnGenerar= __('btnGenerar');
   
 // var btnGuardar= __('btnGuardar');
 // var select= __('estEspecial');
  
  //btnTerminar.addEventListener("click",regAccidente);
   btnGenerar.addEventListener("click", generarReporte);
    
 // btnGuardar.addEventListener("click", regAccidente);
  //select.addEventListener("onchange", combo);
  };
