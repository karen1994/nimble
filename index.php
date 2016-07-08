<?php
require('core/core.php');


if(isset($_GET['view'])){ //Verifica que GET "view" este definido

if(file_exists('core/controllers/'.strtolower($_GET['view']).'Controller.php')){
  include('core/controllers/'.strtolower($_GET['view']).'Controller.php');
}  else{
       include('core/controllers/errorController.php'); //Controla los errores
}
}else{
  include('core/controllers/indexController.php');
}
 ?>
