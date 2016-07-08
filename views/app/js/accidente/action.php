<?php
//$conexion = new mysqli('localhost', DB_SERVER_USERNAME, DB_SERVER_PASSWORD, DB_DATABASE);
echo "hola";
 $db= new Conexion();
$id_provincia = $_POST['id_provincia'];

$result = $db->query("SELECT *FROM canton WHERE idProvincia= ".$id_provincia);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {                
        $html .= '<option value="'.$row['idCanton'].'">'.$row['nomCanton'].'</option>';
    }
}
echo $html;
/*
function  getcanton{
    $db= new Conexion();
    $query= "SELECT *FROM canton WHERE `idProvincia` = ".$_POST['id'];
    $sql = $db->query($query);
 
 $resp = "<option value=''>-Seleccione-</option>";
   while ($r=$sql->fetch_object()){
    $resp. = "<option value='".$r->idCanton.
    "'>".$value->nomCanton.
    "</option>";
  }
  echo $resp;
 $db->close();
}
 
function getdistrito() {
 $db2= new Conexion();
    $query= "SELECT *FROM `distrito` WHERE `idCanton` = ".$_POST['id'];
    $sql = $db2->query($query);
    
    
  $resp = "<option value=''>-Seleccione Ciudad-</option>";
 while ($r2=$sql->fetch_object()){
    $resp. = "<option value='".$r2->idDistrito.
    "'>".$value->nomDistrito.
    "</option>";
  }
  echo $resp;
}
 
if ($_POST){
  switch ($_POST["task"]) {
    case "getcanton":
     getcanton();
      break;
    case "getdistrito":
      getdistrito();
      break;
  }
} ?>*/