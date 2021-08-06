<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}" >
    <title>Principal</title>
    
    <link rel="stylesheet" href="{{ asset('assets/css/pages/layout/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/bootstrap/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/bootstrap/bootstrap.js') }}">

    <style>
        body{
            padding:20px;
        }
    </style>
   
</head>
<body>

    <div class="container">
        @component('navbar', ["current" => "$current"])
        @endcomponent

        <main role="main">
            @hasSection('body')
                @yield('body')
            @endif
        </main>
    </div>
    



    <script src="{{ asset('assets/popper/popper.js') }}"></script>
    <script src="{{ asset('assets/js/app.js') }}"></script>
    <script src="{{ asset('assets/jquery/jquery.js') }}"></script>

    {{-- hasSection = existe seção chamada javascript? Se sim, execute o que está aqui dentro --}}
    @hasSection('javascript')
        @yield('javascript')
    @endif
   
</body>
</html>