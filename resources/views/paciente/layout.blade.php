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
  
    <style>
      .desativado:link, .desativado:hover, .desativado:visited {
        color: #C5C5C5;
	      text-decoration:none;
      }
      #histor{
        background-color: white;
      }
    </style>

    <title>Anotações CCIH</title>
  </head>
  <body class="pb-2">
    <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
      <a href="{{route('search.patient')}}" class="my-0 mr-md-auto" title="início"><img src="{{ asset('public/images/logo.png') }}" height="36" alt="HSist"></a>
      <nav class="my-2 my-md-0 mr-md-3">
        <a href="{{route('user.out')}}" class="p-2 text-dark" href="#">Sair</a>
      </nav>
    </div>
  
    @yield('content')

    <!-- JavaScript -->
    <script src="{{ asset('public/js/3.5.1/jquery.min.js') }}"></script>

    <script>
      $(document).ready(function(){
          $("#histor").click(function(){
            $("#btnHistor").trigger('click');
          });

          $('#modalHistor').on('shown.bs.modal', function () {
              $('#infos').focus();
          });
      });
    </script>
  </body>
</html>
