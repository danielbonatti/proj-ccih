<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

class PesquisaController extends Controller
{
    public function search(Request $request)
    {
        if($request->ajax()){
            
            $data = DB::table('chc_ate')
                ->leftJoin('chc_pcc','chc_pcc.pcc_codigo','=','chc_ate.ate_codset')
                ->leftJoin('clientes','clientes.xclientes','=','chc_ate.ate_conven')
                ->where('chc_ate.ate_modate','35')
                ->where('chc_ate.ate_nome','like','%'.$request->search.'%')
                ->orWhere('chc_pcc.pcc_especi','like','%'.$request->search.'%')
                ->select('chc_ate.ate_nome','chc_pcc.pcc_especi','clientes.razao')
                ->limit(30)
                ->get();

            $output='';

            if(count($data)>0){
        
                $output ='
                    <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">Nome</th>
                        <th scope="col">Setor</th>
                        <th scope="col">Convênio</th>
                    </tr>
                    </thead>
                    <tbody>';
        
                        foreach($data as $row){
                            $output .='
                            <tr>
                            <th scope="row">'.$row->ate_nome.'</th>
                            <td>'.$row->pcc_especi.'</td>
                            <td>'.$row->razao.'</td>
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
