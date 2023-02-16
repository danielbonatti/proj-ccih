@extends('paciente.layout')
@section('content')

    <div class="container" style="margin-top: 50px;">
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-10">
                <form method="post" action=" {{route('note.save')}} ">
                    @csrf 
                    
                    @if(session('mensagem'))
                        <div class="form-group row">
                            <div class="col-md-12 text-center">
                                <div class="alert alert-success">
                                    <ul>
                                        <li>{{session('mensagem')}}</li>
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
                        <div class="col-md-7">
                            <label for="nome">Paciente</label>
                            <input type="text" class="form-control" id="nome" name="nome" value="{{$nome}}" disabled>
                        </div>
                        <div class="col-md-2">
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
                            <label for="infos">Anotações</label>
                            <textarea class="form-control" id="infos" name="infos" rows="10">{{$infos}}</textarea>
                        </div>
                    </div>

                    <input type="hidden" id="nrecno" name="nrecno" value="{{$nrecno}}">
                    <button class="btn btn-primary btn-lg" type="submit">Gravar</button>
                    <a href="{{ route('search.patient') }}" class="btn btn-secondary btn-lg">Voltar</a>
                </form>
            </div>
            <div class="col-md-1"></div>
        </div>    
    </div>

@endsection