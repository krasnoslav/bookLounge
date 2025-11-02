@extends('layouts.app')
@section('content')
    <div class="book-edit">
        <form action="/book-update/{{ $book->id }}" method="POST">
            @method('patch')
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Название</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ $book->title }}">
            </div>
            <div class="mb-3">
                <label for="author" class="form-label">Автор</label>
                <input type="text" class="form-control" id="author" name="author" value="{{ $book->author }}">
            </div>
            <div class="mb-3">
                <label for="descr" class="form-label">Описание</label>
                <textarea class="form-control" name="descr" id="descr">{{ $book->descr }}</textarea>
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Цена</label>
                <input type="number" class="form-control" id="price" name="price" value="{{ $book->price }}">
            </div>
            <div class="mb-3">
                <label for="bookGenre" class="form-label">Жанр</label>
                <select name="bookGenre" id="bookGenre">
                    @foreach ($bookGenres as $bookGenre)
                        <option value="{{ $bookGenre->id }}" @selected($bookGenre->bookGenre == $book->bookGenre)>{{ $bookGenre->bookGenre }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="bookCover" class="form-label">Обложка</label>
                <select name="bookCover" id="bookCover">
                    @foreach ($bookCovers as $bookCover)
                        <option value="{{ $bookCover->id }}" @selected($bookCover->bookCover == $book->bookCover)>{{ $bookCover->bookCover }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="pagesCount" class="form-label">Количество страниц</label>
                <input type="number" class="form-control" id="pagesCount" name="pagesCount" value="{{ $book->pagesCount }}">
            </div>
            <div class="mb-3">
                <label for="weight" class="form-label">Вес, г</label>
                <input type="number" class="form-control" id="weight" name="weight" value="{{ $book->weight }}">
            </div>
            <div class="mb-3">
                <label for="publisher" class="form-label">Издатель</label>
                <input type="text" class="form-control" id="publisher" name="publisher" value="{{ $book->publisher }}">
            </div>
            <div class="mb-3">
                <label for="series" class="form-label">Серия</label>
                <input type="text" class="form-control" id="series" name="series" value="{{ $book->series }}">
            </div>
            <div class="mb-3">
                <label for="ageLimit" class="form-label">Возрастные ограничения</label>
                <input type="text" class="form-control" id="ageLimit" name="ageLimit" value="{{ $book->ageLimit }}">
            </div>
            <div class="mb-3">
                <label for="ISBN" class="form-label">ISBN</label>
                <input type="text" class="form-control" id="ISBN" name="ISBN" value="{{ $book->ISBN }}">
            </div>
            <div class="mb-3">
                <label for="qty" class="form-label">Количество</label>
                <input type="text" class="form-control" id="qty" name="qty" value="{{ $book->qty }}">
            </div>
            <input type="submit" value="Подтвердить">
        </form>
    </div>
@endsection