@extends('layouts.app')
@section('content')
    <table class="cart__table container">
        <thead>
            <tr>
                <th>ID</th>
                <th>Название</th>
                <th>Действия</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($bookGenres as $bookGenre)
                <tr class="cart__raw">
                    <td>{{ $bookGenre->id }}</td>
                    <td>{{ $bookGenre->bookGenre }}</td>

                    <td class="">
                        <a href="/genre-edit/{{ $bookGenre->id }}" class="btn btn-primary">Редактировать</a>
                        <form action="/genre-delete/{{ $bookGenre->id }}" method="POST">
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