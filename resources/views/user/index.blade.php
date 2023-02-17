@extends('user.layout')
@section('content')

    <form class="form-signin" method="post" action=" {{route('create.user')}} ">
        <!--importar csrf, proteção do laravel, para requisição do formulário-->
        @csrf 
        <h1 class="h3 mb-3 font-weight-normal">Cadastro</h1>
        <label for="Name" class="sr-only">Nome</label>
        <input type="text" class="form-control" id="Name" name="name" placeholder="Nome" required autofocus>
        <label for="Email" class="sr-only">E-mail</label>
        <input type="email" class="form-control" id="Email" name="email" placeholder="E-mail" required>
        <label for="Password" class="sr-only">Senha</label>
        <input type="password" class="form-control" id="Password" name="password" placeholder="Senha" required>
    
        <button class="btn btn-lg btn-primary btn-block" type="submit">Insert</button>
        <p class="mt-5 mb-3 text-muted">Hsist</p>
    </form>

@endsection