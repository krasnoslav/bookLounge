@extends('layouts.app')
@section('content')
    <div class="book">
        <img src="{{ Vite::asset('resources/media/images/') . $book->img }}" alt="{{ $book->title }}" class="book__image">
        <div class="book__main-info">
            <div class="book__title">{{ $book->title }}</div>
            <div class="book__price">{{ $book->price }} ₽</div>
            @auth
                <div class="d-flex">
                    <button class="book__add-to-cart btn btn-primary p-2 m-1">Добавить в корзину</button>

                    <div class="toast error align-items-center text-bg-danger border-0" role="alert" aria-live="assertive"
                        aria-atomic="true">
                        <div class="d-flex">
                            <div class="toast-body">
                                В наличии столько нет
                            </div>
                            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"
                                aria-label="Close"></button>
                        </div>
                    </div>
                    <div class="toast success align-items-center text-bg-success border-0" role="alert" aria-live="assertive"
                        aria-atomic="true">
                        <div class="d-flex">
                            <div class="toast-body">
                                Товар добавлен в корзину
                            </div>
                            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"
                                aria-label="Close"></button>
                        </div>
                    </div>
                </div>
            @endauth

        </div>
        <div class="book__characteristic">
            <table>
                <tr>
                    <td>Жанр</td>
                    <td>{{ $book->bookGenre }}</td>
                </tr>
                <tr>
                    <td>Тип обложки</td>
                    <td>{{ $book->bookCover }}</td>
                </tr>
                <tr>
                    <td>Количество страниц</td>
                    <td>{{ $book->pagesCount }}</td>
                </tr>
                <tr>
                    <td>Вес, г</td>
                    <td>{{ $book->weight }}</td>
                </tr>
                <tr>
                    <td>Издательство</td>
                    <td>{{ $book->publisher }}</td>
                </tr>
                <tr>
                    <td>Серия</td>
                    <td>{{ $book->series }}</td>
                </tr>
                <tr>
                    <td>Возрастные ограничения</td>
                    <td>{{ $book->ageLimit }}</td>
                </tr>
                <tr>
                    <td>Количество на складе</td>
                    <td>{{ $book->qty }}</td>
                </tr>
                <tr>
                    <td>ISBN</td>
                    <td>{{ $book->ISBN }}</td>
                </tr>
            </table>
        </div>
    </div>
    <script>
        const bid = {{ $book->id }}
        const button = document.querySelector('.book__add-to-cart')
        button.addEventListener('click', () => {
            let status = 0
            fetch(`/add-to-cart/${bid}`)
                .then(response => status = response.status)
                .then(() => {
                    if (status > 300) {
                        const errorToast = new bootstrap.Toast(document.querySelector('.toast.error'))
                        errorToast.show()
                    } else {
                        const successToast = new bootstrap.Toast(document.querySelector('.toast.success'))
                        successToast.show()
                    }
                })
        })
    </script>
@endsection