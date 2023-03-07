@extends('pesquisa.layout')
@section('content')

    <div class="container" class="px-md-4">
        <div class="row">
            <div class="col-md-12">
                <h3 class="text-center text-danger">Pequisa CCIH</h3><hr>

                <div class="table-responsive">
                    <table id="lista" class="display">
                        <thead class="thead-dark">
                        <tr>
                            <th scope="col" data-sort="string">Nome</th>
                            <th scope="col" data-sort="string">Setor</th>
                            <th scope="col" data-sort="string">Convênio</th>
                            <th scope="col">Opções</th>
                        </tr>
                        </thead>
                        <tbody>
                            @isset($patients)    
                                @foreach ($patients as $patient)
                                    <tr>
                                        <td>{{ $patient->ate_nome }}</td>
                                        <td>{{ $patient->pcc_especi }}</td>
                                        <td>{{ $patient->razao }}</td>
                                        <td><a href="anotacao/{{ $patient->nrecno }}/1" data-toggle="tooltip" data-placement="top" title="Editar"><i class="fa-solid fa-pen-to-square fa-lg"></i></a></td>
                                    </tr>
                                @endforeach
                            @endisset
                        </tbody>
                    </table>

                </div>
            </div>
        </div>    
    </div>

@endsection
