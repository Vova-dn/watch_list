@extends('main')

@section('search')


<div class="search_results">
    @isset($results)
        @foreach($results as $result)
            <div class ="result">
                <div class="photo">
                    <img src="{{asset('storage/' . $result->image)}}">
                </div>

                <div class="shortstory">
                    <a class="info">Название: {{$result->name}}</a>
                    <a class="info">Тип произведения: {{$result->type}}</a>
                    <a class="info">Количество епизодов: {{$result->episodes}}</a>
                    <a class="info">Длительность епизода: {{$result->duration}}</a>
                    <a class="info">Оценка на shikomori: {{$result->rating}}</a>
                </div>
            </div>
        @endforeach
    @endisset
</div>
@endsection
