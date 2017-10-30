<!doctype html>
<html>
<head>
<title>Where am I?</title>



<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1">
<meta charset="utf-8">



<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAUH0DYewNGZ2hxpdAxRO4Q-wefLYROkDA" type="text/javascript"></script> 
<link rel="stylesheet" href="<?php echo asset('css/main.css')?>" > 



</head>
<body>

 <div class="content">
    <h2>Resultado</h2>
    <div class="mapa" id="map" ></div> 
    </div>

 

</body>
<script>
var map = null;
var ourCoords =  {
	latitude: 47.624851,
	longitude: -122.52099
};

window.onload = getMyLocation;

function getMyLocation() {
	if (navigator.geolocation) {
                 
		navigator.geolocation.getCurrentPosition(
			showMap//,//displayLocation, 
			//displayError
                       );
          //  showMap(position.coords);
	}
	else {
		alert("Oops, no geolocation support");
	}
}





// ------------------ End Ready Bake -----------------

function showMap(coords) {
	//var googleLatAndLong = new google.maps.LatLng(coords.latitude, 
	//coords.longitude);
  <?php 
  foreach ($cid as $p):   
        ?>
      var  googleLatAndLong_1=  new google.maps.LatLng(<?=$p->Lon ?>  ,<?=$p->Lat ?>  );
   
 var   coordenadas = <?=$p->coordenadas ?>; 
          
                    
          
 <?php endforeach ?>  
   //  var googleLatAndLong_1 = new google.maps.LatLng(-27.1,-53);
    //  var googleLatAndLong_2 = new google.maps.LatLng(-27.2,-53);
	var mapOptions = {
		zoom: 5,
		center: googleLatAndLong_1,
		mapTypeId: google.maps.MapTypeId.ROADMAP
	};
	var mapDiv = document.getElementById("map");
	map = new google.maps.Map(mapDiv, mapOptions);

	// add the user marker
	var title = "Your Location";
	var content = "You are here: " + coords.latitude + ", " + coords.longitude;
	//addMarker(map, googleLatAndLong_2, title, content);
       addMarker(map, googleLatAndLong_1, title, content);
   //  addMarker(map, new google.maps.LatLng(-29.701945  , -51.321769 ), title, content);
 //  coordenadas =  [{lng: -29.701945 , lat: -51.321769 }, {lng: -29.688119 , lat: -51.461299 }, {lng: -29.639389 , lat: -51.39887 }];
 // coordenadas =  [{lat: -51.321769 ,lng: -29.701945  }, {lat: -51.461299,lng: -29.688119  }, {lat: -51.39887,lng: -29.639389   }];
 //  coordenadas = [{lng:-54.486671  , lat:-28.289779   },{lng: -53.4827990, lat:-27.289842},{lng: -55.47627099, lat:-29.293321}];
 //  coordenadas =  [{lng:-53.486671, lat:-27.289779},{lng: -53.48279900000001, lat:-27.289842},{lng: -53.47627099999999, lat:-27.293321}];
                      new google.maps.Polygon({
                                  paths: coordenadas, // triangleCoords,
                                   strokeColor: '#FF0000',
                                    strokeOpacity: 1,
                                    strokeWeight: 1,
                                    fillColor: '#FF0000',
                                     fillOpacity: .5
                                     }).setMap(map);
  



}

function addMarker(map, latlong, title, content) {
	var markerOptions = {
		position: latlong,
		map: map,
		title: title,
		clickable: true
	};
	var marker = new google.maps.Marker(markerOptions);

	var infoWindowOptions = {
		content: content,
		position: latlong
	};

	var infoWindow = new google.maps.InfoWindow(infoWindowOptions);

	google.maps.event.addListener(marker, 'click', function() {
		infoWindow.open(map);
	});
}




 </script>


</html>


