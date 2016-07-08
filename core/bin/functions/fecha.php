<?php 
function formatear($fecha){
    
    $fecha2 = date("d-m-Y",strtotime($fecha)); 
    return $fecha2;
}