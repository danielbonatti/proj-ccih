@extends('paciente.layout')
@section('content')

    <div class="container"  class="px-md-4">
        <div class="row">
            <div class="col-md-12">
                <form method="post" action=" {{route('note.save')}} ">
                    @csrf 
                    
                    @if(session('positivo'))
                        <div class="form-group row">
                            <div class="col-md-12 text-center">
                                <div class="alert alert-success" role="alert">
                                    <ul>
                                        <li>{{session('positivo')}}</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    @endif

                    @if(session('negativo'))
                        <div class="form-group row">
                            <div class="col-md-12 text-center">
                                <div class="alert alert-warning" role="alert">
                                    <ul>
                                        <li>{{session('negativo')}}</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    @endif

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

                    <div class="row text-center my-4">
                        <div class="col-sm-6 col-md-3 col-lg-2">
                            <div class="img-card">
                                <a href="#" class="desativado">
                                    <i class="fa fa-clipboard" style="font-size:80px;"></i>
                                    <p>Dados Iniciais</p>
                                </a>
                            </div>
                        </div>

                        <div class="col-sm-6 col-md-3 col-lg-2">
                            <div class="img-card">
                                <a href="{{route('patient.options',['id' => $nrecno, 'opc' => 2])}}">
                                    <i class="fa fa-file-text-o" style="font-size:80px;"></i>
                                    <p>Anotações</p>
                                </a>
                            </div>
                        </div>

                        <div class="col-sm-6 col-md-3 col-lg-2">
                            <div class="img-card">
                                <a href="#" class="desativado">
                                    <i class="fa fa-heartbeat" style="font-size:80px;"></i>
                                    <p>Cirurgias</p>
                                </a>
                            </div>
                        </div>

                        <div class="col-sm-6 col-md-3 col-lg-2">
                            <div class="img-card">
                                <a href="#" class="desativado">
                                    <i class="fa fa-medkit" style="font-size:80px;"></i>
                                    <p>Precaução</p>
                                </a>
                            </div>
                        </div>

                        <div class="col-sm-6 col-md-3 col-lg-2">
                            <div class="img-card">
                                <a href="#" class="desativado">
                                    <i class="fa fa-hand-o-left" style="font-size:80px;"></i>
                                    <p>Saída</p>
                                </a>
                            </div>
                        </div>

                        <div class="col-sm-6 col-md-3 col-lg-2">
                            <div class="img-card">
                                <a href="#" class="desativado">
                                    <i class="fa fa-sticky-note-o" style="font-size:80px;"></i>
                                    <p>Impressão</p>
                                </a>
                            </div>
                        </div>
                    </div>
                   
                    <a href="{{ route('search.patient') }}" class="btn btn-secondary btn-lg">Voltar</a>
                </form>
            </div>
        </div>    
    </div>

@endsection
