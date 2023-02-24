<!DOCTYPE html>
<html lang="pt-br" class="h-100">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Scripts -->
        <script src="{{ asset('public/js/app.js') }}" defer></script>
        <!-- Styles -->
	    <link rel="icon" href="{{ asset('public/images/favicon-16x16.ico') }}" type="image/x-icon">
        <link href="{{ asset('public/css/app.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <style>
            [data-sort]:hover {
                cursor: pointer;
            }
            [data-dir="asc"]:after {
                content: ' ↑';
            }
            [data-dir="desc"]:after {
                content: ' ↓';
            }
        </style>

        <title>Pesquisa CCIH</title>
    </head>
    <body class="pb-2">
        <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
            <img src="{{ asset('public/images/logo.png') }}" class="my-0 mr-md-auto" height="36" alt="HSist">
            <nav class="my-2 my-md-0 mr-md-3">
                <a href="{{route('user.out')}}" class="p-2 text-dark" href="#">Sair</a>
            </nav>
        </div>

        @yield('content')

        <!-- JavaScript -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        
        <script src="{{ asset('public/js/tablesort.min.js') }}"></script>

        <script>
            $(document).ready(function(){               
                $('#search').on('keyup',function(){
                    var query = $(this).val();
                    var busca = $('#busca').val();
                    queryGet(query,busca);
                });
                $('#busca').on('change',function(){
                    var query = $('#search').val();
                    var busca = $('#busca').val();
                    queryGet(query,busca);
                });
                $('#ordem').on('change',function(){
                    var query = $('#search').val();
                    var busca = $('#busca').val();
                    queryGet(query,busca);
                });
            });
            function queryGet(query,busca){
                $.ajax({
                    url:"search",
                    type:"GET",
                    data:{'search':query,'busca':busca},
                    success:function(data){
                        $('#search_list').html(data);
                    }
                });
            }
        </script>

    </body>
</html>