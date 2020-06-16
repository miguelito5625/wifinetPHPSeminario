<?php
//ps3mike1@gmail.com api de google maps AIzaSyBTafCnaDrXTFqaOOGbiFUC-FRUXcNlg20

?>

<!DOCTYPE html>
<html>
<head> 
    <meta charset="UTF-8">
	<meta name="viewport" content="initial-scale=1.0">
    <title>Maps JavaScript API</title>
	<style> 
  	  #map {
        height: 100%;
      }
     
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
	</style> 
</head>  
	<body>
		<div id ="map"> </div> 
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDyetklP8qKMOoWODKlWV_z7yndYz8ZeGM&callback=initMap" async defer></script>
	<script>
		
      var map;
  	 function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {
		  center: {lat: 43.5293, lng: -5.6773},
          zoom: 13,
        });
        var marker = new google.maps.Marker({
          position: {lat: 43.542194, lng: -5.676875},
          map: map,
	  title: 'Acuario de Gijón'
        });
        
        
      }

      
	</script>

	</body> 
</html>