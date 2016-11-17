<?php
date_default_timezone_set('America/New_York');
session_start();

define("DB_SERVER", "localhost");
define("DB_USER", "pde");
define("DB_PASSWORD", "write");
define("DB_DATABASE", "crud1");


$connect = mysqli_connect(DB_SERVER,DB_USER,DB_PASSWORD,DB_DATABASE);

include ('../Classes/PHPExcel/IOFactory.php');


$inputFileType = 'Excel5';
$inputFileName = '../inputData/sheet1.xls';

$sheetname = 'Data Sheet #1'; 


$objPHPExcel = PHPExcel_IOFactory::load($inputFileName);
/*recorrer la info del excel*/
foreach ($objPHPExcel -> getWorksheetIterator() as $worksheet) {
	//obtengo la última fila de la hoja de excel
	$highestRow = $worksheet->getHighestRow();
	for ($row=2; $row <=$highestRow ; $row++) { 

		$orden = $objPHPExcel->getActiveSheet()->getCellByColumnAndRow(0,$row)->getValue();
		//$orden = mysqli_real_escape_string($connect,$worksheet->getCellByColumnAndRow(0,$row)->getValue());

		$item = $objPHPExcel->getActiveSheet()->getCellByColumnAndRow(1,$row)->getValue();
		//$item = mysqli_real_escape_string($connect,$worksheet->getCellByColumnAndRow(1,$row)->getValue());;
		$identificador = $orden.$item;
		
		$query0 = "SELECT identificador,digitacion,estado FROM equipo WHERE Identificador=".$identificador." ";
		
		$result = mysqli_query($connect,$query0);

		//echo " identificador ".$identificador."\n";
	    /* obtener el array asociativo */
	    $contenido=NULL;
	    while ($fila = mysqli_fetch_row($result)) {
	        $st_contenido=$fila[0];
	        $st_digitacion=$fila[1];
	        $st_estado=$fila[2];
	        //echo "result con contenido: ".$contenido." digitacion: ".$digitacion. " estado: ".$estado. "\n";
	    }
		if (!$st_contenido) {
			//si no existen agregarlos a la DB
			//echo " ingresa al if ".$row."\n";
			$tipo = $objPHPExcel->getActiveSheet()->getCellByColumnAndRow(2,$row)->getValue();
			//mysqli_real_escape_string($connect,$worksheet->getCellByColumnAndRow(2,$row)->getValue());
			$modelo = $objPHPExcel->getActiveSheet()->getCellByColumnAndRow(3,$row)->getValue();
			//mysqli_real_escape_string($connect,$worksheet->getCellByColumnAndRow(3,$row)->getValue());
			$serie = $objPHPExcel->getActiveSheet()->getCellByColumnAndRow(4,$row)->getValue();
			//mysqli_real_escape_string($connect,$worksheet->getCellByColumnAndRow(4,$row)->getValue());
			$estado = $objPHPExcel->getActiveSheet()->getCellByColumnAndRow(5,$row)->getValue();
			//mysqli_real_escape_string($connect,$worksheet->getCellByColumnAndRow(5,$row)->getValue());
			$descEstado = $objPHPExcel->getActiveSheet()->getCellByColumnAndRow(6,$row)->getValue();
			//mysqli_real_escape_string($connect,$worksheet->getCellByColumnAndRow(6,$row)->getValue());
			$fechaEstado = $objPHPExcel->getActiveSheet()->getCellByColumnAndRow(7,$row)->getValue();
			//mysqli_real_escape_string($connect,$worksheet->getCellByColumnAndRow(7,$row)->getValue());
			$fechaEstado = date($format = "Y-m-d", PHPExcel_Shared_Date::ExcelToPHP($fechaEstado));
			$comentarios = $objPHPExcel->getActiveSheet()->getCellByColumnAndRow(8,$row)->getValue();
			//mysqli_real_escape_string($connect,$worksheet->getCellByColumnAndRow(8,$row)->getValue());
			$cliente = $objPHPExcel->getActiveSheet()->getCellByColumnAndRow(9,$row)->getValue();
			//mysqli_real_escape_string($connect,$worksheet->getCellByColumnAndRow(9,$row)->getValue());
			$contrato = $objPHPExcel->getActiveSheet()->getCellByColumnAndRow(10,$row)->getValue();
			//mysqli_real_escape_string($connect,$worksheet->getCellByColumnAndRow(10,$row)->getValue());
			$razon_social = $objPHPExcel->getActiveSheet()->getCellByColumnAndRow(11,$row)->getValue();
			//mysqli_real_escape_string($connect,$worksheet->getCellByColumnAndRow(11,$row)->getValue());
			$direccion = $objPHPExcel->getActiveSheet()->getCellByColumnAndRow(12,$row)->getValue();
			//mysqli_real_escape_string($connect,$worksheet->getCellByColumnAndRow(12,$row)->getValue());
			$localidad = $objPHPExcel->getActiveSheet()->getCellByColumnAndRow(13,$row)->getValue();
			//mysqli_real_escape_string($connect,$worksheet->getCellByColumnAndRow(13,$row)->getValue());
			$fechadigitacion = $objPHPExcel->getActiveSheet()->getCellByColumnAndRow(14,$row)->getValue();
			//mysqli_real_escape_string($connect,$worksheet->getCellByColumnAndRow(14,$row)->getValue());
			$fechadigitacion = date($format = "Y-m-d", PHPExcel_Shared_Date::ExcelToPHP($fechadigitacion)); 
			$fecha = $objPHPExcel->getActiveSheet()->getCellByColumnAndRow(15,$row)->getValue();
			//mysqli_real_escape_string($connect,$worksheet->getCellByColumnAndRow(15,$row)->getValue());
			$fecha = date($format = "Y-m-d", PHPExcel_Shared_Date::ExcelToPHP($fecha));	
			$sql1 = "INSERT INTO equipo (identificador,orden,item,tipo,modelo,serie,estado,fecha,comentario,cliente,contrato,razon_social,direccion,localidad,digitacion) 
			VALUES ('".$orden.$item."','".$orden."','".$item."','".$tipo."','".$modelo."','".$serie."','".$estado."','".$fecha."','".$comentarios."','".$cliente."','".$contrato."','".$razon_social."','".$direccion."','".$localidad."','".$fechadigitacion."')";
			echo "nueva fila de datos: $sql1\n";
			mysqli_query($connect,$sql1);
		} else {
			//chequear para updatear
			
			if(!$fechadigitacion<$st_digitacion){
				//si fecha de elem a ingresar es mayor o igual
				if ($st_estado<'9'){
					//si orden es menor a 9 o 10
					$estado = mysqli_real_escape_string($connect,$worksheet->getCellByColumnAndRow(5,$row)->getValue());					

					$fechadigitacion = $objPHPExcel->getActiveSheet()->getCellByColumnAndRow(14,$row)->getValue();						
					$fechadigitacion = date($format = "Y-m-d", PHPExcel_Shared_Date::ExcelToPHP($fechadigitacion)); 

					
					$sql2 = "UPDATE INTO equipo VALUES SET estado='".$estado."', digitacion='".$fechadigitacion."' WHERE identificador='".$identificador."'";
					//echo "$sql2\n";
					echo " updating data de fila $sql2\n";
					mysqli_query($connect,$sql2);
				}
			}	
		}
	}	
}
?>