<?php
	include "database.php";

	$user_id;

	$sql1= "SELECT eq.id,eq.orden,eq.item,eq.tipo,eq.modelo,eq.serie,es.estado_nombre,eq.fecha,eq.comentario,eq.contrato,eq.razon_social,eq.direccion,eq.localidad,eq.digitacion 
	FROM equipo as eq INNER JOIN estado as es ON eq.estado=es.estado_id";
	$result = $conn->query($sql1);
	$result ->execute();	
?>

<?php if($row_count = $result->rowCount() > 0){  ?>

<table id="example" class="table table-hover table-responsive">
<thead>
	<th><font size=2>Orden</th>
	<th><font size=2>Item</th>
	<th><font size=2>Tipo Orden</th>
	<th><font size=2>Modelo</th>
	<th><font size=2>Serie</th>
	<th><font size=2>Estado</th>
	<th><font size=2>Fecha Estado</th>
	<th><font size=2>Comentarios</th>
	<th><font size=2>Cliente</th>
	<th><font size=2>Contrato</th>
	<th><font size=2>Razon Social</th>
	<th><font size=2>Direccion</th>
	<th><font size=2>Localidad</th>
	<th><font size=2>Fecha Digitacion</th>
	<th></th>

</thead>
<?php 
	$row = $result->fetchAll(PDO::FETCH_ASSOC);
	foreach ($row as $r){ 
?>
<tr>
	<td><font size=1><?php echo $r["orden"]; ?></td>
	<td><font size=1><?php echo $r["item"]; ?></td>
	<td><font size=1><?php echo $r["tipo"]; ?></td>
	<td><font size=1><?php echo $r["modelo"]; ?></td>
	<td><font size=1><?php echo $r["serie"]; ?></td>
	<td><font size=1><?php echo $r["estado_nombre"]; ?></td>
	<td><font size=1><?php echo $r["fecha"]; ?></td>
	<td><font size=1><?php echo $r["comentario"]; ?></td>
	<td><font size=1><?php echo $r["cliente"]; ?></td>
	<td><font size=1><?php echo $r["contrato"]; ?></td>
	<td><font size=1><?php echo $r["razon_social"]; ?></td>
	<td><font size=1><?php echo $r["direccion"]; ?></td>
	<td><font size=1><?php echo $r["localidad"]; ?></td>
	<td><font size=1><?php echo $r["digitacion"]; ?></td>
	<td style="width:150px;">
		<a href="./editar.php?id=<?php echo $r["id"];?>" class="btn btn-xs btn-danger">Editar</a>
	<!--	<a href="#" id="del-<?/*php echo $r["id"];*/?>" class="btn btn-sm btn-danger">Eliminar</a> -->
		<script>
			$("#del-"+<?php echo $r["id"];?>).click(function(e){
				e.preventDefault();
				p = confirm("Estas seguro?");
				if(p){
					window.location="./php/eliminar.php?id="+<?php echo $r["id"];?>;
				}
			});
		</script>
	</td>
</tr>
<?php }; ?>

</table>

<?php } else { ?>
	<p class="alert alert-warning">No hay resultados</p>
<?php }; ?>