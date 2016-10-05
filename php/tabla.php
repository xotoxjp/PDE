<head>

<link rel="shortcut icon" type="image/png" href="/media/images/favicon.png">
	<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="http://www.datatables.net/rss.xml">
	<link rel="stylesheet" type="text/css" href="/media/css/site-examples.css?_=b05357026107a2e3ca397f642d976192">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css">
	<style type="text/css" class="init">
	
	</style>
	<script type="text/javascript" src="/media/js/site.js?_=fdce5da0aafc74f877db6a1772eccba9">
	</script>
	<script type="text/javascript" src="/media/js/dynamic.php?comments-page=examples%2Fbasic_init%2Falt_pagination.html" async>
	</script>
	<script type="text/javascript" language="javascript" src="//code.jquery.com/jquery-1.12.3.js">
	</script>
	<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js">
	</script>


	</script>
	<script type="text/javascript" language="javascript" src="../resources/demo.js">
	</script>
<script type="text/javascript" src="jquery.dataTables.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#example').dataTable( {
            "language": {
                "url": "/PDE/spanish/Spanish.json"
            }
        } );
    } );
</script>
</head>
<?php

include "conexion.php";

$user_id=null;
$sql1= "select * from equipo";
$query = $con->query($sql1);
?>

<?php if($query->num_rows>0):?>

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
</tr>
</thead>
<?php while ($r=$query->fetch_array()):?>
<tr>
	<td><font size=1><?php echo $r["orden"]; ?></td>
	<td><font size=1><?php echo $r["item"]; ?></td>
	<td><font size=1><?php echo $r["tipo"]; ?></td>
	<td><font size=1><?php echo $r["modelo"]; ?></td>
	<td><font size=1><?php echo $r["serie"]; ?></td>
	<td><font size=1><?php echo $r["estado"]; ?></td>
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
	<!--	<a href="#" id="del-<?php echo $r["id"];?>" class="btn btn-sm btn-danger">Eliminar</a> -->
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
<?php endwhile;?>



</table>

<?php else:?>
	<p class="alert alert-warning">No hay resultados</p>
<?php endif;?>
