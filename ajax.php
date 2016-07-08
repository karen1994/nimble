<?php
#Evalua  los tipos de acciones que define el usuario, lo redirecciona a la
#misma.
 if($_POST){
  require('core/core.php');
  switch (isset($_GET['mode'])? $_GET['mode']:null) {

  case 'login':
      require('core/bin/ajax/goLogin.php');
      break;

  case 'reg':
      require('core/bin/ajax/goReg.php');
      break;

  /**************** ACCIDENTE ***********************/
         
          
          
      case 'reporteAccidente':
        require('core/bin/ajax/reporteAccidente.php');
         break;
          
 case 'regAccidente':
      require('core/bin/ajax/regAccidente.php');
       break;
          
      case 'editarAccidente':
    require('core/bin/ajax/editarAccidente.php');
       break;
          
  case 'regAmbiente':
     require('core/bin/ajax/regAmbiente.php');
      break;
  
  case 'editarAmbiente':
      require('core/bin/ajax/editarAmbiente.php');
       break;
          
      case 'editarRuta':
        require('core/bin/ajax/editarRuta.php');
          break;
          
      case 'editarImplicados':
          require('core/bin/ajax/editarImplicados.php');
          break;
          
 /********************* ACTIVOS *******************************/

          case 'RegEntradaAlcoholimetro':
        require('core/bin/ajax/RegEntradaAlcohol.php');
         break;

         case 'regSalidaAlcoholimetro':
        require('core/bin/ajax/RegSalidaAlcohol.php');
        break;

        case 'EditarEntradaAlcoholimetro':
    require('core/bin/ajax/editarEntradaAlcoholimetro.php');
    break;

    case 'EditarSalidaAlcoholimetro':
       require('core/bin/ajax/editarSalidaAlcoholimetro.php');
       break;

   case 'regAlcoholimetro':
       require('core/bin/ajax/goAlcoholimetro.php');
       break;

   case 'editAlcoholimetro':
      require('core/bin/ajax/editarAlcoholimetro.php');
      break;

      /*case 'regVehiculo':
         require('core/bin/ajax/regVehiculo.php');
         break;*/
         case 'editVehiculo':
               require('core/bin/ajax/editarVehiculo.php');
               break;

   /*case 'editVehiculo':
      require('core/bin/ajax/editarVehiculo.php');
      break;*/

      /*case 'RegSalidaAlcoholimetro':
       require('core/bin/ajax/RegSalidaAlcohol.php');
       break;*/


  /****************Vehiculo Oficial***************************/



  case 'EntradaVehiculo':
    require('core/bin/ajax/RegEntradaVehiculo.php');
    break;

    case 'EditarEntradaVehiculo':
    require('core/bin/ajax/editarEntradaVehiculo.php');
    break;

    case 'regVehiculo':
   require('core/bin/ajax/regVehiculo.php');
   break;

   case 'EditarSalidaVehiculo':
   require('core/bin/ajax/editarSalidaVehiculo.php');
   break;


    /*case 'regEntradaVehiculo':
     require('core/bin/ajax/RegEntradaVehiculo.php');
     break;*/

    /*case 'editEntradaVehiculo':
    require('core/bin/ajax/editarEntradaVehiculo.php');
    break;*/

    case 'regSalidaVehiculo':
    require('core/bin/ajax/RegSalidaVehiculo.php');
    break;

  /*case 'editSalidaVehiculo':
      require('core/bin/ajax/editarSalidaVehiculo.php');
      break;*/

/************************OFICIALES************************************/

  case 'EditarDatosPersOficiales':
  require('core/bin/ajax/EditarDatosPersonaOficial.php');
  break;

   case 'EditarProfesion':
   require('core/bin/ajax/EditarProfesionOficial.php');
   break;

   case 'EditarPermisos':
   require('core/bin/ajax/EditarPermisosOficial.php');
   break;

   case 'regOficiales':
      require('core/bin/ajax/goOficiales.php');
      break;

/*********************Salida alcoholimetro*******************/
  /*case 'SalidaAlcoholimetro':
      require('core/bin/ajax/RegSalidaAlcohol.php');
      break;*/

  /*********************Detencion matricula********************/
   case 'regMatricula':
      require('core/bin/ajax/goMatricula.php');
      break;

   case 'editMatricula':
      require('core/bin/ajax/editMatricula.php');
      break;

   case 'salMatricula':
      require('core/bin/ajax/salMatricula.php');
      break;

    case 'editPlaca':
       require('core/bin/ajax/editPlaca.php');
       break;

     case 'editMoMatricula':
        require('core/bin/ajax/editMoMatricula.php');
        break;

     case 'editPeMatricula':
        require('core/bin/ajax/editPeMatricula.php');
        break;

    case 'editSalMatricula':
        require('core/bin/ajax/editSalMatricula.php');
        break;

/**********************DETENCIONES AUTOMOVIL *******************/
case 'regAutomovil':
    require('core/bin/ajax/regAutoDet.php');
     break;

case 'editarDetencionAuto':
    require('core/bin/ajax/editDetAuto.php');
     break;

case 'editarAuto':
    require('core/bin/ajax/editAuto.php');
      break;

case 'editMoAuto':
    require('core/bin/ajax/editMoAuto.php');
     break;

case 'editPeAuto':
    require('core/bin/ajax/editPeAuto.php');
      break;

case 'salidaAuto':
    require('core/bin/ajax/salAuto.php');
     break;

case 'editSalAuto':
    require('core/bin/ajax/editSalAuto.php');
      break;

case 'editPeSalAuto':
    require('core/bin/ajax/editPeSalAuto.php');
      break;

      
      
/*********************Default********************/
   default:
         header('location:index.php');
         break;
  }
} else{
  header('location:index.php');
}
?>
