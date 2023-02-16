<!DOCTYPE html>
<html lang="pt-br" class="h-100">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Scripts -->
        <script src="{{ asset('/js/app.js') }}" defer></script>
        <!-- Styles -->
        <link href="{{ asset('/css/app.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <style>
            tr:nth-child(even){
                background-color: #f2f2f2;
            }
        </style>

        <title>Pesquisa CCIH</title>
    </head>
    <body>

        @yield('content')

        <!-- JavaScript -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>

        <script>
            $(document).ready(function(){
                $('#search').on('keyup',function(){
                    var query= $(this).val();
                    $.ajax({
                        url:"search",
                        type:"GET",
                        data:{'search':query},
                        success:function(data){
                            $('#search_list').html(data);
                        }
                    });
                    // end of ajax call
                });
            });
        </script>

    </body>
</html>