@extends('paciente.layout')
@section('content')

    <div class="container"  class="px-md-4">
        <div class="row">
            <div class="col-md-12">
                <form>                   
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
                            <label>Nº Atendimento</label>
                            <input type="text" class="form-control" value="{{$atend}}" disabled>
                        </div>
                        <div class="col-md-9">
                            <label>Paciente</label>
                            <input type="text" class="form-control" value="{{$nome}}" disabled>
                        </div>
                        <!--<div class="col-md-3">
                            <label>Data Nascimento</label>
                            <input type="date" class="form-control" value="{{$nascto}}" disabled>
                        </div>-->
                    </div>

                    <!--<div class="form-group row">
                        <div class="col-md-3">
                            <label>Idade</label>
                            <input type="text" class="form-control" value="{{$idade}}" disabled>
                        </div>
                        <div class="col-md-9">
                            <label>Setor</label>
                            <input type="text" class="form-control" value="{{$setor}}" disabled>
                        </div>
                    </div>-->

                    <div class="form-group row">
                        <div class="col-md-12">
                            <label>Histórico</label>
                            <textarea class="form-control" rows="14" id="histor" readonly>{{$infos}}</textarea>
                        </div>
                    </div>

                    <input type="hidden" value="{{$nrecno}}">

                    <!-- Botão para acionar modal -->
                    <button type="button" class="btn btn-primary btn-lg" id="btnHistor" data-toggle="modal" data-target="#modalHistor">Incluir</button>

                    <!--<button class="btn btn-primary btn-lg" type="submit">Gravar</button>
                    <a href="{{ route('search.patient') }}" class="btn btn-secondary btn-lg">Voltar</a>-->
                    <a href="{{ route('patient.options',['id' => $nrecno, 'opc' => 1]) }}" class="btn btn-secondary btn-lg">Voltar</a>
                </form>

                <!-- ############################################## -->

                <!-- Modal -->
                <div class="modal fade" id="modalHistor" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Infecção Hospitalar</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form method="post" action=" {{route('note.save')}} ">
                                    @csrf 
                                    <div class="form-group row">
                                        <div class="col-md-12">
                                            <label for="infos">Histórico</label>
                                            <textarea class="form-control" id="infos" name="infos" rows="8"></textarea>
                                        </div>
                                    </div>
                                    <input type="hidden" id="nrecno" name="nrecno" value="{{$nrecno}}">
                                    <button type="submit" class="btn btn-primary btn-lg">Gravar</button>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary btn-lg" data-dismiss="modal">Fechar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>    
    </div>

@endsection
