<?php
/*Incluye el documento conexion.php*/
  $db  = new Conexion();

$user_id=null;
$sql = $db->query("SELECT * FROM salidadetencion INNER JOIN detenciones ON salidadetencion . idDetenciones = detenciones . idDetenciones INNER JOIN persona ON salidadetencion.`idPersona` = persona.`idPersona`
INNER JOIN `motocicleta` ON `motocicleta`.`idTipoVehiculo` = `detenciones`.`idTipoVehiculo`");
?>

<!-- Tabla-->
<?php if($sql->num_rows>0):?>
  <div class="table-responsive">
<table class="table table-bordered table-hover"> <!--Inico de tabla-->
<!-- Campos de la tabla -->
<thead>
	<th>Boleta</th>
	<th>Placa</th>
	<th>Autoridad que entrega</th>
  <th>Oficial que entrega</th>
  <th>Fecha de entrega</th>
  <th>Número de oficio</th>
	<th>Número de tomo</th>
  <th>Número de folio</th>
  <th></th>
  <th></th>

</thead>
<!-- Muestra los datos en los campos correspondientes -->
<?php while ($r=$sql->fetch_array()):?>
<tr>
	<td><?php echo $r["numBoletaDetencion"]; ?></td>
	<td><?php echo $r["numPlacaMoto"]; ?></td>
  <td><?php echo $r["autoridadEntrega"]; ?></td>
	<td><?php echo $r["codOficialEntrega"]; ?></td>
  <td><?php echo $r["fecEntregaVehiculo"]; ?></td>
  <td><?php echo $r["numOficioSalida"]; ?></td>
  <td><?php echo $r["tomSalDetencion"]; ?></td>
  <td><?php echo $r["folSalDetencion"]; ?></td>

  <td style="width:150px;"> <!-- Inicia columnas de botones -->
    <!-- Botón de editar salida -->
    <a href="?view=EditarSalidaMoto&&id=<?php echo $r['idSalidaDetencion'];?>" class="btn btn-sm btn-warning"><span class="glyphicon glyphicon-pencil"></span> Editar salida</a>
  </td>

  <!-- Botón editar persona -->
<td>
  <a href="?view=EditarPeSalMoto&&id=<?php echo $r['idPersona'];?>"  class="btn btn-sm btn-success"><span class="glyphicon glyphicon-user"></span> Ver persona</a>
</td>
</tr><!-- Fin columnas de botones -->
<?php endwhile;?>
</table> <!--Fin de tabla-->
  </div>
<?php else:?>
	<p class="alert alert-warning">No hay resultados</p> <!-- Alerta de si hay registros -->
<?php endif;?>
