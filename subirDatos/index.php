<html>  
    <head>  
        <title>Make Price Range Slider using JQuery with PHP Ajax</title>  
		
		<script src="jquery.min.js"></script>  
		<script src="bootstrap.min.js"></script>
		<script src="croppie.js"></script>
		<link rel="stylesheet" href="bootstrap.min.css" />
		<link rel="stylesheet" href="croppie.css" />
		<link rel="stylesheet" href="estilos.css" />
    </head>  
    <body>  
        <div class="container">
          <br />
      <h1 align="center">Actividad Misional</h1>
	  <br />
      <br />
			<div class="panel panel-default">
  				<div class="panel-heading" style="font-size:30px;">Informe</div>
  				<div class="panel-body" align="center">
					<table style="width:80%;" >
  						<th><span style="font-size:20px;">No. de Participantes:</span> <div id="info"></div><th>
						<th><input type="button" class="btn btn-success "  style="font-size:25px;" onclick="actualizar()" value="Actualizar" />
					</table>
					
  					<br />
  					
  				</div>
  			</div>
      <br />
      <br />

	  <div class="panel panel-default">
  				<div class="panel-heading" style="font-size:30px;">Imprimir</div>
  				<div class="panel-body" align="center">
				<span style="font-size:20px;">Del</span>
  					<input type="number" name="opcion1" id="o1" style="height:50px; width:200px; font-size:30px;"; required>
					<span style="font-size:20px;">al:</span>
  					<input type="number" name="opcion2" id="o2" style="height:50px; width:200px; font-size:30px;";required>
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<input type="button" class="btn btn-success "  style="font-size:25px;" onclick="imprimir()" value="Imprimir" />
  					<br />
  					
  				</div>
  			</div>
      <br />
      <br />

			<div class="panel panel-default">
  				<div class="panel-heading" style="font-size:30px;">Crear Pasaporte</div>
  				<div class="panel-body" align="center">
					<input type="button" class="btn btn-success "  style="font-size:30px; width:70vw;" onclick="crear()" value="Crear" />
					

  					<input type="file" name="upload_image"  id="upload_image" style="display: none;"/>
  					<br />
  					<div id="uploaded_image"></div>
  				</div>
  			</div>
  		</div>
    </body>  
</html>

<div id="uploadimageModal" class="modal" role="dialog" >
	<div class="modal-dialog" style="width:95vw; height:70vh;">
		<div class="modal-content">
      		<div class="modal-header">
        		<button type="button" class="close" data-dismiss="modal">&times;</button>
        		<h3 class="modal-title">Datos del Cuidadano</h3>
      		</div>
      		<div class="modal-body">
        		<div class="row">
  					<div class="col-md-8 text-center" >
					<input type="text" name="name" id="name" placeholder="Nombres" style="width:80%; height:60px; font-size:25px;" required>
						<br>
						<input type="text" name="lastname" id="lastname" placeholder="Apellidos" style="width:80%; height:60px; font-size:25px;" required>
						<br>
						<input type="date" id="fecha" name="trip-start" value="2019-10-12" style="width:73%; height:60px; font-size:25px;">
						<select name="Sexo" id="sexo" placeholder="Sexo" style="height:60px; font-size:25px;">
							<option value="">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</option>
							<option value="M">M</option>
							<option value="H">H</option>
						</select>
						  <div id="image_demo" style="width:350px; margin-top:30px"></div>
  					</div>
  					<div class="col-md-4" style="padding-top:30px; margin-top:-400px;" >
  						
						
						<br>
						  <button class="btn btn-success crop_image" style="width:30%; height:60px; font-size:25px;">Enviar</button>
					</div>
				</div>
      		</div>
      		<div class="modal-footer">
        		<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      		</div>
    	</div>
    </div>
</div>

<script>  
function crear(){
   //alert('presionado');
   $("#upload_image").trigger("click");
   }
   
   function imprimir(){
       var o1 = document.getElementById("o1").value;
       var o2 = document.getElementById("o2").value;
       
       window.location.href = 'https://actividadmisional.000webhostapp.com/pasaportes.php?a='+o1+'&b='+o2;
   }

function actualizar(){
    var u = "https://actividadmisional.000webhostapp.com/traer2.php";
    $.ajax({
        url:u,
        type: "POST",
        data:{"w": u
		},
        success:function(data)
        {
          $('#info').html(data);
        }
      });
    
    
}



$(document).ready(function(){

	$image_crop = $('#image_demo').croppie({
    enableExif: true,
    viewport: {
      width:700,
      height:700,
      type:'square' //circle
    },
    boundary:{
      width:900,
      height:900
    },
	enableOrientation: true

  });





  $('#upload_image').on('change', function(){

  
    var reader = new FileReader();
    reader.onload = function (event) {
      $image_crop.croppie('bind', {
        url: event.target.result,
		orientation: 5
      }).then(function(){
        console.log('jQuery bind complete');
      });
    }
    reader.readAsDataURL(this.files[0]);
    $('#uploadimageModal').modal('show');
  });

   

  $('.crop_image').click(function(event){
    $image_crop.croppie('result', {
      type: 'canvas',
      size: 'viewport'
    }).then(function(response){

	var nombre = document.getElementById("name").value;
	var apellidos = document.getElementById("lastname").value;
	var fecha = document.getElementById("fecha").value;
    var sexo = document.getElementById("sexo").value;

	//alert(nombre);

	var sum=0;
	if(nombre.length == 0){
		sum++;
	}
	if(apellidos.length == 0){
		sum++;
	}
	if(fecha.length == 0){
		sum++;
	}
	if(sexo.length == 0){
		sum++;
	}
	
	if(sum>=1 ){
	alert("Faltan varios datos");
	}else{

      $.ajax({
        url:"upload.php",
        type: "POST",
        data:{"image": response,
		"nombre": nombre,
		"apellidos": apellidos,
		"fecha": fecha,
		"sexo": sexo
		},
        success:function(data)
        {
          $('#uploadimageModal').modal('hide');
          $('#uploaded_image').html(data);
        }
      });}
    })
  });

});  
</script>