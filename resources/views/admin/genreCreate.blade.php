@extends('layouts.app')
@section('content')
    <div class="genre-create">
        <form action="/genre-create/" method="POST">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Название</label>
                <input type="text" class="form-control" id="title" name="title">
            </div>
            <input type="submit" value="Подтвердить">
        </form>
    </div>
@endsection