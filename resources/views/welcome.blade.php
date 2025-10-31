<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Books</title>
</head>
<body>
    @extends('layouts.app')
    @section('content')
        <div id="booksCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="../../media/images/" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="../../media/images/" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="../../media/images/" class="d-block w-100" alt="...">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
        <section class="about">
            <h3 class="about__title">
                Мир цветов - огромный выбор цветов и подарков на каждый день
            </h3>
            <p class="about__text-block">
                В нашем интернет-магазине можно круглосуточно заказать доставку дизайнерских букетов из живых цветов в
                Ульяновске, по любому адресу - на дом или в офис получателю.
            </p>
            <p class="about__text-block">
                В регулярно обновляемом каталоге компании представлено более 100 цветочных композиций. Компания "Мир цветов" 
                полностью гарантирует безупречное качество доставляемых букетов:наличие только свежих цветов в составе, полное соответствие изображению в каталоге, 
                высокое мастерство исполнения.
            </p>
        </section>
    @endsection
</body>
</html>