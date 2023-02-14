@extends('pesquisa.layout')
@section('content')

    <div class="container" style="margin-top: 50px;">
        <div class="row">
            <div class="col-lg-2"></div>
            <div class="col-lg-8">
                <h3 class="text-center text-danger">Pequisa de preenchimento automático</h3><hr>
                <div class="form-group">
                    <h4>Busque por nome ou setor</h4>
                    <input type="text" name="search" id="search" placeholder="Enter search name" class="form-control" onfocus="this.value=''">
                </div>
                <div id="search_list"></div>
            </div>
            <div class="col-lg-2"></div>
        </div>    
    </div>

@endsection