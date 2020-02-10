// JavaScript source code

setInterval(function () { llenar(); }, 5000);
var rutas1 = ['Cdmx, Mexico', 'Saltillo,Coahuila', 'Monterrey,Nuevo Leon', 'Tehuacan,Puebla,', 'Xalapa,Veracruz', 'Playa del Carmen,Quintana Roo', 'Cdmx, Mexico', 'Cdmx, Mexico', 'Cdmx, Mexico', 'Cdmx, Mexico'];
var rutas2 = ['Hawai,EUA', 'Seul,Corea del Sur', 'Hawai,EUA', 'Paris,Francia', 'Singapur,Singapur', 'Hawai,EUA', 'Brasilia,Brasil', 'Camberra,Australia', 'Hawai,EUA', 'Pekin,China', 'Hong Kong,China', 'New York,EUA', 'Hawai,EUA'];
var clases = ['', 'success', 'danger', 'info', 'warning','active']
function llenar() {
    
    for (var i = 1; i < 15; i++) {


        $('#t' + i).removeClass();
        var r6 = Math.round(Math.random() * 5);
        $('#t' + i).addClass(clases[r6]);
        var r1 = Math.round(Math.random() * 9);
        var r2 = Math.round(Math.random() * 12);
        var r3 = Math.round(Math.random() * 12);
        var r4 = Math.round(Math.random() * 24);
        var r5 = Math.round(Math.random() * 60);
        document.getElementById('o' + i).innerText = rutas1[r1];
        document.getElementById('d' + i).innerText = rutas2[r2];
        document.getElementById('l' + i).innerText = "E"+r3;
        document.getElementById('h' + i).innerText = r4+":"+r5;

    }
   

}
