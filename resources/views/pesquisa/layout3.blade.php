<!DOCTYPE html>
<html lang="pt-br" class="h-100">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Scripts -->
        <script src="{{ asset('public/js/app.js') }}"></script>
    
        <!-- Styles -->
	    <link rel="icon" href="{{ asset('public/images/favicon-16x16.ico') }}" type="image/x-icon">
        <link href="{{ asset('public/css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('public/datatables/1.13.3/css/jquery.dataTables.min.css') }}" rel="stylesheet">

        <title>Pesquisa CCIH</title>
    </head>
    <body class="pb-2">
        <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
            <a href="{{route('search.patient')}}" class="my-0 mr-md-auto" title="início"><img class="img-responsive" src="{{ asset('public/images/logo.png') }}" height="36" alt="HSist"></a>
            <nav class="my-2 my-md-0 mr-md-3">
                <a href="{{route('user.out')}}" class="p-2 text-dark" href="#">Sair</a>
            </nav>
        </div>

        @yield('content')

        <<script src="{{ asset('public/js/3.5.1/jquery.min.js') }}"></script>
        <script src="{{ asset('public/datatables/1.13.3/js/jquery.dataTables.min.js') }}"></script>
        <!-- JavaScript -->
        <script>
            $(document).ready(function(){               
                $('#lista').DataTable({
                    language: {
                        processing: 'Processando...',
                        lengthMenu: 'Mostar _MENU_ registros por página',
                        zeroRecords: 'Nada encontrado - desculpe',
                        info: 'Exibindo página _PAGE_ de _PAGES_',
                        infoEmpty: 'Nenhum registro disponível',
                        infoFiltered: '(filtrado de _MAX_ total de registros)',
                        search: 'Pesquisa:',
                        loadingRecords: 'Carregando...',
                        paginate: {
                            first: 'Primeiro',
                            last: 'Último',
                            next: 'Seguinte',
                            previous: 'Anterior'
                        },
                        decimal: ',',
                        thousands: '.',
                    },
                });
            });
        </script>

    </body>
</html>