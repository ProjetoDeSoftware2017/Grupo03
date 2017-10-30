<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>Trabalho Dani</title>
<link rel="stylesheet" href="<?php echo asset('css/myLoc.css')?>" >

   <script async defer
   src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAUH0DYewNGZ2hxpdAxRO4Q-wefLYROkDA">
    </script>

</head>
<body>

<?php 
   $to=0; 
   $nro_cidade=0;
   $cid1=$cid;

   foreach ($cid[0]as $p):   
       $nro_cidade++;

   endforeach ;
   $cid_1=$cid[1] ;
  
?>

     <div class="content">
     <h2></h2>
     </div>
    
    <div class="mapa" id="map" style="width:800px;height:800px"> </div>
  <!--
 <div class="content">
        <h2>Resultados</h2>
        <div id="map" frameborder="0" style="border:0" allowfullscreen> </div> 
    </div>
-->


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

  <?php $p=$cid[0];  ?>
   
     var  googleLatAndLong_1=  new google.maps.LatLng(<?=$p[0]->Lon ?>  ,<?=$p[0]->Lat ?>  );
            
	var mapOptions = {
		zoom:9,
		center: googleLatAndLong_1,
		mapTypeId: google.maps.MapTypeId.ROADMAP 
	};
	var mapDiv = document.getElementById("map");
	map = new google.maps.Map(mapDiv, mapOptions);  

        var location;

     <?php

    $cid_1=$cid[1];
    
    $estab_nro=0;
     foreach ($cid_1 as $c):
      $estab_nro++;
     endforeach;
     
     if($estab_nro>0)
      for($i=0;$i<$estab_nro;$i++){ ?>
         addMarker(map, new google.maps.LatLng(<?=$cid_1[$i]->lat ?>   ,<?=$cid_1[$i]->lng ?>   ),
         "<?=$cid_1[$i]->Nome_Estabelecimento ?> ", "<?=$cid_1[$i]->Endereco ?> ");

      <?php } ?>

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


