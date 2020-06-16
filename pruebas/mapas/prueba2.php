<!DOCTYPE html>
<html>
<body>

<div id="map" style="width:100%;height:500px;"></div>

<script>
    
    
      var marker;
    var infowindow;

    function myMap() {
        var mapCanvas = document.getElementById("map");
        var myCenter=new google.maps.LatLng(15.471197643542778,-88.84186445817983);
        
         navigator.geolocation.getCurrentPosition(function (position) {
        // initialLocation = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
         map.setCenter(initialLocation);
     });
        
        var mapOptions = {
            center: myCenter, zoom: 16
            //mapTypeId:google.maps.MapTypeId.HYBRID
        };
        var map = new google.maps.Map(mapCanvas, mapOptions);
        google.maps.event.addListener(map, 'click', function(event) {
            placeMarker(map, event.latLng);
        });
        
                infoWindow = new google.maps.InfoWindow;

        
        if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(function(position) {
            var pos = {
              lat: position.coords.latitude,
              lng: position.coords.longitude
            };

            infoWindow.setPosition(pos);
            infoWindow.setContent('Tú estás aquí.');
            infoWindow.open(map);
            map.setCenter(pos);
          }, function() {
            handleLocationError(true, infoWindow, map.getCenter());
          });
        } else {
          // Browser doesn't support Geolocation
          handleLocationError(false, infoWindow, map.getCenter());
        }
    }

    function placeMarker(map, location) {
        if (!marker || !marker.setPosition) {
            marker = new google.maps.Marker({
                position: location,
                map: map,
            });
        } else {
            marker.setPosition(location);
        }
        if (!!infowindow && !!infowindow.close) {
            infowindow.close();
        }
        infowindow = new google.maps.InfoWindow({
            content: 'Latitude: ' + location.lat() + '<br>Longitude: ' + location.lng()
        });
        infowindow.open(map,marker);
    }
    
    
</script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBTafCnaDrXTFqaOOGbiFUC-FRUXcNlg20&callback=myMap"></script>
<!--
To use this code on your website, get a free API key from Google.
Read more at: https://www.w3schools.com/graphics/google_maps_basic.asp
-->

</body>
</html>

