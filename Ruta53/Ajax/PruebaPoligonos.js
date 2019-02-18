  var myLatLng = { lat: 17.446399, lng: 78.384444 };
   var myLatLng1 = { lat: 17.430000, lng: 78.380000 };
   var citymap = {
                hyderabad: {
                    center: { lat: 17.446507, lng: 78.383033 },
                    population: 2714856
                }
            };
 var map = new google.maps.Map(document.getElementById("map"), {
   center: new google.maps.LatLng(17.446507, 78.383033),
   zoom: 12,
   mapTypeId: google.maps.MapTypeId.ROADMAP
 });
 var iconBase = 'https://maps.google.com/mapfiles/kml/shapes/'
 var marker = new google.maps.Marker({
                position: myLatLng,
                map: map,
                title: 'Asset 1',
                draggable: true,
                animation: google.maps.Animation.DROP,
              //  icon:image
            });
            
             marker.addListener('dragend', checkifInOrOut);
             
         function checkifInOrOut() {
               if( cityCircle.getBounds().contains( marker.getPosition()) == false ){
                  
                   marker.setIcon(iconBase + 'library_maps.png');
                }else{
                   marker.setIcon("");
                }

   
         }
             
             for (var city in citymap) {
            // Add the circle for this city to the map.
            var cityCircle = new google.maps.Circle({
                strokeColor: '#ffb3b3',
                strokeOpacity: 0.8,
                strokeWeight: 2,
                fillColor: '#ffb3b3',
                fillOpacity: 0.35,
                map: map,
                center: citymap[city].center,
                radius: Math.sqrt(citymap[city].population) * 1
            });
        }

 var infoWindow = new google.maps.InfoWindow({
   map: map
 });

