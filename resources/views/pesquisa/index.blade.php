@extends('pesquisa.layout')
@section('content')

    <div class="container" class="px-md-4">
        <div class="row">
            <div class="col-md-12">
                <h3 class="text-center text-danger">Pequisa CCIH</h3><hr>
                <div class="form-group row">
                    <div class="col-sm-12 col-md-8">
                        <label for="search">Busque por nome ou setor</label>
                        <input type="text" class="form-control" id="search" name="search" placeholder="Digite o nome ou setor" onfocus="this.value=''">
                    </div>
                    <div class="col-sm-6 col-md-2">
                        <label for="busca">Tipo</label>
                        <select class="form-control" id="busca" name="busca">
                            <option value="1">contendo</option>
                            <option value="2">iniciando com</option>
                        </select>
                    </div>
                    <div class="col-sm-6 col-md-2">
                        <label for="ordem">Ordenação</label>
                        <select class="form-control" id="ordem" name="ordem">
                            <optgroup label="Nome">    
                                <option value="1">crescente</option>
                                <option value="2">decrescente</option>
                            </optgroup>
                            <optgroup label="Setor">    
                                <option value="3">crescente</option>
                                <option value="4">decrescente</option>
                            </optgroup>
                        </select>
                    </div>
                </div>

                <div class="table-responsive" id="search_list"></div>
            </div>
        </div>    
    </div>

@endsection
