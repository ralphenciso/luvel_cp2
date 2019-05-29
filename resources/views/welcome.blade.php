@extends('partials.layout')
@section('bodyclass', 'welcomebody')

@section('content')
<div class="welcome">
    <nav class="navbar navbar-expand-sm navbar-dark navwelcome fixed-top">
        <a class="navbar-brand logotext" href="/">Luvel</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#welcomeNav"
            aria-controls="welcomeNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="welcomeNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link logreg" href="/login">Login<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link logreg" href="/register">Register</a>
                </li>

            </ul>
        </div>
    </nav>

    <div class="carouselwrapper">
        <div id="carouselWelcome" class="carousel slide carousel-fade" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="/images/welcome1.jpg" class="d-block w-100">
                    <h4 class='welcomecaption'>Splendid Travels</h4>

                </div>
                <div class="carousel-item">
                    <img src="/images/welcome2.jpg" class="d-block w-100">
                    <h4 class='welcomecaption'>Experience Elegance</h4>

                </div>
                <div class="carousel-item">
                    <img src="/images/welcome3.jpg" class="d-block w-100">
                    <h4 class='welcomecaption'>Transportation at its finest</h4>

                </div>
            </div>

        </div>
    </div>

</div>

@endsection
