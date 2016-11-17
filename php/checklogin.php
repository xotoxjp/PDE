<?php
	session_start();
?>
 
<?php	 
	include "database.php";

	$username = $_POST['username'];
	$password = $_POST['password'];
	  
	//$sql = "SELECT * FROM :Tabla WHERE usuario = :Username";
	$sql = "SELECT * FROM usuarios WHERE usuario = :Username";
	$result = $conn->prepare($sql);	 
	$result ->execute(array(':Username'=>$username));
	

	if ($row_count = $result->rowCount() > 0) {   
		$resultado = $result->fetchAll(PDO::FETCH_ASSOC);
		foreach ($resultado as $row) {
    	    //echo $row["password"];
	    }
	}

	if ($password==$row['password']) { 
	    $_SESSION['loggedin'] = true;
	    $_SESSION['username'] = $username;
	    $_SESSION['start'] = time();// Taking now logged in time.
        // Ending a session in 30 minutes from the starting time.
	    $_SESSION['expire'] = $_SESSION['start'] + (0.1 * 60);
		header("Location:../inicio.php"); 	 
	} else { 
       $message="Falló la Autenticación!!!";
	   header("Location:../index.php?msg=$message");
	}
?>