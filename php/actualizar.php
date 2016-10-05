<?php

if(!empty($_POST)){
	if(isset($_POST["estado"]) &&isset($_POST["comentario"])){
		if($_POST["estado"]!=""&& $_POST["comentario"]){
			include "conexion.php";
			
			$sql = "update equipo set estado=\"$_POST[estado]\",comentario=\"$_POST[comentario]\", fecha=NOW() where id=".$_POST["id"];
			$sql2 = "update equipo set estado = rtrim(ltrim(estado));";
			$query = $con->query($sql);
			$query2 = $con->query($sql2);
			if($query!=null){
				print "<script>alert(\"Actualizado exitosamente.\");window.location='../ver.php';</script>";
			}else{
				print "<script>alert(\"No se pudo actualizar.\");window.location='../ver.php';</script>";

			}
		}
	}
}



?>
