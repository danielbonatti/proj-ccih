<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

use DataTables;

class PesquisaController extends Controller
{
    public function index(){
        //return view('pesquisa.index');
        
        /*$patients = DB::select("select a.ate_nome,b.pcc_especi,c.razao,d.nrecno
                from chc_ate a
                right join gsc_cih d on d.cih_numate=a.ate_numate
                left join chc_pcc b on b.pcc_codigo=a.ate_codset
                left join clientes c on c.xclientes=a.ate_conven
                where a.ate_modate='35'
                and coalesce(a.ate_cancel,'N')='N'
                and a.ate_nome is not null
                order by a.ate_nome
                ");
        return view('pesquisa.index',compact('patients'));*/

        return view('pesquisa.index');

    }
    
    public function search()
    {        
        $patients = DB::select("select a.ate_nome,b.pcc_especi,c.razao,d.nrecno
            from chc_ate a
            right join gsc_cih d on d.cih_numate=a.ate_numate
            left join chc_pcc b on b.pcc_codigo=a.ate_codset
            left join clientes c on c.xclientes=a.ate_conven
            where a.ate_modate='35'
            and coalesce(a.ate_cancel,'N')='N'
            and a.ate_nome is not null
            order by a.ate_nome");

        return DataTables::of($patients)->make(true);
    }
}
