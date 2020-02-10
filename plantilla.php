<?php

    function getPlantilla($datos){

$plantilla='<body>

    <div class="hoja">';
    
        foreach ($datos as $dato){
            $code = '122000';
            $curp=obtenerCurp($dato["nombre"],$dato["apellidos"],$dato["fecha"],$dato["sexo"]);
            $id=$dato["id"];
            $code+=$id;
            $v=1000+$id;
            
        $plantilla.='<div class="contenido_pasaporte">
            <div class="column1">
                <h3>PASAPORTE</h3>
                <div class="marg"><i>123'.$v.'</i> </div>
                <br />
                <span class="foto">
                    <img src="subirDatos/'.$dato["foto"].'" alt="avatar" class="img32">
                </span>
            </div>

            <div class="column2">
                <img src="ima.png" alt="avatar" class="img300">
                <div class="titulo2">
                    <h3>Estados Unidos Mexicanos</h3>
                </div>
                
                <div class="contenedor">
                    <div class="column3">
                        <span class="color_red">Tipo</span>
                        <span>P</span>
                    </div>

                    <div class="column3">
                        <span class="color_red">Clave del pais de expedición</span>
                        <span>MEX</span>
                    </div>


                    <div class="column3">
                        <span class="color_red">Pasaporte No.</span>
                        <span>G75'.$code.'</span>
                    </div>
                </div>
                <div class="contenedor">
                    <div class="column4">
                        <span class="color_red">Apellidos</span>
                        <span>'.$dato["apellidos"].'</span>
                    </div>

                    <div class="column4">
                        <span class="color_red">Nombres</span>
                        <span>'.$dato["nombre"].'</span>
                    </div>

                </div>
                <div class="contenedor">
                    <div class="column4">
                        <span class="color_red">Nacionalidad</span>
                        <span>MEXICANA</span>
                    </div>

                    <div class="column4">
                        <span class="color_red">CURP</span>
                        <span>'.$curp.'</span>
                    </div>

                </div>

                <div class="contenedor">
                    <div class="column4">
                        <span class="color_red">Sexo</span>
                        <span>'.$dato["sexo"].'</span>
                    </div>

                    <div class="column4">
                        <span class="color_red">Lugar de nacimiento</span>
                        <span>Mexico</span>
                    </div>

                </div>

                <div class="contenedor">
                    <div class="column5">
                        <span class="color_red">Fecha de nacimiento</span>
                        <span>'.$dato["fecha"].'</span>
                    </div>


                </div>


                <div class="contenedor2">
                    <div class="tam">
                    <barcode code="'.$code.'" type="C128B" />
                    <div style="text-align:center; font-size: 12px;">'.$code.'</div>
                    </div>

                </div>

            </div>
            <div>
                <img src="subirDatos/'.$dato["foto"].'" alt="avatar" class="img15">
            </div>

            <div>
                <img src="escudo.png" alt="avatar" class="img18">
                
                
            </div>

        </div>';

        }



    $plantilla.='</div>
</body>';

return $plantilla;

}

function obtenerCurp($nombre,$apellidos,$fecha,$sexo){

$apellidoss = explode(" ", $apellidos);
$ape1=$apellidoss[0];
$ape2=$apellidoss[1];

$apell1 = str_split($ape1);
$apell2 = str_split($ape2);
$nom = str_split($nombre);

$separador = "-";
$f= explode("$separador", $fecha);
$year=$f[0];
$mes=$f[1];
$dia=$f[2];

$y = str_split($year);

if($sexo=='M'){
	$sex='H';
}else{
	$sex='M';
}
$letras='';
$lugar='MC';
$consonantes = array("B","C","D","F","G","H","J","K","L","M","N","Ñ","P","Q","R","S","T","V","W","X","Y","Z");
$encontrar=0;
for ($i=1;$i<=count($apell1)-1;$i++){
	if($encontrar==1){
		break;
	}
	foreach ($consonantes as $consonante){
		if($apell1[$i]==$consonante){
		$letras.=$consonante;
		$encontrar=1;
		break;
		}
	}
}

$encontrar=0;
for ($i=1;$i<=count($apell2)-1;$i++){
	if($encontrar==1){
		break;
	}
	foreach ($consonantes as $consonante){
		if($apell2[$i]==$consonante){
		$letras.=$consonante;
		$encontrar=1;
		break;
		}
	}
}

$encontrar=0;
for ($i=1;$i<=count($nom)-1;$i++){
	if($encontrar==1){
		break;
	}
	foreach ($consonantes as $consonante){
		if($nom[$i]==$consonante){
		$letras.=$consonante;
		$encontrar=1;
		break;
		}
	}
}

$numero=rand(0, 9);



$curp=$apell1[0].$apell1[1].$apell2[0].$nom[0].$y[2].$y[3].$mes.$dia.$sex.$lugar.$letras.'0'.$numero;

return $curp;
}
?>