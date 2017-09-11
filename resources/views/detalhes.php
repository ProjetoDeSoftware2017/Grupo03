
<html>
   <head>
<link href="/css/app.css" rel="stylesheet">
<title>Controle de estoque</title>
</head>
<body> 

<?php
   $to=0; 
  foreach ($cid as $p):   

          if($to==0) 
          { echo " <h4>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Cidades pertencentes a Região Turística de " ?> 
                    <?=$p->Nome ?> 
                    <?php 
          }   $to=1;?>
      
            <?php echo "</h4> <br> "?> 
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
            <?=$p->Nome_cidade ?> <b>-</b> <?=$p->Estado ?>    

   <?php endforeach ?>
	
	
</body></html>


