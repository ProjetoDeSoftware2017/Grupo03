<?php namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Request;
class RegiaoController extends Controller {

 
	public function mostra(){
                $id = Request::input('id', '0');
		//$id = 1; // precisamos pegar o id de alguma forma
       		 $resposta = DB::select('select * from Cidades,Regiao_Turistica where Cidades.id_Regiao=Regiao_Turistica.id_Regiao and  Regiao_Turistica.id_Regiao=?',[$id]); //, [$id]
      		  if(empty($resposta)) {
	             return "Esta Cidade Não Existe";
	          }
	   return view('detalhes')->with('cid', $resposta);
	}
       
        public function mostra_regioes(){
                $id = Request::input('id', '0');
		//$id = 1; // precisamos pegar o id de alguma forma
       		 $resposta = DB::select('select * from cid_lat_lon,Regiao_Turistica where cid_lat_lon.id_Reg=Regiao_Turistica.id_Regiao and  Regiao_Turistica.id_Regiao=? ',[$id]); //, [$id]
      		  if(empty($resposta)) {
	             return "Esta Cidade Não Existe";
	          }
	   return view('detalhes_regioes')->with('cid', $resposta);
	}

         public function mostra_regioes1(){
                $id = Request::input('id', '0');
		//$id = 1; // precisamos pegar o id de alguma forma
       		 $resposta = DB::select('select * from cid_lat_lon,Regiao_Turistica where cid_lat_lon.id_Reg=Regiao_Turistica.id_Regiao and  Regiao_Turistica.id_Regiao=? order by Lon',[$id]); //, [$id]
      		  if(empty($resposta)) {
	             return "Esta Cidade Não Existe";
	          }
	   return view('reg1')->with('cid', $resposta);
	}

public function mostra_regioes2(){
                $id = Request::input('id', '0');
		//$id = 1; // precisamos pegar o id de alguma forma





       		 $resposta = DB::select('select * from cid_lat_lon,Regiao_Turistica, cid_coord where cid_lat_lon.id_Reg=Regiao_Turistica.id_Regiao and  cid_coord.idGeo=cid_lat_lon.idGeo and Regiao_Turistica.id_Regiao=?',[$id]); //, [$id]
      		  if(empty($resposta)) {
	             return "Esta Cidade Não Existe - no mapa";
	          }
	   return view('reg2')->with('cid', $resposta);
	}

	public function mostra_cidades(){
                $id = Request::input('id', '0');
		//$id = 1; // precisamos pegar o id de alguma forma
       		 $resposta = DB::select('select * from cidades_lat where cidades_lat.idgeo_cid=?',[$id]); //, [$id]
      		  if(empty($resposta)) {
	             return "Esta Cidade Não Existe";
	          }
	   return view('detalhes_cidades')->with('cid', $resposta);
	}
public function mostra_cidades2(){
                $id = Request::input('id', '0');
		
//$id = 1; // precisamos pegar o id de alguma forma
             
          



       		 $resposta = DB::select('select * from cidades_lat,cid_coord where cid_coord.idGeo=cidades_lat.idgeo_cid and cidades_lat.idgeo_cid=?',[$id]); //, [$id]
      		  if(empty($resposta)) {
	             return "Esta Cidade Não Existe";
	          }

/*
$resposta = DB::select('select  distinct * from cid_lat_lon,Regiao_Turistica, cid_coord where cid_lat_lon.id_Reg=Regiao_Turistica.id_Regiao and  cid_coord.idGeo=cid_lat_lon.idGeo  and Regiao_Turistica.id_Regiao=?',[$id]); //, [$id]
 */  


    $cida="select distinct *  from estabelecimento where lat is not null and (  ";
               //  $cida.=$cidade;
                $cida.=" estabelecimento.Est_Cidade= \"".$resposta[0]->Nome_cid."\")";
//print $cida;
//exit(0);
                 $cida=DB::select($cida);
      		  if(empty($resposta)) {
	             return "Esta Cidade Não Existe - no mapa";
	          }




		 //$retorno = array($resposta,$cida);
		// return view('detalhes_cidades')->with('cid', $retorno);
	       return view('detalhes_cidades')->with('cid', $resposta);
	}

//INÍCIO DE TUDO

//essa função vai para o index
public function mostra_regioes3(){
                $id = Request::input('id', '0');
	   return view('inicio');//->with('cid', $resposta);
	}





//função para buscar por cidades

public function cidades(){
                $resposta = DB::select('select * from cidades_lat ORDER BY Nome_cid ASC');
	   return view('cidades')->with('cid', $resposta);
	}


//função para buscar por regiões
public function lista(){
                $resposta = DB::select('select * from Regiao_Turistica ORDER BY Estado ASC');
	   return view('lista')->with('cid', $resposta);
	}
public function regioes_controler(){
                $id = Request::input('id', '0');
		//$id = 1; // precisamos pegar o id de alguma forma
 //$resposta = DB::select(' select distinct * from cidade,cid_coord,estabelecimento where cid_coord.idGeo= estabelecimento.idGeo and cidade.Cidade_ID = estabelecimento.Cidade_Cidade_ID and Regiao_Turistica_Regiao_ID=147',[$id]); //, [$id]
     		 $resposta = DB::select('select  distinct * from cid_lat_lon,Regiao_Turistica, cid_coord where cid_lat_lon.id_Reg=Regiao_Turistica.id_Regiao and  cid_coord.idGeo=cid_lat_lon.idGeo  and Regiao_Turistica.id_Regiao=?',[$id]); //, [$id]
   

 //$cida=DB::select('select * from estabelecimento where   estabelecimento.Est_Cidade= "Rio de Janeiro"');

           //'".$resposta[0]->Cidade."'";
     $cidade="";
      foreach ($resposta as $p):   
      $cidade.="   estabelecimento.Est_Cidade= \"".$p->Cidade."\" or";
     //print "rt";
//print $p->Nome;

      endforeach;


   $cida="select distinct *  from estabelecimento where lat is not null and (  ";
$cida.=$cidade;
          $cida.=" estabelecimento.Est_Cidade= \"".$p->Cidade."\")";
          $cida=DB::select($cida);
      		  if(empty($resposta)) {
	             return "Esta Cidade Não Existe - no mapa";
	          }
$regiao = DB::select('select  distinct * from Regiao_Turistica where  Regiao_Turistica.id_Regiao=?',[$id]);
//print "<br>";
//print $regiao[0]->Nome;
//print "<br>";
//print "select Nome_Estabelecimento,estabelecimento.Nota from estabelecimento  where estabelecimento.Nota > (select AVG(estabelecimento.Nota) from estabelecimento, regiao_turistica, cidade, recurso where regiao_turistica.Titulo = '".$regiao[0]->Nome."'   and Perspectiva = 'DEFICIÊNCIA AUDITIVA' and Estabelecimento_ID = Est_ID and Regiao_ID = cidade.Regiao_Turistica_Regiao_ID and Cidade_ID = estabelecimento.cidade_Cidade_ID) and estabelecimento.Nota >= 7 and estabelecimento.Nota <= 8 order by Nota desc";

$nota_audi = DB::select('select distinct (Nome_Estabelecimento),estabelecimento.Nota from estabelecimento  where estabelecimento.Nota > (select AVG(estabelecimento.Nota) from estabelecimento, regiao_turistica, cidade, recurso where regiao_turistica.Titulo = ?   and Perspectiva = \'DEFICIÊNCIA AUDITIVA\' and Estabelecimento_ID = Est_ID and Regiao_ID = cidade.Regiao_Turistica_Regiao_ID and Cidade_ID = estabelecimento.cidade_Cidade_ID) and estabelecimento.Nota >= 0 and estabelecimento.Nota <= 10 order by Nota desc',[$regiao[0]->Nome]);

$nota_mob = DB::select('select distinct (Nome_Estabelecimento),estabelecimento.Nota from estabelecimento  where estabelecimento.Nota > (select AVG(estabelecimento.Nota) from estabelecimento, regiao_turistica, cidade, recurso where regiao_turistica.Titulo = ?   and Perspectiva = \'MOBILIDADE REDUZIDA\' and Estabelecimento_ID = Est_ID and Regiao_ID = cidade.Regiao_Turistica_Regiao_ID and Cidade_ID = estabelecimento.cidade_Cidade_ID) and estabelecimento.Nota >= 0 and estabelecimento.Nota <= 10 order by Nota desc',[$regiao[0]->Nome]);

$nota_vis = DB::select('select distinct (Nome_Estabelecimento),estabelecimento.Nota from estabelecimento  where estabelecimento.Nota > (select AVG(estabelecimento.Nota) from estabelecimento, regiao_turistica, cidade, recurso where regiao_turistica.Titulo = ?   and Perspectiva = \'MOBILIDADE REDUZIDA\' and Estabelecimento_ID = Est_ID and Regiao_ID = cidade.Regiao_Turistica_Regiao_ID and Cidade_ID = estabelecimento.cidade_Cidade_ID) and estabelecimento.Nota >= 0 and estabelecimento.Nota <= 10 order by Nota desc',[$regiao[0]->Nome]);

$nota_fis = DB::select('select distinct (Nome_Estabelecimento),estabelecimento.Nota from estabelecimento  where estabelecimento.Nota > (select AVG(estabelecimento.Nota) from estabelecimento, regiao_turistica, cidade, recurso where regiao_turistica.Titulo = ?   and Perspectiva = \'MOBILIDADE REDUZIDA\' and Estabelecimento_ID = Est_ID and Regiao_ID = cidade.Regiao_Turistica_Regiao_ID and Cidade_ID = estabelecimento.cidade_Cidade_ID) and estabelecimento.Nota >= 0 and estabelecimento.Nota <= 10 order by Nota desc',[$regiao[0]->Nome]);


print "<br>";
$nota_auditiva[0]=0;
$nota_auditiva[1]=0;
$nota_auditiva[2]=0;
$nota_auditiva[3]=0;

foreach ($nota_audi as $p):   
     // print $p->Nome_Estabelecimento."Nota : ".$p->Nota."<br>" ;
      if( $p->Nota <= 2.5) 
          $nota_auditiva[0]=$nota_auditiva[0]+1;
	if( $p->Nota > 2.5 and  $p->Nota <= 5.0) 
         $nota_auditiva[1]=$nota_auditiva[1]+1;
      if( $p->Nota > 5.0 and  $p->Nota <= 7.5) 
          $nota_auditiva[2]=$nota_auditiva[2]+1;
      if( $p->Nota > 7.5 ) 
          $nota_auditiva[3]=$nota_auditiva[3]+1;
      
//print $nota_auditivaas[0];
endforeach;
  
$nota_mobil[0]=0;
$nota_mobil[1]=0;
$nota_mobil[2]=0;
$nota_mobil[3]=0;
foreach ($nota_mob as $p):   
     // print $p->Nome_Estabelecimento."Nota : ".$p->Nota."<br>" ;
      if( $p->Nota <= 2.5) 
          $nota_mobil[0]=$nota_mobil[0]+1;
	if( $p->Nota > 2.5 and  $p->Nota <= 5.0) 
          $nota_mobil[1]=$nota_mobil[1]+1;
      if( $p->Nota > 5.0 and  $p->Nota <= 7.5) 
          $nota_mobil[2]=$nota_mobil[2]+1;
      if( $p->Nota > 7.5 ) 
          $nota_mobil[3]=$nota_mobil[3]+1;
      
//print $notas[0];
endforeach;

$nota_visual[0]=0;
$nota_visual[1]=0;
$nota_visual[2]=0;
$nota_visual[3]=0;
foreach ($nota_vis as $p):   
     // print $p->Nome_Estabelecimento."Nota : ".$p->Nota."<br>" ;
      if( $p->Nota <= 2.5) 
          $nota_visual[0]=$nota_visual[0]+1;
	if( $p->Nota > 2.5 and  $p->Nota <= 5.0) 
          $nota_visual[1]=$nota_visual[1]+1;
      if( $p->Nota > 5.0 and  $p->Nota <= 7.5) 
          $nota_visual[2]=$nota_visual[2]+1;
      if( $p->Nota > 7.5 ) 
          $nota_visual[3]=$nota_visual[3]+1;
   
//print $notas[0];
endforeach;
$nota_fisica[0]=0;
$nota_fisica[1]=0;
$nota_fisica[2]=0;
$nota_fisica[3]=0;
foreach ($nota_fis as $p):   
     // print $p->Nome_Estabelecimento."Nota : ".$p->Nota."<br>" ;
      if( $p->Nota <= 2.5) 
          $nota_fisica[0]=$nota_fisica[0]+1;
	if( $p->Nota > 2.5 and  $p->Nota <= 5.0) 
          $nota_fisica[1]=$nota_fisica[1]+1;
      if( $p->Nota > 5.0 and  $p->Nota <= 7.5) 
          $nota_fisica[2]=$nota_fisica[2]+1;
      if( $p->Nota > 7.5 ) 
          $nota_fisica[3]=$nota_fisica[3]+1;
      
//print $notas[0];
endforeach;
//print $nota_auditiva[3];


  $retorno = array($resposta,$cida,$nota_mobil,$nota_auditiva,$nota_visual,$nota_fisica);
	   return view('reg8')->with('cid', $retorno);
	}



}
