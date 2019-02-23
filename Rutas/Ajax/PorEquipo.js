//Variables para el maping ALV Modificado en EL Juindos
var infoWindow = null;
var map =null;
var markersArray=[];

//FIN DE DECLARACION DE VARIABLES GLOBALES 


/*EN ESTA PARTE SE INICIALIZA EL MAPA COMO LO SON COORDENADAS CENTRALES O EN QUE POSICION SE CENTRARA
  Y LOS MARCADORES A MOSTRAR COMO LO SON LAS UNIDADES 
*/


var parametro='';

$('#unidad').on('change',function(){
              loadAgain()
              });

loadAgain = () => {
                    var F=$('#Fecha').val();
                    var u=$('#unidad').val();
                    parametro = '../../XML/XmlUbicacionXUnidad.php?unidad='+u;
                    initMap(parametro);
                  }

//var D = '<?php echo $Dato; ?>';
//alert(D);

function initMap() {
  
  var MiCentro=new google.maps.LatLng(19.0583202, -98.2122048);
  var Optionss={
      zoom: 14,
      center: MiCentro,
      mapTypeId: google.maps.MapTypeId.ROADMAP
  }

      map = new google.maps.Map(document.getElementById("map"),Optionss)
      infoWindow = new google.maps.InfoWindow;
/*
       var trafficLayer = new google.maps.TrafficLayer();
        trafficLayer.setMap(map);
*/
    CelMorado();
    window.setInterval(CelMorado,10000);

function CelMorado()
{
  clearOverLays();
  //Timestamp obtiene la fecha para posterios pasarlos a la ruta y asi hacer el REFRESH Del market
  var timestamp = new Date().getTime();
  var data = parametro+'&t='+timestamp;

//Aki se grafica el market con los datos que se desean mostrar
  $.get(data,{},function(data){
      $(data).find("marker").each(function(){
          var marker = $(this);
          var status = marker.attr("status")
          var latlng=new google.maps.LatLng(parseFloat(marker
          .attr("Latitud")),parseFloat(marker.attr("Longitud")));
          var Ruta=marker.attr("Ruta");
          var Chofer=marker.attr("Nombre");
          var Paterno=marker.attr("Paterno");
          var Materno=marker.attr("Materno");
          var Fecha=marker.attr("Fecha");
          var Hora=marker.attr("Hora");
          var Id=marker.attr("Id");
          var Ub=marker.attr("Direccion");
          var Date=Fecha+" "+Hora;
          //var html = "<b> Unidad: "+Ruta+"<br>Chofer: "+Chofer+" "+Paterno+" "+Materno+"<b>";
          var html="<b>Unidad: "+Ruta+"<br>Chofer: "+Chofer+" "+Paterno+" "+Materno+"<br> Ubicación:"+Ub+ "<br> Fecha: "+Fecha+" Hora: "+Hora+ " </b>";
          var Imagen='../../img/20.png';
          var marker = new google.maps.Marker({
              position:latlng,
              map:map,
              icon:Imagen,
              title:Date
          });
          google.maps.event.addListener(marker,'click',function(){
              infoWindow.setContent(html);
              infoWindow.open(map,marker);
          });
          markersArray.push(marker);
          google.maps.event.addListener(marker,"click",function(){});
/*======================END OF THE SHOW MARKET INFO=================================*/


      });
  });
}
/*===================================FIN DE LAS FUIONCES DE LOCALIZACION Y CHECKEO VIRTUAL DE UNIDAD 1====================================================*/

  }

/*========================================INICIO DE LAS FUNCIONES PARA RECARGAR LOS MARCADORES=========================================*/
function doNothing() {}
function clearOverLays()
{
  for(var i = 0; i < markersArray.length; i++)
  {
    markersArray[i].setMap(null);
  }
}

/*========================================FIN DE FUNCIONES PARA LA ACTUALIZACION DE LOS MARKERS======================*/



/*
var Parametro=null;

$('#unidad').on('change',function(){
              loadAgain()
              });

loadAgain = () => {
                    var F=$('#Fecha').val();
                    var u=$('#unidad').val();
                    Parametro = '../../XML/XmlUbicacionXUnidad.php?unidad='+u;
                    initMap(Parametro);
                  }

function initMap() { //Inicio de la funcion init map
            var map = new google.maps.Map(document.getElementById('map'), {
              center: new google.maps.LatLng(19.0583202, -98.2122048),
              zoom: 12
            });
            
            
              //alert(Parametro);
              Equipo1(Parametro, function(data) {
                var xml = data.responseXML;
                var markers = xml.documentElement.getElementsByTagName('marker');
                Array.prototype.forEach.call(markers, function(markerElem) {
                  var id = markerElem.getAttribute('id');
                  var Fecha = markerElem.getAttribute('Fecha');
                  var Hora = markerElem.getAttribute('Hora');
                  var date = Fecha+" "+Hora;
                  var point = new google.maps.LatLng(
                      parseFloat(markerElem.getAttribute('Latitud')),
                      parseFloat(markerElem.getAttribute('Longitud')));
    
                  //var icon = customLabel[tipo] || {};
                  //var ImageIcon=Imagenlol[tipo]|| {};
                  var algo='../../img/06.png';
                  var marker = new google.maps.Marker({
                    map: map,
                    position: point,
                    //label:icon.label,
                    icon:algo,
                    title: date
                  });
                  marker.addListener('click', function() {
                    infoWindow.setContent(infowincontent);
                    infoWindow.open(map, marker);
                  });
                });
              });
              
          
  
              
 } //Fin Function Init Map
    
    
    
          function Bases(url, callback) {
            var request = window.ActiveXObject ?
                new ActiveXObject('Microsoft.XMLHTTP') :
                new XMLHttpRequest;
    
            request.onreadystatechange = function() {
              if (request.readyState == 4) {
                request.onreadystatechange = doNothing;
                callback(request, request.status);
              }
            };
            request.open('GET', url, true);
            request.send(null);
          }
    
          function Equipo1(url, callback) {
            var request = window.ActiveXObject ?
                new ActiveXObject('Microsoft.XMLHTTP') :
                new XMLHttpRequest;
    
            request.onreadystatechange = function() {
              if (request.readyState == 4) {
                request.onreadystatechange = doNothing;
                callback(request, request.status);
              }
            };
    
            request.open('GET', url, true);
            request.send(null);
          } 
           
    
    
          function doNothing() {}






          */