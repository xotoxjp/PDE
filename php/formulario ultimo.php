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
Editando Orden: 
<label for="orden"><?php echo $person->orden; ?></label><p> 
Estado Actual: 
<label for="orden"><?php echo $status; ?></label> 
<p>
<label for="estado">Estado</label>
<br>


<select name="estado" id="estado" >
<?php
$result = $con->query($query2);
foreach($result as $m){
?>
<option  <?php if ( $m['estado_nombre'] == $status ) echo 'selected' ; ?>  value= "  <?php echo $m['estado_nombre'];?>  "    >
<?php echo $m['estado_nombre']; ?>
</option>
<?php
}
?>
 </select>

<!--
<select name="estado" id="estado">
            <?php
$result = $con->query($query2);
            foreach($result as $m)
            {
            ?>
                <option value="<?php echo $m['estado_nombre'];?>"><?php echo $m['estado_nombre'];?></option>
            <?php
            }
        ?>
        </select>

<!--
<select name="estado">;
 <?php

$result = $con->query($query2);
 while($row = mysqli_fetch_assoc($result)) {
 echo '<option value=\"'.$row['name'].'">'.$row['name'].'</option>';
 }
 echo "</select>";

  ?> -->
 <!-- <label for="estado">Estado</label> 
    <input type="text" class="form-control" value="<?php echo $person->estado; ?>" name="estado" required>
  --></div>
  <div class="form-group">
    <label for="comentario">Comentarios</label>
    <input type="text" class="form-control" value="<?php echo $person->comentario; ?>" name="comentario" required >
<input type="hidden" name="id" value="<?php echo $person->id; ?>">
  <button type="submit" class="btn btn-default">Actualizar</button>
</form>
<?php else:?>
  <p class="alert alert-danger">404 No se encuentra</p>
<?php endif;?>
