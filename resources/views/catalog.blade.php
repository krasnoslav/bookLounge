@extends('layouts.app')
@section('content')
    <section class="catalog">
        <div class="catalog__sort">
            <a href="{{ $params->has('filter') ? '?filter=' . $params['filter'] . '&' : '?' }}sort_by{{ $params->has('sort_by') == 'author' ? '_desc' : '' }}=author" 
                class="catalog__sort-item">Автор</a>
            <a href="{{ $params->has('filter') ? '?filter=' . $params['filter'] . '&' : '?' }}sort_by{{ $params->has('sort_by') == 'title' ? '_desc' : '' }}=title" 
                class="catalog__sort-item">Название</a>
            <a href="{{ $params->has('filter') ? '?filter=' . $params['filter'] . '&' : '?' }}sort_by{{ $params->has('sort_by') == 'publisher' ? '_desc' : '' }}=publisher" 
                class="catalog__sort-item">Издатель</a>
            <a href="{{ $params->has('filter') ? '?filter=' . $params['filter'] . '&' : '?' }}sort_by{{ $params->has('sort_by') == 'pagesCount' ? '_desc' : '' }}=pagesCount" 
                class="catalog__sort-item">Количество страниц</a>
            <a href="{{ $params->has('filter') ? '?filter=' . $params['filter'] . '&' : '?' }}sort_by{{ $params->has('sort_by') == 'price' ? '_desc' : '' }}=price" 
                class="catalog__sort-item">Цена</a>
        </div>
        <div class="catalog__filter">
            @foreach ($genres as $genre)
                <a href="{{ $params->has('sort_by') ? '?sort_by=' . $params['sort_by'] . '&' : ($params->has('sort_by_desc') ? '?sort_by_desc=' . $params['sort_by_desc'] . '&' : '?') }}filter={{ $genre->id }}" class="catalog__filter-item">{{ $genre->bookGenre }}</a>
            @endforeach
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