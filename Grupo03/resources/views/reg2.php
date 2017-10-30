<!doctype html>
<html>
<head>
<title>TURISMO ACESSIVEL</title>



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
               <br>
                
                    <?php 
          }   $to=1;?>
      
            <?php echo "</h4> <br> "?> 
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
            <?=$p->Cidade ?> <b>-</b> <?=$p->Estado ?>    

   <?php endforeach ?>




<div id="map" ></div> 


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
		zoom: 9,
		center: googleLatAndLong_1,
		mapTypeId: google.maps.MapTypeId.ROADMAP 
	};
	var mapDiv = document.getElementById("map");
	map = new google.maps.Map(mapDiv, mapOptions);

	// add the user marker
	var title = "Cidade" ;
	var content = "You are here: " + <?=$p->Lat ?> + ", " + <?=$p->Lat ?> ;
    var triangleCoords_novo="[";
  <?php 
$cid1=$cid;
$cont=-1;

  $triangle = '[';
 foreach ($cid as $p): 
  $cont++;
  $virgula=",";
 if ($cont > 0) $virgula=",";
?>            triangleCoords_novo +=" ";
          triangleCoords_novo += "{lat:"+<?=$p->Lat ?> +",lon: "+<?=$p->Lon ?>+"}";
   
       content = "Latitude-: " + <?=$p->Lat ?> + " Longitude: " + <?=$p->Lon ?> ;
         title = "Latitude: " + <?=$p->Lat ?> + " Longitude: " + <?=$p->Lon ?> ;
//addMarker(map, new google.maps.LatLng(<?=$p->Lon ?>  ,<?=$p->Lat ?>  ), title,content );
     //  addMarker(map, googleLatAndLong_1, title, content); <?=$p->Lon 
      
        
       
                 
 //<? if($cont>0) echo ",";?>

          
 	  


<?php    endforeach ?> 

      triangleCoords_novo += "]";

 var triangleCoords = [
         <?php 
//$aux=$cid[3];
//$aux1=$cid[4];
//$cid[3]=$aux1;
//$cid[4]=$aux;
             for($i=0; $i<=$cont; $i++){
                ?> 
          {lat: <?=$cid[$i]->Lon ?> , lng: <?=$cid[$i]->Lat ?> },
       

       <?php    }  ?>   ];


                 var   coordenadas;
           <?php 
             for($i=0; $i<$nro_cidade; $i++)
             {
                ?> 
                    coordenadas =   <?=$cid[$i]->coordenadas ?>  ;
                      new google.maps.Polygon({
                                  paths: coordenadas, // triangleCoords,
                                   strokeColor: '#FF0000',
                                    strokeOpacity: 1,
                                    strokeWeight:1,
                                    fillColor: '#FF0000',
                                     fillOpacity: .5
                                     }).setMap(map);
    <?php    }  ?> 

var x = document.getElementById("Rua Mauríco Cardoso,207 RS");
var defaultVal = x.defaultValue;
var currentVal = x.value;
//var addressInput = document.getElementById('address-input').value="Rua Mauríco Cardoso,207 RS"; 

  var geocoder = new google.maps.Geocoder();

  geocoder.geocode({address: currentVal}, function(results, status) {

    if (status == google.maps.GeocoderStatus.OK) {

      var myResult = results[0].geometry.location; // referência ao valor LatLng
        loc[0]=results[0].geometry.location.lat();
        loc[1]=results[0].geometry.location.lng();  

      createMarker(myResult); // adicionar chamada à função que adiciona o marcador

  //    map.setCenter(myResult);

    //  map.setZoom(17);

    }
  }).setMap(map);


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






/*
           <?php 
             for($i=$cont; $i>1; $i--)
             {
                ?> 
                    coordenadas =  [{lat: <?=$cid[$i]->Lon ?> , lng: <?=$cid[$i]->Lat ?> },
                                      {lat: <?=$cid[$i-1]->Lon ?> , lng: <?=$cid[$i-1]->Lat ?> },
                                        {lat: <?=$cid[$i-2]->Lon ?> , lng: <?=$cid[$i-2]->Lat ?> }];
                      new google.maps.Polygon({
                                  paths: coordenadas, // triangleCoords,
                                   strokeColor: '#FF0000',
                                    strokeOpacity: .1,
                                    strokeWeight: 1,
                                    fillColor: '#FF0000',
                                     fillOpacity: .1
                                     }).setMap(map);
    <?php    }  ?>
*/
var triangleCoords1 = [
          {lat: 24.774, lng: -80.190},
          {lat: 17.466, lng: -66.118},
          {lat: 31.321, lng: -64.757},
 	  {lat: 39.321, lng: -63.757}];
     new google.maps.Polygon({
          paths: triangleCoords, // triangleCoords,
          strokeColor: '#FFFF00',
          strokeOpacity: 0.8,
          strokeWeight: 1,
          fillColor: '#FFFFFF',
          fillOpacity: 0.35
        });//.setMap(map);
  //initMap(map,triangleCoords) ;
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

      function initMap(map,triangleCoords) {
   //     var map = new google.maps.Map(document.getElementById('map'), {
   //       zoom: 5,
   //       center: {lat: 25.774, lng: -80.190},
   //       mapTypeId: 'roadmap'
   //     });
   
        // Define the LatLng coordinates for the polygon's path. Note that there's
        // no need to specify the final coordinates to complete the polygon, because
        // The Google Maps JavaScript API will automatically draw the closing side.
  /*      var triangleCoords = [
          {lat: 25.774, lng: -80.190},
          {lat: 18.466, lng: -66.118},
          {lat: 32.321, lng: -64.757},
 	  {lat: 40.321, lng: -63.757}];
*/
        var bermudaTriangle = new google.maps.Polygon({
          paths: triangleCoords, // triangleCoords,
          strokeColor: '#FFF000',
          strokeOpacity: 0.8,
          strokeWeight: 10,
          fillColor: '#FF0000',
          fillOpacity: 0.35
        });
        bermudaTriangle.setMap(map);
      }
   </script>
  //  <script async defer
  //  src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAUH0DYewNGZ2hxpdAxRO4Q-wefLYROkDA&callback=initMap">
  //  </script>


</html>


