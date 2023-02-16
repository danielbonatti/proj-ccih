@extends('pesquisa.layout')
@section('content')

    <div class="container" style="margin-top: 50px;">
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-10">
                <h3 class="text-center text-danger">Pequisa CCIH</h3><hr>
                <div class="form-group">
                    <h4>Busque por nome ou setor</h4>
                    <input type="text" name="search" id="search" placeholder="Digite o nome ou setor" class="form-control" onfocus="this.value=''">
                </div>

                <div id="search_list"></div>
            </div>
            <div class="col-md-1"></div>
        </div>    
    </div>

@endsection