<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

class PesquisaController extends Controller
{
    public function index(){
        return view('pesquisa.index');
    }
    
    public function search(Request $request)
    {        
        if($request->ajax()){

            //return $request->input('search');
            $data = DB::table('chc_ate')
                ->leftJoin('chc_pcc','chc_pcc.pcc_codigo','=','chc_ate.ate_codset')
                ->leftJoin('clientes','clientes.xclientes','=','chc_ate.ate_conven')
                ->where('chc_ate.ate_modate','35');

            // tipo de busca "contendo" ou "iniciando com"
            if($request->busca == 1){
                $data = $data->where('chc_ate.ate_nome','like','%'.$request->search.'%')
                    ->orWhere('chc_pcc.pcc_especi','like','%'.$request->search.'%');
            } else {
                $data = $data->where('chc_ate.ate_nome','like',$request->search.'%')
                    ->orWhere('chc_pcc.pcc_especi','like',$request->search.'%');
            }

            // ordenação
            switch($request->ordem){
                case 1:
                    $data = $data->orderBy('chc_ate.ate_nome','asc');
                    break;
                case 2:
                    $data = $data->orderBy('chc_ate.ate_nome','desc');
                    break;
                case 3:
                    $data = $data->orderBy('chc_pcc.pcc_especi','asc');
                    break;
                case 4:
                    $data = $data->orderBy('chc_pcc.pcc_especi','desc');
                    break;
            }

            /*if($request->ordem == 1){
                $data = $data->orderBy('chc_ate.ate_nome','asc');
            } else {
                $data = $data->orderBy('chc_ate.ate_nome','desc');
            }*/
            
            $data = $data->select('chc_ate.ate_nome','chc_pcc.pcc_especi','clientes.razao','chc_ate.nrecno')
                ->limit(30)
                ->get();

            $output='';

            if(count($data)>0){
        
                $output ='
                    <table class="table">
                    <thead class="thead-dark">
                    <tr>
                        <th class="th-sm">Nome</th>
                        <th class="th-sm">Setor</th>
                        <th class="th-sm">ConvÃªnio</th>
                        <th class="th-sm">OpÃ§Ãµes</th>
                    </tr>
                    </thead>
                    <tbody>';
        
                        foreach($data as $row){
                            $aux="anotacao/$row->nrecno/1";
                            //$aux="/anotacao/$row->nrecno";
                            //$aux="{{route('patient.options',['id' => $row->nrecno,'opc' => 1])}}";
                            $output .='
                            <tr>
                            <td>'.$row->ate_nome.'</td>
                            <td>'.$row->pcc_especi.'</td>
                            <td>'.$row->razao.'</td>
                            <td><a href="'.$aux.'" data-toggle="tooltip" data-placement="top" title="Editar"><i class="fa fa-pencil fa-lg"></i></a></td>
                            </tr>
                            ';
                        }
        
                $output .= '
                    </tbody>
                    </table>';
    
            }else{
        
                $output .='Sem resultados';
        
            }
        
            return $output;
        
        }
    }
}
