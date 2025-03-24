
@extends('main')

@section('content')

    <div class="category" id="films">
        <div class="name">
            <a class="name">Фильмы</a>
        </div>
        <div class="contains">

        </div>
    </div>

    <div class="category" id="serial">
        <div class="name">
            <a class="name">Сериалы</a>
        </div>
        <div class="contains">

        </div>
    </div>

    <div class="category" id="anime">
        <div class="name">
            <a class="name">Аниме</a>
        </div>
        <div class="contains">
            <div class="carousel">
                <div class="carousel-item" id="AnimeSlide_1">
                    @isset($animes_1)
                        @foreach ($animes_1 as $anime)
                            <div class='icon'>
                                <img class='img' src="{{asset('storage/'.$anime->image)}}">
                                <a class='text'>{{$anime->name}}</a>
                                <form action='/title/{{$anime->id}}'><button class="href"></button></form>
                            </div>
                        @endforeach
                    @endisset
                </div>
                <div class="carousel-item" id="AnimeSlide_2">
                    @isset($animes_2)
                        @foreach ($animes_2 as $anime)
                            <div class='icon'>
                                <img class='img' src="{{asset('storage/'.$anime->image)}}">
                                <a class='text'>{{$anime->name}}</a>
                                <form action='/title/{{$anime->id}}'><button class="href"></button></form>
                            </div>
                        @endforeach
                    @endisset
                </div>
                <div class="carousel-item" id="AnimeSlide_3">
                    @isset($animes_3)
                        @foreach ($animes_3 as $anime)
                            <div class='icon'>
                                <img class='img' src="{{asset('storage/'.$anime->image)}}">
                                <a class='text'>{{$anime->name}}</a>
                                <form action='/title/{{$anime->id}}'><button class="href"></button></form>
                            </div>
                        @endforeach
                    @endisset
                </div>
            </div>
            <button class="car" id="prev"></button>
            <button class="car" id="next"></button>
        </div>
    </div>

@endsection
