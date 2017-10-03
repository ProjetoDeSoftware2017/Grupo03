<!doctype html>
<html>
<head>
<title>Where am I?</title>



<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1">
<meta charset="utf-8">



<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAUH0DYewNGZ2hxpdAxRO4Q-wefLYROkDA" type="text/javascript"></script> 
<link rel="stylesheet" href="<?php echo asset('css/myLoc.css')?>" > 



</head>
<body>
<?php
   $to=0; 
   $nro_cidade=0;
$cid1=$cid;
  foreach ($cid as $p):   
       $nro_cidade++;
          if($to==0) 
          { echo " <h4>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Cidades pertencentes à Região Turística de " ?> 
                    <?=$p->Nome ?> 
                    <?php 
          }   $to=1;?>
      
            <?php echo "</h4> <br> "?> 
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
            <?=$p->Cidade ?> <b>-</b> <?=$p->Estado ?>    

   <?php endforeach ?>


<div id="map">

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
$j=-1;
// foreach ($cid as $p): 
$p=$cid[1];  
$j++;
        ?>
   
      var  googleLatAndLong_1=  new google.maps.LatLng(<?=$p->Lon ?>  ,<?=$p->Lat ?>  );
       
<?php  //   endforeach 
?>  
   //  var googleLatAndLong_1 = new google.maps.LatLng(-27.1,-53);
    //  var googleLatAndLong_2 = new google.maps.LatLng(-27.2,-53);
	var mapOptions = {
		zoom: 7,
		center: googleLatAndLong_1,
		mapTypeId: google.maps.MapTypeId.ROADMAP
	};
	var mapDiv = document.getElementById("map");
	map = new google.maps.Map(mapDiv, mapOptions);

	// add the user marker
	var title = "Cidade" ;
	var content = "You are here: " + <?=$p->Lat ?> + ", " + <?=$p->Lat ?> ;
  <?php 
$cid1=$cid;
$cont=-1;
 foreach ($cid as $p): 
  $cont++;
        
        ?>
       content = "Latitude: " + <?=$cid1[$cont]->Lat ?> + " Longitude: " + <?=$p->Lon ?> ;
         title = "Latitude: " + <?=$cid1[$cont]->Lat ?> + " Longitude: " + <?=$p->Lon ?> ;
	addMarker(map, new google.maps.LatLng(<?=$p->Lon ?>  ,<?=$p->Lat ?>  ), title,content );
     //  addMarker(map, googleLatAndLong_1, title, content);
<?php    endforeach 
?> 
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
   <script>

      // This example creates a simple polygon representing the Bermuda Triangle. Note
      // that the code specifies only three LatLng coordinates for the polygon. The
      // API automatically draws a stroke connecting the last LatLng back to the first
      // LatLng.

      function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 5,
          center: {lat: 24.886, lng: -70.268},
          mapTypeId: 'satellite'
        });

        // Define the LatLng coordinates for the polygon's path. Note that there's
        // no need to specify the final coordinates to complete the polygon, because
        // The Google Maps JavaScript API will automatically draw the closing side.
        var triangleCoords = [
          {lat: 25.774, lng: -80.190},
          {lat: 18.466, lng: -66.118},
          {lat: 32.321, lng: -64.757},
 	  {lat: 40.321, lng: -63.757}];

        var bermudaTriangle = new google.maps.Polygon({
          paths: triangleCoords,
          strokeColor: '#FFF000',
          strokeOpacity: 0.8,
          strokeWeight: 10,
          fillColor: '#FF0000',
          fillOpacity: 0.35
        });
        bermudaTriangle.setMap(map);
      }
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAUH0DYewNGZ2hxpdAxRO4Q-wefLYROkDA&callback=initMap">
    </script>


</html>


