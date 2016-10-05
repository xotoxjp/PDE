<?php
include "conexion.php";

$user_id=null;
$sql1= "select * from equipo where id = ".$_GET["id"];
$query = $con->query($sql1);
$query2 = 'SELECT distinct(estado_nombre) FROM estado';
$person = null;
if($query->num_rows>0){
while ($r=$query->fetch_object()){
  $person=$r;
  break;
}}
$status=$person->estado;
?>
<?php if($person!=null):?>

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
</tr>
</thead>
<tr>
	<td><font size=1><?php echo $person->orden; ?></td>
	<td><font size=1><?php echo $person->item; ?></td>
	<td><font size=1><?php echo $person->tipo; ?></td>
	<td><font size=1><?php echo $person->modelo; ?></td>
	<td><font size=1><?php echo $person->serie; ?></td>
	<td><font size=1><?php echo $person->estado; ?></td>
	<td><font size=1><?php echo $person->fecha; ?></td>
	<td><font size=1><?php echo $person->comentario; ?></td>
	<td><font size=1><?php echo $person->cliente; ?></td>
	<td><font size=1><?php echo $person->contrato; ?></td>
	<td><font size=1><?php echo $person->razon_social; ?></td>
	<td><font size=1><?php echo $person->direccion; ?></td>
	<td><font size=1><?php echo $person->localidad; ?></td>
	<td><font size=1><?php echo $person->digitacion; ?></td>
</td>
</tr>
</table>

<label for="estado">Estado</label>
<br>

<select name="estado" id="estado">
<?php
$result = $con->query($query2);
foreach($result as $m){
?>
<option  <?php if($m['estado_nombre'] == $status ) echo 'selected'; ?>  value= "  <?php echo $m['estado_nombre'];?>  "    > <?php echo $m['estado_nombre']; ?> </option>
<?php
}
?>
 </select>


  <div class="form-group">
    <label for="comentario">Comentarios</label>
    <input type="text" class="form-control" value="<?php echo $person->comentario; ?>" name="comentario" required>
<input type="hidden" name="id" value="<?php echo $person->id; ?>" >
  <button type="submit" class="btn btn-default">Actualizar</button>
</form>
<?php else:?>
  <p class="alert alert-danger">404 No se encuentra</p>
<?php endif;?>
