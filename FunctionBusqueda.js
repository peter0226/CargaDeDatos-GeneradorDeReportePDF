// JavaScript source code
function pulsar(e) {

    tecla = (document.all) ? e.keyCode : e.which;
    if (tecla == 13) {
        
        buscar();

    }
}

function buscar() {

    var t = document.getElementById("search").value;
    var texto = t;

    //alert(texto);
    var id = texto - 122000;

    var url = "https://actividadmisional.000webhostapp.com/traer.php?ids=" + id;
    $.getJSON(url, function (result) {
        $.each(result, function (i, campo) {
            var nombre = campo.nombre;
            var apellidos = campo.apellidos;
            var fecha = campo.fecha;
            var sexo = campo.sexo;
            var foto = campo.foto;

            var ima = document.getElementById('foto');
            ima.setAttribute("src", "subirDatos/" + foto);
            document.getElementById("search").value = "";
            document.getElementById("cod").innerText = "G75" + texto;
            document.getElementById("apellidos").innerText = apellidos;
            document.getElementById("nombre").innerText = nombre;
            document.getElementById("fecha").innerText = fecha;
            document.getElementById("sexo").innerText = sexo;

            var curp = calcularCurp(nombre, apellidos, fecha, sexo);
            document.getElementById("curp").innerText = curp;
        })
    });

}

function calcularCurp(nombre, apellidos, fecha, sexo) {
    var curp;
    var ap = apellidos.split(" ");
    curp = ap[0].substr(0, 2);
    curp += ap[1].substr(0, 1);
    curp += nombre.substr(0, 1);
    curp += fecha.substr(2, 2);
    curp += fecha.substr(5, 2);
    curp += fecha.substr(8, 2);

    if (sexo == 'M') {
        curp += 'H';
    } else {
        curp += 'M';
    }
    curp += 'MCNMY01';

    return curp;
}
    