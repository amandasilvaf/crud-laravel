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
   
</head>
<body>
    <h1>Teste View Layout</h1>
    <h2>Teste View Cliente</h2>

    <div class="container">
        <main role="main">
            @hasSection('body')
                @yield('body')
            @endif
        </main>
    </div>
    

    <script src="{{ asset('jquery.js')}}"></script>
</body>
</html>