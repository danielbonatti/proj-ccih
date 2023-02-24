<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Http\Helpers\hs_funcoes;

use DB;

class PacienteController extends Controller
{
    public function note(Request $request){
        $data = DB::table('chc_ate')
            ->rightJoin('gsc_cih','gsc_cih.cih_numate','=','chc_ate.ate_numate')
            ->leftJoin('chc_pcc','chc_pcc.pcc_codigo','=','chc_ate.ate_codset')
            ->leftJoin('chc_prt','chc_prt.prt_numero','=','chc_ate.ate_prontu')
            ->where('gsc_cih.nrecno',$request->id)
            ->select('chc_ate.ate_numate','chc_ate.ate_nome','chc_prt.prt_nascto','chc_pcc.pcc_especi','gsc_cih.cih_histor','gsc_cih.nrecno')
            ->first();
        if(!is_null($data)){   
            $dados = ['atend' => $data->ate_numate,
                'nome' => $data->ate_nome,
                'nascto' => $data->prt_nascto,
                'idade' => (new hs_funcoes)->hs_verida($data->prt_nascto,date("Y-m-d")),
                'setor' => $data->pcc_especi,
                'infos' => utf8_encode($data->cih_histor),
                'nrecno' => $data->nrecno];
            //dd(utf8_encode($data->cih_histor));
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
        date_default_timezone_set('America/Sao_Paulo');

        $dathor = date('#d/m/Y - H:i:s');
        $usuari = Auth::user()->name;

        $consu = DB::table('gsc_cih')->where('nrecno',$request->nrecno)->selectRaw('length(cih_histor) tam')->first();
        $consu = $consu->tam<1 ? '' : '\r\n\r\n';

        $conteu = iconv("UTF-8","ISO-8859-1",$request->infos);

        $data = DB::table('gsc_cih')
            ->where('nrecno',$request->nrecno)
            ->update(['cih_histor' => DB::raw("concat(cih_histor,'$consu$dathor / $usuari\r\n$conteu')")]);
            //->update(['cih_histor' => DB::raw("concat(cih_histor,'\r\n$dathor / $usuari\r\n$request->infos')")]);
        
        if($data){
            return redirect()->back()->with('positivo','Anotação gravada com sucesso.');
        } else {
            return redirect()->back()->with('negativo','Nenhuma alteração foi efetuada.');
        }
    }
}
