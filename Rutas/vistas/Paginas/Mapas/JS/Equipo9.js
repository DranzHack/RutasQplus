function initMap() {
            var map = new google.maps.Map(document.getElementById('map'), {
              center: new google.maps.LatLng(19.0583202, -98.2122048),
              zoom: 12
            });
            var infoWindow = new google.maps.InfoWindow;
    
            var directionsServiceTmp = new google.maps.DirectionsService;
            var directionsDisplayTmp = new google.maps.DirectionsRenderer;
            location_ini = 19.061222 + ',' + -98.207983;
            location_fin = 19.074004 + ',' + -98.203455;
    
            directionsServiceTmp.route({
              origin: location_ini,
              destination: location_fin,
              optimizeWaypoints: true,
              travelMode: 'WALKING'
            }, function (response, status){
              if(status === 'OK')
              {
                //console.log(response.routes[0].legs[0].distance.text);
                //console.log(response.routes[0].legs[0].distance.value);
                directionsDisplayTmp.setDirections(response);
              }
              directionsDisplayTmp.setMap(map);
            });
    
              Equipo1('../../../config/XMLEquipo9.php', function(data) {
                var xml = data.responseXML;
                var markers = xml.documentElement.getElementsByTagName('marker');
                Array.prototype.forEach.call(markers, function(markerElem) {
                  var id = markerElem.getAttribute('id');
                  var NEquipo = markerElem.getAttribute('NEquipo');
                  var fecha = markerElem.getAttribute('Fecha');
                  var point = new google.maps.LatLng(
                      parseFloat(markerElem.getAttribute('Latitud')),
                      parseFloat(markerElem.getAttribute('Longitud')));
    
                  var infowincontent = document.createElement('div');
                  var strong = document.createElement('strong');
                  //strong.textContent = name
                  infowincontent.appendChild(strong);
                  infowincontent.appendChild(document.createElement('br'));
    
                  var text = document.createElement('text');
                  text.textContent = fecha
                  infowincontent.appendChild(text);
                  //var icon = customLabel[tipo] || {};
                  //var ImageIcon=Imagenlol[tipo]|| {};
                  var algo='../../../img/manzana.png';
                  var marker = new google.maps.Marker({
                    map: map,
                    position: point,
                    //label:icon.label,
                    icon:algo,
                    title: NEquipo
                  });
                  marker.addListener('click', function() {
                    infoWindow.setContent(infowincontent);
                    infoWindow.open(map, marker);
                  });
                });
              });
              
              // Change this depending on the name of your PHP or XML file
              Bases('../../../config/xml.php', function(data) {
                var xml = data.responseXML;
                var markers = xml.documentElement.getElementsByTagName('marker');
                Array.prototype.forEach.call(markers, function(markerElem) {
                var id = markerElem.getAttribute('id');
                  var name = markerElem.getAttribute('Base');
                  var point = new google.maps.LatLng(
                      parseFloat(markerElem.getAttribute('Latitud')),
                      parseFloat(markerElem.getAttribute('Longitud')));
    
                  var infowincontent = document.createElement('div');
                  var strong = document.createElement('strong');
                  //strong.textContent = name
                  infowincontent.appendChild(strong);
                  infowincontent.appendChild(document.createElement('br'));
    
                  var text = document.createElement('text');
                  text.textContent = name
                  infowincontent.appendChild(text);
                  //var icon = customLabel[type] || {};
                  var Imagen='../../../img/banderin.png';
                  var marker = new google.maps.Marker({
                    map: map,
                    position: point,
                    icon: Imagen
                    //label: icon.label
                  });
                  marker.addListener('click', function() {
                    infoWindow.setContent(infowincontent);
                    infoWindow.open(map, marker);
                  });
                });
              });
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