@extends('pesquisa.layout')
@section('content')

    <div class="container" class="px-md-4">
        <div class="row">
            <div class="col-md-12">
                <h3 class="text-center text-danger">Pequisa CCIH</h3><hr>

                <div class="table-responsive pb-3">
                    <table class="table table-striped table-sortable" id="lista">
                        <thead class="thead-dark">
                        <tr>
                            <th scope="col" data-sort="string">Nome</th>
                            <th scope="col" data-sort="string">Setor</th>
                            <th scope="col" data-sort="string">Convênio</th>
                            <th scope="col">Opções</th>
                        </tr>
                        </thead>
                    </table>
                </div>

            </div>
        </div>    
    </div>

@endsection
