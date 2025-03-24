<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/content.css') }}">
    <script src="/JS/toppanel.js"></script>


    <link rel="stylesheet" href="{{asset('css/toppanel.css')}}">
    <title>Anime</title>
</head>
<body>

    <div id="1">
        <div id="toppanel">
        </div>
        <h2 class="none">@csrf</h2>
        <div class="main">
            @foreach ($animes as $anime)
            <div class='icon'>
                <img class='img' src={{$anime->image}}>
                <a class='name'>{{$anime->name}}</a>
                <form action='/title/{{$anime->id}}'><button class="href"></button></form>
            </div>
            @endforeach
        </div>
    </div>
</body>
</html>
