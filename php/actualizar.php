<?php
if(!empty($_POST)){
	if(isset($_POST["estado"]) &&isset($_POST["comentario"])){
		if($_POST["estado"]!=""&& $_POST["comentario"]){
			include "database.php";
			
			$estado=$_POST['estado'];
			$comentario=$_POST['comentario'];
			$id=$_POST['id'];
	
			
			$sql = "UPDATE equipo SET estado=:estado, comentario=:comentario, fecha=NOW() WHERE id=:id";
			$query = $conn->prepare($sql);	 
			$query ->execute(array(':estado'=>$estado,':comentario'=>$comentario,':id'=>$id));

			if($query!=NULL){
				print "<script>alert(\"Actualizado exitosamente.\"); window.location='../ver.php';</script>";
			}else{
				print "<script>alert(\"No se pudo actualizar.\");window.location='../ver.php';</script>";
			}
		}
	}
}
?>