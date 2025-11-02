@extends('layouts.app')
@section('content')
    <table class="cart__table container">
        <thead>
            <tr>
                <th>Изображение</th>
                <th>Название</th>
                <th>Автор</th>
                <th>Жанр</th>
                <th>Цена</th>
                <th>Количество</th>
                <th>Действия</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($books as $book)
                <tr class="cart__raw">
                    <td><img src="{{ Vite::asset('resources/media/images/') . $book->img }}" alt="" srcset=""
                        width="100px"></td>
                    <td>{{ $book->title }}</td>
                    <td>{{ $book->author }}</td>
                    <td>{{ $book->bookGenre }}</td>
                    <td>{{ $book->price }}</td>
                    <td>{{ $book->qty }}</td>
                    <td class="">
                        <a href="/book-edit/{{ $book->id }}" class="btn btn-primary">Редактировать</a>
                        <form action="/book-delete/{{ $book->id }}" method="POST">
                            @method('delete')
                            @csrf
                            <input type="submit" class="btn btn-danger" value="Удалить">
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection