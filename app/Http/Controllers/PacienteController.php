<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Helpers\hs_funcoes;

use DB;

class PacienteController extends Controller
{
    public function note(Request $request){
        $data = DB::table('chc_ate')
            ->leftJoin('chc_pcc','chc_pcc.pcc_codigo','=','chc_ate.ate_codset')
            ->leftJoin('chc_prt','chc_prt.prt_numero','=','chc_ate.ate_prontu')
            ->where('chc_ate.nrecno',$request->id)
            ->select('chc_ate.ate_numate','chc_ate.ate_nome','chc_prt.prt_nascto','chc_pcc.pcc_especi','chc_ate.ate_infada','chc_ate.nrecno')
            ->first();
        if(!is_null($data)){    
            $dados = ['atend' => $data->ate_numate,
                'nome' => $data->ate_nome,
                'nascto' => $data->prt_nascto,
                'idade' => (new hs_funcoes)->hs_verida($data->prt_nascto,date("Y-m-d")),
                'setor' => $data->pcc_especi,
                'infos' => $data->ate_infada,
                'nrecno' => $data->nrecno];
            if($request->opc == 1){
                return view('paciente.opcoes')
                    ->with($dados);
            } else {
                return view('paciente.index')
                    ->with($dados);
            }
        } else {
            return view('pesquisa.index');
        }
    }

    public function gravar(Request $request){
        $data = DB::table('chc_ate')
            ->where('nrecno',$request->nrecno)
            ->update(['ate_infada' => $request->infos]);
        
        if($data){
            return redirect()->back()->with('positivo','Anotação gravada com sucesso.');
        } else {
            return redirect()->back()->with('negativo','Nenhuma alteração foi efetuada.');
        }
    }
}
