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
//$cida="";
//echo "cidades1  ".$cid[1][0]->Nome_Estabelecimento;
  foreach ($cid[0]as $p):   
       $nro_cidade++;

     endforeach ;
$cid_1=$cid[1] ;
     foreach ($cid_1 as $c):  

 //for($i=0;$i<$nro_cidade;$i++){ 
?>
   <?=$c->Estabelecimento_ID ?> <?=$c->Nome_Estabelecimento ?>  <?=$c->Endereco ?>  <?=$c->Est_UF ?> <br>


   




  <?php // }//  
 endforeach ;
 //  echo " ".$cid_1[0];
 //  exit(0); 

?>



<h3>A demonstration of how to access a TEXTAREA element</h3>

Address:<br>
<textarea id="myTextarea" rows="15" cols="150">
</textarea>

<p>Click the button to get the content of the text area.</p>

<button type="button" onclick="myFunction()">Try it</button>

<p id="demo"></p>



     <div class="content">
     <h2></h2>
     </div>
    
    <div class="mapa" id="map"> </div>
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
var end;
var end2="";
var coord ;
<?php
echo " nome:";
$cid_1=$cid[1];
$cid_2=0;
$estab_nro=0;
    foreach ($cid_1 as $c):
     $estab_nro++;
     endforeach;
//if($estab_nro>0)
?>

<?php
  for($i=263;$i<272;$i++){

   
 

    ?>




 end="<?=$cid_1[$i]->Endereco ?> <?=$cid_1[$i]->Est_Cidade ?> <?=$cid_1[$i]->Est_UF ?>";
  
new google.maps.Geocoder().geocode( { 'address': end}, function(results, status) {
                          if (status == google.maps.GeocoderStatus.OK) {
                    //   location = results[0].geometry.location;   
                       coord =<?=$cid_1[$i]->Estabelecimento_ID ?>+" ;  "+ results[0].geometry.location.lat()+" ; "+results[0].geometry.location.lng();
end2=end2+"\n"+coord;
 document.getElementById("myTextarea").value=end2;
 
        results[0].geometry.location.lat();           
 addMarker(map, new google.maps.LatLng(results[0].geometry.location.lat(),results[0].geometry.location.lng()   ),
 


"<?=$cid_1[$i]->Nome_Estabelecimento ?>  ","<?=$cid_1[$i]->Endereco ?> <?=$cid_1[$i]->Est_Cidade ?> <?=$cid_1[$i]->Est_UF ?>");             
                               }
                        });

 <?php 

       } 
 

?>

 

var end1=" Rua mauricio cardoso,1050 Frederico Westphalen RS Brasil";
new google.maps.Geocoder().geocode( { 'address': end1}, function(results, status) {
                          if (status == google.maps.GeocoderStatus.OK) {
                    //   location = results[0].geometry.location;   
              //     alert(location.lng())    
 addMarker(map, new google.maps.LatLng(results[0].geometry.location.lat(),results[0].geometry.location.lng()   ), end1,"Lat: "+results[0].geometry.location.lat()+"  Lon: "+results[0].geometry.location.lng() );  
        
                               }
                          });







<?php
for($i=0;$i<10;$i++){ ?>
addMarker(map, new google.maps.LatLng(<?=-27.36+$i/10 ?>  ,<?=-53.40+$i/10 ?>  ), " test", "cccc");

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
function myFunction() {
  
    var x = document.getElementById("myTextarea").value;
    document.getElementById("demo").innerHTML = x;
}
</script>
 


</html>


