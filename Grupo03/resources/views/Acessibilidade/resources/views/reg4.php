<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>Trabalho Dani</title>
<link rel="stylesheet" href="<?php echo asset('css/main.css')?>" >

   <script async defer
   src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAUH0DYewNGZ2hxpdAxRO4Q-wefLYROkDA">
    </script>

</head>
<body>
<?php 
   $to=0; 
   $nro_cidade=0;
$cid1=$cid;
$cida="";
  foreach ($cid[0] as $p):   
       $nro_cidade++;

          if($to==0) 
       //   { echo " <h4>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Cidades pertencentes à Região Turística de " 
?> 
          <!--          <?=$p->Cidade ?> -->   
               <br>
                
                    <?php 
       //   }   $to=1;
      ?>
      
            <?php echo "</h4> <br> "?> 
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
        <!--    <?=$p->Cidade ?> <b>-</b> <?=$p->Estado ?> -->   

   <?php endforeach ?>
 <?php // echo $cid[1];//exit(0); 

?>
 
 <div class="content">
        <h2>Resultados</h2>
        <div id="map" frameborder="0" style="border:0" allowfullscreen> </div> 
    </div>



</body>
<script>
var map = null;
var  marker;

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
2
  <?php 
$j=-1;


$p=$cid[0];  
$j++;
        ?>
   

     var  googleLatAndLong_1=  new google.maps.LatLng(<?=$p[0]->Lon ?>  ,<?=$p[0]->Lat ?>  );
            
	var mapOptions = {
		zoom:9,
		center: googleLatAndLong_1,
		mapTypeId: google.maps.MapTypeId.ROADMAP 
	};
	var mapDiv = document.getElementById("map");
	map = new google.maps.Map(mapDiv, mapOptions);  

  var location;
var end=" rua jose canellas,258 Frederico Westphalen RS Brasil";
 var coord =
new google.maps.Geocoder().geocode( { 'address': end}, function(results, status) {
                          if (status == google.maps.GeocoderStatus.OK) {
                    //   location = results[0].geometry.location;   
                       var coord ="Lat: "+results[0].geometry.location.lat()+"  Lon: "+results[0].geometry.location.lng();
              //     alert(location.lng())    
 addMarker(map, new google.maps.LatLng(results[0].geometry.location.lat(),results[0].geometry.location.lng()   ), end,"Lat: "+results[0].geometry.location.lat()+"  Lon: "+results[0].geometry.location.lng() );             
                               }
                          });
var end1=" Rua mauricio cardoso,1050 Frederico Westphalen RS Brasil";
new google.maps.Geocoder().geocode( { 'address': end1}, function(results, status) {
                          if (status == google.maps.GeocoderStatus.OK) {
                    //   location = results[0].geometry.location;   
              //     alert(location.lng())    
 addMarker(map, new google.maps.LatLng(results[0].geometry.location.lat(),results[0].geometry.location.lng()   ), end1,"Lat: "+results[0].geometry.location.lat()+"  Lon: "+results[0].geometry.location.lng() );             
                               }
                          });


                   var   coordenadas;
           <?php 
             for($i=0; $i<$nro_cidade; $i++)
             {
                ?> 
                    coordenadas =   <?=$cid[0][$i]->coordenadas ?>  ;
                      new google.maps.Polygon({
                                  paths: coordenadas, // triangleCoords,
                                   strokeColor: '#FF0000',
                                    strokeOpacity: 1,
                                    strokeWeight:1,
                                    fillColor: '#FF0000',
                                     fillOpacity: .5
                                     }).setMap(map);
    <?php    }  ?> 

      
function createMarker(latlng) {

   // Se o utilizador efetuar outra pesquisa é necessário limpar a variável marker
   if(marker != undefined && marker != ''){
    marker.setMap(null);
    marker = '';
   }

   marker = new google.maps.Marker({
      map: map,
      position: latlng
   });

}

  
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

          
   </script>
 


</html>


