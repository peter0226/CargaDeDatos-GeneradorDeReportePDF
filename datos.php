<?php

function getdatos($a,$b){
$datos = array();

$servidor="localhost";
	$usuario="tuUsuario";
	$password="tuPassword";
	$base_datos="TuBD";

	$mysqli= new mysqli($servidor, $usuario, $password, $base_datos);
	$mysqli->set_charset('utf8');
	$statement= $mysqli->prepare("SELECT * FROM ciudadanos WHERE id>=$a and id<=$b");
	$statement->execute();
	$resultado = $statement->get_result();
	while($row = $resultado->fetch_assoc()) $datos[] = $row;
	$mysqli->close();

return $datos;
}

?>