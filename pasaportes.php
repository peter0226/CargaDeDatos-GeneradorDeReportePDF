<?php

	require_once('vendor/autoload.php');

	//plantilla html
	require_once('plantilla.php');

	//codigo css
	$css=file_get_contents('estilos.css');
	
	
    $a=$_GET["a"];
    $b=$_GET["b"];
	//base de datos
	require_once('datos.php');
    	
    $datos=getdatos($a,$b);


	$html ='';

	$mpdf = new \Mpdf\Mpdf([
		'format' => 'A4-L'
	]);

	$plantilla=getPlantilla($datos);

	$mpdf->writeHtml ($css, \Mpdf\HTMLParserMode::HEADER_CSS);
	$mpdf->writeHtml ($plantilla, \Mpdf\HTMLParserMode::HTML_BODY);
	

	$mpdf->Output("pasaportes.pdf","I");
	
	


?>