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
     		 $resposta = DB::select('select * from cid_lat_lon,Regiao_Turistica, cid_coord where cid_lat_lon.id_Reg=Regiao_Turistica.id_Regiao and  cid_coord.idGeo=cid_lat_lon.idGeo  and Regiao_Turistica.id_Regiao=?',[$id]); //, [$id]
   

 //cida="select cid_coord.idGeo, estabelecimento.Est_Cidade from cid_coord,estabelecimento where   estabelecimento.Est_Cidade= '".$resposta[0]->Cidade."'";
     
      foreach ($resposta as $p):   
    
   //   $estab = DB::select('select distinct cid_coord.idGeo, estabelecimento.Est_Cidade ,estabelecimento.Nome where estabelecimento.Est_Cidade="'.$p->Cidade.'" and cid_coord.nome_cid=estabelecimento.Est_Cidade') ;
      endforeach;
         //   $cida.=";";

      		  if(empty($resposta)) {
	             return "Esta Cidade Não Existe - no mapa";
	          }
           $retorno = array($resposta,$resposta);
	   return view('reg4')->with('cid', $retorno);
	}



}
