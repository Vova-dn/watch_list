<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/title.css') }}">
    <title>{{$anime->name}}</title>
</head>
<body>
    <div class="title">


        <div class="anime">
            <h1 class="name">{{$anime->name}}</h1>
            <div class="info">

                <div class="photo">
                    <img src="{{asset('storage/' . $anime->image)}}">
                </div>

                <div class="shortstory">
                    <a class="info">Тип произведения: {{$anime->type}}</a>
                    <a class="info">Количество епизодов: {{$anime->episodes}}</a>
                    <a class="info">Длительность епизода: {{$anime->duration}}</a>
                    <a class="info">Оценка на shikomori: {{$anime->rating}}</a>
                </div>
            </div>

        </div>

    </div>
</body>
</html>
