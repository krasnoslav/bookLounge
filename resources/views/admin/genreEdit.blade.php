@extends('layouts.app')
@section('content')
    <div class="genre-edit">
        <form action="/genre-update/{{ $bookGenre->id }}" method="POST">
            @method('patch')
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Название</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ $bookGenre->bookGenre }}">
            </div>
            <input type="submit" value="Подтвердить">
        </form>
    </div>
@endsection