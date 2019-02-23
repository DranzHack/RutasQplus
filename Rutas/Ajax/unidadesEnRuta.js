
setInterval(listUnidades,5000)

function listUnidades() {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
     document.getElementById("unidades").innerHTML = this.responseText;
    }
  };
  xhttp.open("GET", "../../controlador/listUnidadesRuta.php", true);
  xhttp.send();
}

/*

document.addEventListener(
	'click',
	(t)=>t.target.nodeName=='LI'?showTimes(t):0
);

function showTimes(e){
  var form  = new FormData();
  form.append('unidadc',e.target.getAttribute('value'));
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
     document.getElementById("resume").innerHTML = this.responseText;
    }
  };
  xhttp.open("POST", "../../controlador/resumeUnidadTiempo.php", true);
  xhttp.send(form);
}

*/