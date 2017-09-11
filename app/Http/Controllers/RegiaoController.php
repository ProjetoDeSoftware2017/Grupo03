<?php namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Request;
class RegiaoController extends Controller {
         public function cidades(){
            $html = '<h1>Buscar Cidades Brasileiras</h1>';
		$html .= '<ul>';
		//$produtos = DB::select('select * from produtos');
                $produtos = DB::select('select * from cidades_lat ORDER BY Nome_cid ASC');
               
                  $html .= '<form action="/cidades/mostra_cidades.htm" method="get">';
 


                $html .= ' <select name="id" >';
                  $html .= ' <option name="id" value="0">Selecione uma Cidade Brasileira</option>';
		foreach ($produtos as $p) {
			
  		$html .= ' <option value="'.$p->idgeo_cid.'">'. $p->Nome_cid .'</option>';
 		                        
		}

	     $html .= '</select>   <button type="submit">Buscar Cidades</button> </form> ';
	           return $html;

         }

			

	public function lista(){
		$html = '<h1>Buscar Cidades em Regiões Turísticas</h1>';
		$html .= '<ul>';
		//$produtos = DB::select('select * from produtos');
                $produtos = DB::select('select * from Regiao_Turistica ORDER BY Estado ASC');
               
                  $html .= '<form action="/cidades/mostra_regioes/" method="get">';
 


                $html .= ' <select name="id" >';
                  $html .= ' <option name="id" value="0">Selecione uma Região Turística</option>';
		foreach ($produtos as $p) {
			
  		$html .= ' <option value="'.$p->id_Regiao.'">'. $p->Nome .' - '.$p->Estado.'</option>';
 		                        
		}

	     $html .= '</select>   <button type="submit">Buscar Cidades</button> </form> ';
	return $html;

        }
 
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
       		 $resposta = DB::select('select * from cid_lat_lon,Regiao_Turistica where cid_lat_lon.id_Reg=Regiao_Turistica.id_Regiao and  Regiao_Turistica.id_Regiao=?',[$id]); //, [$id]
      		  if(empty($resposta)) {
	             return "Esta Cidade Não Existe";
	          }
	   return view('detalhes_regioes')->with('cid', $resposta);
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

}




