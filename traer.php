<?php 


	$servidor="";
	$usuario="";
	$password="";
	$base_datos="";

	$conexion= new mysqli($servidor, $usuario, $password, $base_datos);
        
		$ids=$_GET["ids"];
		$consulta = "SELECT * FROM ciudadanos WHERE id ='$ids'";
		$ejecutar =$conexion->query($consulta);
	 
		$datos= array();

		while ($row = mysqli_fetch_object($ejecutar)) {
			$datos[] = $row;
			}
			//alert(datos[0]);
			echo json_encode($datos);
?>