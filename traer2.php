<?php 



	$servidor="";
	$usuario="";
	$password="";
	$base_datos="";

	$conexion= new mysqli($servidor, $usuario, $password, $base_datos);
        
		
		$consulta = "select count(*) as suma from ciudadanos";
		$ejecutar =$conexion->query($consulta);
	 
		//$datos= array();/$datos= array();/$datos= array();

		$row = mysqli_fetch_row($ejecutar);
			//$datos[] = $row;
			$suma = $row[0];
			
			
			
			//$row = mysql_fetch_array($resultado, MYSQL_ASSOC);
			//alert(datos[0]);
			//echo json_encode($datos);
			//echo $suma;
			echo '<span style="font-size:70px;" id="contador">'.$suma.'</span>';
    

			
?>