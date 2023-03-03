@extends('paciente.layout')
@section('content')

    <div class="container" class="px-md-4">
        <div class="row">
            <div class="col-md-12">
                <form>                    
                    <div class="form-group row">
                        <div class="col-md-3">
                            <label for="atend">Nº Atendimento</label>
                            <input type="text" class="form-control" id="atend" name="atend" value="{{$atend}}" disabled>
                        </div>
                        <div class="col-md-6">
                            <label for="nome">Paciente</label>
                            <input type="text" class="form-control" id="nome" name="nome" value="{{$nome}}" disabled>
                        </div>
                        <div class="col-md-3">
                            <label for="nascto">Data Nascimento</label>
                            <input type="date" class="form-control" id="nascto" name="nascto" value="{{$nascto}}" disabled>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-3">
                            <label for="idade">Idade</label>
                            <input type="text" class="form-control" id="idade" name="idade" value="{{$idade}}" disabled>
                        </div>
                        <div class="col-md-9">
                            <label for="setor">Setor</label>
                            <input type="text" class="form-control" id="setor" name="setor" value="{{$setor}}" disabled>
                        </div>
                    </div>
                </form>
            </div>

            <!-- ############################### -->

            <div class="row w-100 text-center my-4">
                <div class="col-6col-md-2">
                    <a href="#" class="desativado">
                        <i class="fa-solid fa-clipboard-user fa-8x"></i>
                        <p>Dados Iniciais</p>
                    </a>
                </div>

                <div class="col-6 col-md-2">
                    <a href="{{route('patient.options',['id' => $nrecno, 'opc' => 2])}}">
                        <i class="fa-solid fa-book fa-8x"></i>
                        <p>Histórico</p>
                    </a>
                </div>

                <div class="col-6 col-md-2">
                    <a href="#" class="desativado">
                        <i class="fa-solid fa-heart-pulse fa-8x"></i>
                        <p>Cirurgias</p>
                    </a>
                </div>

                <div class="col-6 col-md-2">
                    <a href="#" class="desativado">
                        <i class="fa-solid fa-suitcase-medical fa-8x"></i>
                        <p>Precaução</p>
                    </a>
                </div>

                <div class="col-6 col-md-2">
                    <a href="#" class="desativado">
                    <i class="fa-solid fa-door-open fa-8x"></i>
                        <p>Saída</p>
                    </a>
                </div>

                <div class="col-6 col-md-2">
                    <a href="#" class="desativado">
                    <i class="fa-solid fa-print fa-8x"></i>
                        <p>Impressão</p>
                    </a>
                </div>
            </div>
            
        </div>
        <a href="{{ route('search.patient') }}" class="btn btn-secondary btn-lg">Voltar</a>    
    </div>

@endsection
