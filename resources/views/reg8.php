<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>Trabalho Dani</title>
<!--
<link rel="stylesheet" href="<?php echo asset('css/myLoc.css')?>" > 
-->

<link rel="stylesheet" href="<?php echo asset('css/main.css')?>" > 

   <script async defer
   src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAUH0DYewNGZ2hxpdAxRO4Q-wefLYROkDA">
    </script>
 <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

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
$cid_2=$cid[2] ;
//echo "<br>charts : ";
//print($cid_2[0]); print($cid_2[1]);print($cid_2[2]);print($cid_2[3]);
//echo "<br> : ";
//print($cid[3][0]); print($cid[3][1]);print($cid[3][2]);print($cid[3][3]);
?>



 <div class="content">
    <h2>Resultado</h2>
    <div class="mapa" id="map" > </div> 
 <!--<div id="piechart" style="width: 900px; height: 500px;"></div>-->
<div class="mapa" id="piechart"></div>
    </div>






</body>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Notas', 'Valor'],
          ['Notas < 2.5',    <?=$cid_2[0]?>],
          ['2.5 < Notas <= 5.0',     <?=$cid_2[1]?>],
           ['5.0 < Notas <= 7.5',     <?=$cid_2[2]?>],
          ['Notas > 7.5', <?=$cid_2[3]?>]
          
        ]);
        var data1 = google.visualization.arrayToDataTable([
          ['Notas', 'Valor'],
          ['Notas < 2.5',    <?=$cid[3][0]?>],
          ['2.5 < Notas <= 5.0',     <?=$cid[3][1]?>],
           ['5.0 < Notas <= 7.5',     <?=$cid[3][2]?>],
          ['Notas > 7.5', <?=$cid[3][3]?>]
          
        ]);

        var options = {
          title: 'Notas dos Estabelecimentos com acessibilidade para deficiências'
        };
        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
        chart.draw(data1, options);
      
      }
    </script>
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


 


</html>


