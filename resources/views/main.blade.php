<html>
    <head>
        <meta charset="UTF-8">
        <title>Anime list</title>

        <link rel="stylesheet" href="{{asset('css/main.css')}}">
        <link rel="stylesheet" href="{{asset('css/karuselka.css')}}">
        <link rel="stylesheet" href="{{asset('css/pop-up_window.css')}}">

        <script src="/JS/toppanel.js"></script>
        <script src="/JS/carusel.js"></script>
        <script src="/JS/parserinfo.js"></script>
    </head>
    <body>

        @include('partials.toppanel')

        <h2>@csrf</h2>

        @isset($output)
        <h1 class="output" id="parse-result">{{$output}}</h1>
        @endisset
        <div class="list" id="list">

        </div>
        <div class="main" id="main">
            @yield('content')
            @yield('search')
        </div>


    </body>
</html>
