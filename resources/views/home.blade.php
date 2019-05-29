@extends('partials.layout')

@section('bodyclass', 'homebody')

@section('css')
    <link rel="stylesheet" href="css/home.css">
@endsection

@section('nav')
    @component('partials.nav')
        @slot('navclass', 'homenav')
    @endcomponent
@endsection


@section('content')

<div class="container">
    {{-- <div class="row justify-content-center mt-3">
        <div class="col-md-12">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Search" style="height:auto">
                <div class="input-group-append">
                    <button class="input-group-text" id="basic-addon2"><i class="material-icons">search</i></button>
                </div>
            </div>
        </div>
    </div> --}}

    <div class="row justify-content-center mt-3">
       <div class="col-md-12">
           <div class="mx-auto d-flex justify-content-center" id='iframecont'>
            {{-- 560 X 315 --}}
            <iframe width="711" height="400"  src="https://www.youtube.com/embed/pS9qkNF0BXQ" frameborder="0"
                allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen id="playing"></iframe>
            </div>

       </div>
    </div>

    <div class="row justify-content-start mt-3">

        <div class="col-4 mt-3" data-url="https://www.youtube.com/embed/wDdiyRP2SDg">
            <div class="card">
                <img src="/images/vehicles/givsp.jpg">
                <div class='iconcontainer'>
                    <i class="material-icons">play_circle_outline</i>
                </div>
            </div>
        </div>
        <div class="col-4 mt-3" data-url="https://www.youtube.com/embed/pS9qkNF0BXQ">
            <div class="card">
                <img src="/images/vehicles/oceancobarbara.jpg">
                <div class='iconcontainer'>
                    <i class="material-icons">play_circle_outline</i>
                </div>
            </div>
        </div>
        <div class="col-4 mt-3" data-url="https://www.youtube.com/embed/-P8EGzPAoJQ">
            <div class="card">
                <img src="/images/vehicles/mclarenp1.jpg">
                <div class='iconcontainer'>
                    <i class="material-icons">play_circle_outline</i>
                </div>
            </div>
        </div>
        <div class="col-4 mt-3" data-url="https://www.youtube.com/embed/JELjyEk36Cs">
                <div class="card">
                    <img src="/images/vehicles/lineage1000e.png">
                    <div class='iconcontainer'>
                        <i class="material-icons">play_circle_outline</i>
                    </div>
                </div>
        </div>
        <div class="col-4 mt-3" data-url="https://www.youtube.com/embed/qS4Nn282A4M">
            <div class="card">
                <img src="/images/vehicles/benetti140.jpg">
                <div class='iconcontainer'>
                    <i class="material-icons">play_circle_outline</i>
                </div>
            </div>
        </div>
        <div class="col-4 mt-3" data-url="https://www.youtube.com/embed/szyUN5GlQ7c">
            <div class="card">
                <img src="/images/vehicles/porsche918.jpg">
                <div class='iconcontainer'>
                    <i class="material-icons">play_circle_outline</i>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection


@section('scripts')
    <script src='js/home.js'></script>
@endsection
