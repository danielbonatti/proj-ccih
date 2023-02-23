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

                    <div class="form-group row">
                        <div class="col-md-12">
                            <label for="infos">Histórico</label>
                            <textarea class="form-control" id="infos" name="infos" rows="10">{{$infos}}</textarea>
                        </div>
                    </div>

                    <input type="hidden" id="nrecno" name="nrecno" value="{{$nrecno}}">
                    <button class="btn btn-primary btn-lg" type="submit">Gravar</button>
                    <!--<a href="{{ route('search.patient') }}" class="btn btn-secondary btn-lg">Voltar</a>-->
                    <a href="{{ route('patient.options',['id' => $nrecno, 'opc' => 1]) }}" class="btn btn-secondary btn-lg">Voltar</a>
                </form>
            </div>
        </div>    
    </div>

@endsection
