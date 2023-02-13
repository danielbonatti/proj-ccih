@extends('login.layout')
@section('content')

    <form class="form-signin" method="post" action=" {{route('auth.user')}} ">
        <!--importar csrf, proteção do laravel, para requisição do formulário-->
        @csrf 
        <h1 class="h3 mb-3 font-weight-normal">Faça login</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if (session('danger'))
            <div class="alert alert-danger">
                {{ session('danger') }}
            </div>
        @endif

        <label for="Email" class="sr-only">E-mail</label>
        <input type="email" class="form-control" id="Email" name="email" placeholder="E-mail" autofocus>
        <label for="Password" class="sr-only">Senha</label>
        <input type="password" class="form-control" id="Password" name="password" placeholder="Senha">
    
        <button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
        <p class="mt-5 mb-3 text-muted">Hsist</p>
    </form>

@endsection