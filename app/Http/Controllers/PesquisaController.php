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

            /*return $request->input('search');

            $data = DB::table('chc_ate')
                ->leftJoin('chc_pcc','chc_pcc.pcc_codigo','=','chc_ate.ate_codset')
                ->leftJoin('clientes','clientes.xclientes','=','chc_ate.ate_conven')
                ->select('chc_ate.ate_nome','chc_pcc.pcc_especi','clientes.razao','chc_ate.nrecno','chc_ate.ate_modate')
                ->whereNotNull('chc_ate.ate_nome')
                ->where('chc_ate.ate_modate','=','35')
                ;
            
            // tipo de busca "contendo" ou "iniciando com"
            if($request->busca == 1){
                $data = $data->where(function (Builder $query) {
                    $query->where('chc_ate.ate_nome','like','%'.$request->search.'%')->orWhere('chc_pcc.pcc_especi','like','%'.$request->search.'%');
                });
            } else {
                $data = $data->where(function ($query) {
                    $query->where('chc_ate.ate_nome','like',$request->search.'%')->orWhere('chc_pcc.pcc_especi','like',$request->search.'%');
                });
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
            
            $data = $data->limit(30)
                ->get();*/

            // ==========================================

            // tipo de busca "contendo" ou "iniciando com"
            $tipo = $request->busca == 1 ? "%" : "";

            $data = DB::select("select a.ate_nome,b.pcc_especi,c.razao,d.nrecno
                from chc_ate a
                right join gsc_cih d on d.cih_numate=a.ate_numate
                left join chc_pcc b on b.pcc_codigo=a.ate_codset
                left join clientes c on c.xclientes=a.ate_conven
                where a.ate_modate='35'
                and coalesce(a.ate_cancel,'N')='N'
                and a.ate_nome is not null
                and (a.ate_nome like '$tipo$request->search%' or pcc_especi like '$tipo$request->search%')
                order by a.ate_nome
                limit 30");

            $output='';

            if(count($data)>0){
        
                $output ='
                    <table class="table table-striped table-sortable">
                    <thead class="thead-dark">
                    <tr>
                        <th scope="col" data-sort="string">Nome</th>
                        <th scope="col" data-sort="string">Setor</th>
                        <th scope="col" data-sort="string">Convênio</th>
                        <th scope="col">Opções</th>
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
                    </table><script>document.querySelector(".table-sortable").tsortable()</script>';
    
            }else{
        
                $output .='Sem resultados';
        
            }
        
            return $output;
        
        }
    }
}
