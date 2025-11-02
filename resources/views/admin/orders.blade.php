@extends('layouts.app')
@section('content')
    <div class="order__filter">
        <a href="?filter=new">Новые</a>
        <a href="?filter=confirmed">Подтвержденные</a>
        <a href="?filter=canceled">Отмененные</a>
        <a href="/orders">Показать все</a>
    </div>
    <table class="order__table table container">
        <thead>
            <tr>
                <th>Фамилия и имя заказчика</th>
                <th>Товары в заказе</th>
                <th>Дата создания</th>
                <th>Сумма заказа</th>
                <th>Статус</th>
                <th>Действия</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $order)
                <tr class="order__raw">
                    <td>{{ $order->name }}</td>
                    <td>
                        <div class="order__books">
                            @foreach ($order->books as $book)
                                <div class="order__book">
                                    {{ $book->title }}, {{ $book->qty }}шт: {{ $book->price * $book->qty }} ₽
                                </div>
                            @endforeach
                            Всего в корзине: {{ $order->totalQty }} товара
                        </div>
                    </td>
                    <td>{{ $order->date }}</td>
                    <td>{{ $order->totalPrice }}</td>
                    <td>{{ $order->status }}</td>
                    <td class="">
                        <form action="/order-status/confirm/{{ $order->number }}" method="POST">
                            @method('patch')
                            @csrf
                            <input type="submit" class="btn btn-success" value="Подтвердить">
                        </form>
                        <form action="/order-status/cancel/{{ $order->number }}" method="POST">
                            @method('patch')
                            @csrf
                            <input type="submit" class="btn btn-danger" value="Отменить">
                        </form>
                    </td>
                </tr>                
            @endforeach
        </tbody>
    </table>
@endsection