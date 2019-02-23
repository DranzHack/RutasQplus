var circle = null;
var map = null;
var marker = null;

function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: 19.0583202, lng: -98.2122048},
          zoom: 15
        });


  var drawingManager=new google.maps.drawing.DrawingManager({
    drawingControlOptions:{
      drawingModes: ['marker','circle']
    }
  });
  drawingManager.setMap(map);

  google.maps.event.addListener(drawingManager,'overlaycomplete',function(event){
    if(event.type == 'circle')
    {
      var center = event.overlay.getCenter();
      circle={
        radius: event.overlay.getRadius(),
        center:{
          lat:center.lat(),
          lng:center.lng()
        },
        overlay:event.overlay
      };
    }

    else if (event.type=='marker')
    {
      var position = event.overlay.position;
      marker = {
        center:{
          lat:position.lat(),
          lng:position.lng()
        }
      }
      var isInRadius = google.maps.geometry.spherical.computeDistanceBetween(
        position,circle.overlay.getCenter())<=circle.radius;

      alert(isInRadius);
    }

    else
    {
      alert("AlGo Esta Pasandaaa!");
    }
    });
}