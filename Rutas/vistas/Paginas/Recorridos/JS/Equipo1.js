var bases1= {
  base:{
    center: {lat: 19.061122, lng: -98.208147},
    population: 1,
    tittle:'Base 1'
  }

};

var bases2={
  base:
  {
    center:{lat: 19.053017, lng: -98.220594},
    population:1
  }
}

var bases3={
  base:
  {
    center:{lat: 19.028021, lng: -98.208911},
    population:1
  }
}

var bases4={
  base:
  {
    center:{lat: 19.029142, lng: -98.192355},
    population:1
  }
}

var bases5={
  base:
  {
    center:{lat: 19.058990, lng: -98.187929},
    population:1
  }
}

var bases6={
  base:
  {
    center:{lat: 19.072883, lng: -98.177294},
    population:1
  }
}

var bases7={
  base:
  {
    center:{lat: 19.066637, lng: -98.21159},
    population:1
  }
}

var bases8={
  base:
  {
    center:{lat: 19.066637, lng: -98.21159},
    population:1
  }
}

var bases9={
  base:
  {
    center:{lat: 19.066637, lng: -98.21159},
    population:1
  }
}

var bases10={
  base:
  {
    center:{lat: 19.066637, lng: -98.21159},
    population:1
  }
}
//var x='../../../XML/XmlRCombi1.php';
//
/*
$('#Fecha').on('change',function(){
                var F=$('#Fecha').val();
                var Parametro = '../../../XML/XmlRCombi1.php?Fecha='+F;
                initMap(Parametro);
                });
 */
var Parametro=null;

$('#Fecha').on('change',function(){
              loadAgain()
              });
$('#unidad').on('change',function(){
              loadAgain()
              });

loadAgain = () => {
                    var F=$('#Fecha').val();
                    var u=$('#unidad').val();
                    Parametro = '../../../XML/XmlDinamico.php?Fecha='+F+'&unidad='+u;
                    initMap(Parametro);
                  }

function initMap() {
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
                  var algo='../../../img/06.png';
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
              
              for (var base1 in bases1) {
          // Add the circle for this city to the map.
          var CircleBase1 = new google.maps.Circle({
            strokeColor: '#FF0000',
            strokeOpacity: 0.8,
            strokeWeight: 2,
            fillColor: '#FF0000',
            fillOpacity: 0.35,
            map: map,
            center: bases1[base1].center,
            radius: Math.sqrt(bases1[base1].population) * 5
          });
        }

      for(var base2 in bases2)
      {
        // Add the circle for this city to the map.
              var CircleBase2 = new google.maps.Circle({
                strokeColor: '#FF0000',
                strokeOpacity: 0.8,
                strokeWeight: 2,
                fillColor: '#FF0000',
                fillOpacity: 0.35,
                map: map,
                center: bases2[base2].center,
                radius: Math.sqrt(bases2[base2].population) * 5
              });
      }

      for(var base3 in bases3)
      {
        // Add the circle for this city to the map.
              var CircleBase3 = new google.maps.Circle({
                strokeColor: '#FF0000',
                strokeOpacity: 0.8,
                strokeWeight: 2,
                fillColor: '#FF0000',
                fillOpacity: 0.35,
                map: map,
                center: bases3[base3].center,
                radius: Math.sqrt(bases3[base3].population) * 5
              });
      }

      for(var base4 in bases4)
      {
        // Add the circle for this city to the map.
              var CircleBase4 = new google.maps.Circle({
                strokeColor: '#FF0000',
                strokeOpacity: 0.8,
                strokeWeight: 2,
                fillColor: '#FF0000',
                fillOpacity: 0.35,
                map: map,
                center: bases4[base4].center,
                radius: Math.sqrt(bases4[base4].population) * 5
              });
      }

      for(var base5 in bases5)
      {
        // Add the circle for this city to the map.
              var CircleBase5 = new google.maps.Circle({
                strokeColor: '#FF0000',
                strokeOpacity: 0.8,
                strokeWeight: 2,
                fillColor: '#FF0000',
                fillOpacity: 0.35,
                map: map,
                center: bases5[base5].center,
                radius: Math.sqrt(bases5[base5].population) * 5
              });
      }

      for(var base6 in bases6)
      {
        // Add the circle for this city to the map.
              var CircleBase6 = new google.maps.Circle({
                strokeColor: '#FF0000',
                strokeOpacity: 0.8,
                strokeWeight: 2,
                fillColor: '#FF0000',
                fillOpacity: 0.35,
                map: map,
                center: bases6[base6].center,
                radius: Math.sqrt(bases6[base6].population) * 5
              });
      }
  
              
            }
    
    
    
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