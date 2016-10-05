<?php
session_start();
?>
<html>
	<head>
		<title>.: Planilla de Disponibilidad de Equipos :.</title>
		<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	</head>
	<body>
	<?php include "php/navbar2.php"; ?>
	<div class="container">
	<div class="row">
	<div class="col-md-12">
			<h2>[PDE] Planilla de Disponibilidad de Equipos</h2>
			<p class="lead">Debajo encontrará el diccionario de estados</p>
			<p></p>
			<style type="text/css">
.tg  {border-collapse:collapse;border-spacing:0;}
.tg td{font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;}
.tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:bold;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;}
.tg .tg-yw4l{vertical-align:top}
</style>
<table class="tg">
  <tr>
    <th class="tg-yw4l">Estados</th>
    <th class="tg-yw4l">Tipo de Estado</th>
    <th class="tg-yw4l">Definición</th>
    <th class="tg-yw4l">Responsable</th>
    <th class="tg-yw4l">Quien lo ve</th>
    <th class="tg-yw4l">Quien Acciona</th>

  </tr>
  <tr>
    <td class="tg-yw4l">Sin Stock</td>
    <td class="tg-yw4l">Informativo</td>
    <td class="tg-yw4l">No hay disponibilidad de equipos, especificar en Comentarios si es de Xcorp o Local</td>
    <td class="tg-yw4l">Logística (PL)</td>
    <td class="tg-yw4l">Todos</td>
    <td class="tg-yw4l">N/C</td>
  </tr>
  <tr>
    <td class="tg-yw4l">En Miami</td>
    <td class="tg-yw4l">Informativo</td>
    <td class="tg-yw4l">El equipo se encuentra para ser embarcado, utilizar campo "Comentarios"" para aclarar."</td>
    <td class="tg-yw4l">Logística (PL)</td>
    <td class="tg-yw4l">Todos</td>
    <td class="tg-yw4l">N/C</td>
  </tr>
  <tr>
    <td class="tg-yw4l">En Transito</td>
    <td class="tg-yw4l">Informativo</td>
    <td class="tg-yw4l">El equipo se encuentra en viaje desde origen al país, especificar en comentarios tipo de embarque (Avión/Barco) y fecha estimada de arribo.</td>
 
    <td class="tg-yw4l">Logística (PL)</td>
    <td class="tg-yw4l">Todos</td>
    <td class="tg-yw4l">N/C</td>

  </tr>
  <tr>
    <td class="tg-yw4l">En Aduana</td>
    <td class="tg-yw4l">Informativo</td>
    <td class="tg-yw4l">El equipo se encuentra en el país, bajo el proceso de ingreso por aduana, se estima el tiempo en base a la fecha del estado</td>
    <td class="tg-yw4l">Logística (PL)</td>
    <td class="tg-yw4l">Todos</td>
    <td class="tg-yw4l">N/C</td>

  </tr>
  <tr>
    <td class="tg-yw4l">Disponible</td>
    <td class="tg-yw4l">Ejecutable</td>
    <td class="tg-yw4l">El equipo se encuentra disponible para el envío con todos los accesorios correspondientes al mismo.</td>
    <td class="tg-yw4l">Logística (D)</td>
    <td class="tg-yw4l">Todos</td>
    <td class="tg-yw4l">Implementaciones</td>
  </tr>
  <tr>
    <td class="tg-yw4l">Despacho Solicitado</td>
    <td class="tg-yw4l">Ejecutable</td>
    <td class="tg-yw4l">Se solicitó la gestión para el envío del equipo al lugar designado en la orden, especificar cambios en el campo comentarios.</td>
    <td class="tg-yw4l">Implementaciones</td>
    <td class="tg-yw4l">Todos</td>
    <td class="tg-yw4l">Logística (D)</td>
  </tr>
  <tr>
    <td class="tg-yw4l">En proceso de Entrega</td>
    <td class="tg-yw4l">Informativo</td>
    <td class="tg-yw4l">El equipo se encuentra despachado y en proceso de envío, calcular recepción dependiendo del destino en base a la fecha del estado.</td>
    <td class="tg-yw4l">Logística (D)</td>
    <td class="tg-yw4l">Todos</td>
    <td class="tg-yw4l">N/C</td>
  </tr>
  <tr>
    <td class="tg-yw4l">Entregado Sin Instalar</td>
    <td class="tg-yw4l">Ejecutable</td>
    <td class="tg-yw4l">El equipo se encuentra entregado a la espera de coordinación de visita técnica para la instalación.</td>
    <td class="tg-yw4l">Logística (D)</td>
    <td class="tg-yw4l">Todos</td>
    <td class="tg-yw4l">Implementaciones</td>
  </tr>
  <tr>
    <td class="tg-yw4l">Contingencia</td>
    <td class="tg-yw4l">Informativo</td>
    <td class="tg-yw4l">El equipo se encuentra enviado a un sitio diferente al indicado en la orden de compra, especificar en Comentarios el destino del mismo</td>
    <td class="tg-yw4l">Logística (D)</td>
    <td class="tg-yw4l">Todos</td>
    <td class="tg-yw4l">N/C</td>

  </tr>
  <tr>
    <td class="tg-yw4l">Instalación Solicitada</td>
    <td class="tg-yw4l">Ejecutable</td>
    <td class="tg-yw4l">Se solicitó al Servicio Técnico la coordinación de la instalación del equipo, comunicar cualquier información en el campo Comentarios</td>
    <td class="tg-yw4l">Implementaciones</td>
    <td class="tg-yw4l">Todos</td>
    <td class="tg-yw4l">Servicio Técnico</td>
  </tr>
  <tr>
    <td class="tg-yw4l">Instalación Coordinada</td>
    <td class="tg-yw4l">Informativo</td>
    <td class="tg-yw4l">Servicio Técnico coordinó la instalación e indica fecha de visita, se indica la misma en Comentarios</td>
    <td class="tg-yw4l">Servicio Técnico</td>
    <td class="tg-yw4l">Todos</td>
    <td class="tg-yw4l">N/C</td>
  </tr>
  <tr>
    <td class="tg-yw4l">Instalado</td>
    <td class="tg-yw4l">Ejecutable</td>
    <td class="tg-yw4l">Servicio Técnico indica que el equipo fue instalado y adjunta conforme de instalación.</td>
    <td class="tg-yw4l">Servicio Técnico</td>
    <td class="tg-yw4l">Todos</td>
    <td class="tg-yw4l">Implementaciones</td>
  </tr>
  <tr>
    <td class="tg-yw4l">No Instalado</td>
    <td class="tg-yw4l">Ejecutable</td>
    <td class="tg-yw4l">Servicio Técnico indica que el equipo no fue instalado por algún motivo que se debe dejar asentado en el campo de comentarios</td>
    <td class="tg-yw4l">Servicio Técnico</td>
    <td class="tg-yw4l">Todos</td>
    <td class="tg-yw4l">Implementaciones</td>
  </tr>
  <tr>
    <td class="tg-yw4l">A Cerrar</td>
    <td class="tg-yw4l">Ejecutable</td>
    <td class="tg-yw4l">Implementaciones confirma la instalación. Adjunta conforme a repositorio.</td>
    <td class="tg-yw4l">Implementaciones</td>
    <td class="tg-yw4l">Todos</td>
    <td class="tg-yw4l">Logística (D)</td>
  </tr>
  <tr>
    <td class="tg-yw4l">Cerrado</td>
    <td class="tg-yw4l">Informativo</td>
    <td class="tg-yw4l">La orden se cerró correctamente.</td>
    <td class="tg-yw4l">Logística (D)</td>
    <td class="tg-yw4l">Todos</td>
    <td class="tg-yw4l">N/C</td>
  </tr>
  <tr>
    <td class="tg-yw4l">Usado Disponible</td>
    <td class="tg-yw4l">Informativo</td>
    <td class="tg-yw4l">Para contratos de re manufacturación de equipos, cuando el mismo se encuentra procesado y listo para el envío.</td>
    <td class="tg-yw4l">Logística (D)</td>
    <td class="tg-yw4l">Todos</td>
    <td class="tg-yw4l">Logística (D)</td>
  </tr>
  <tr>
    <td class="tg-yw4l">A Retirar</td>
    <td class="tg-yw4l">Ejecutable</td>
    <td class="tg-yw4l">En caso de TRADE, EXE o fin de contrato cuando el equipo se encuentra disponible para ser retirado</td>
    <td class="tg-yw4l">Implementaciones</td>
    <td class="tg-yw4l">Todos</td>
    <td class="tg-yw4l">Logística (R)</td>
  </tr>
  <tr>
    <td class="tg-yw4l">Requiere Gestión</td>
    <td class="tg-yw4l">Ejecutable/Informativo</td>
    <td class="tg-yw4l">Estado de solicitud extraordinaria, se utiliza el campo comentarios para aclarar la excepción (Cambio de Backlog, gestión por parte del comercial, etc.)</td>
    <td class="tg-yw4l">Todos</td>
    <td class="tg-yw4l">Todos</td>
    <td class="tg-yw4l">Todos</td>
  </tr>
</table>

	</div>
	</div>
	</div>
	</body>
</html>