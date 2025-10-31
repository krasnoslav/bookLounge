@extends('layouts.app')
@section('content')
    <section class="catalog">
        <div class="catalog__sort">
            <div class="catalog__sort-item"></div>
            <div class="catalog__sort-item"></div>
            <div class="catalog__sort-item"></div>
        </div>
        <div class="catalog__filter">
            <div class="catalog__filter-item"></div>
            <div class="catalog__filter-item"></div>
            <div class="catalog__filter-item"></div>
        </div>
        <div class="catalog__list">
            @foreach ($books as $book)
                <a href="/book/{{ $book->id }}">
                    <div class="catalog__item">
                        <img src="{{ Vite::asset('resources/media/images/') . $book->img }}" alt="{{ $book->img }}"
                            class="catalog__item-img" width="400px">
                        <div class="catalog__item-title">{{ $book->title }}</div>
                        <div class="catalog__item-price">{{ $book->price }} ₽</div>
                    </div>
                </a>
            @endforeach
        </div>
    </section>
@endsection