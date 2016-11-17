<?php
include "database.php";

$user_id=null;
$id=$_GET["id"];

$sql1= "SELECT eq.id,eq.orden,eq.item,eq.tipo,eq.modelo,eq.serie,es.estado_nombre,eq.fecha,eq.comentario,eq.cliente,eq.contrato,eq.razon_social,eq.direccion,eq.localidad,eq.digitacion 
	FROM equipo as eq INNER JOIN estado as es ON eq.estado=es.estado_id WHERE eq.id = :id";
$query = $conn->prepare($sql1);
$query ->execute(array(':id'=>$id));

$person = NULL;

if($row_count = $query->rowCount()>0){
	while ($r=$query->fetchObject()){
	  $person=$r;
	  break;
	}	
}
$status=$person->estado_nombre;
?>
<?php if($person!=NULL):?>

<form role="form" method="post" action="php/actualizar.php">
	<div class="form-group"> 
		<p>
		<table class="table table-hover table-responsive">
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
			<tr>
				<td><font size=1><?php echo $person->orden; ?></td>
				<td><font size=1><?php echo $person->item; ?></td>
				<td><font size=1><?php echo $person->tipo; ?></td>
				<td><font size=1><?php echo $person->modelo; ?></td>
				<td><font size=1><?php echo $person->serie; ?></td>
				<td><font size=1><?php echo $person->estado_nombre; ?></td>
				<td><font size=1><?php echo $person->fecha; ?></td>
				<td><font size=1><?php echo $person->comentario; ?></td>
				<td><font size=1><?php echo $person->cliente; ?></td>
				<td><font size=1><?php echo $person->contrato; ?></td>
				<td><font size=1><?php echo $person->razon_social; ?></td>
				<td><font size=1><?php echo $person->direccion; ?></td>
				<td><font size=1><?php echo $person->localidad; ?></td>
				<td><font size=1><?php echo $person->digitacion; ?></td>	
			</tr>
		</table>

		<div class="form-horizontal">
			<div class="form-group">
				<label for="estado">Estado</label>			
				<select class="form-control" name="estado" id="estado">
				<?php
					$query2 = 'SELECT * FROM estado';			
					$result = $conn->prepare($query2);
					$result ->execute();
					$row = $result->fetchAll(PDO::FETCH_ASSOC);
					foreach($row as $m){   ?>
						<option  <?php if($m['estado_nombre'] == $status ) echo 'selected'; ?>  value= "<?php echo $m['estado_id'];?>"> <?php echo $m['estado_nombre']; ?> </option>
				    <?php 	}  ?>
				 </select>

			</div>
			<div class="form-group">
				<label for="comentario">Comentarios</label>
		    	<input type="text" class="form-control" value="<?php echo $person->comentario; ?>" name="comentario"  id="comentario" required>			
				<input type="hidden" name="id" value="<?php echo $person->id; ?>" >
			</div>
			<div class="form-group">
				<br>
				<button type="submit" class="btn btn-default btn-lg">Actualizar</button>
			</div>  		
	  	</div>

	</div>
</form>
<?php else:?>
	<p class="alert alert-danger">404: No se encontraron datos</p>
<?php endif;?>
