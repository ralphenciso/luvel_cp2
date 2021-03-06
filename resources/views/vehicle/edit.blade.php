@extends('partials.layout')


@section('title', 'edit vehicle')
@section('css')
    <link rel="stylesheet" href="/css/create.css">
@endsection

@section('content')

<div class="position-fixed">
    <a class="btn btn-light d-flex align-items-center p-1" href="/vehicles/{{$vehicle->id}}"><i class="material-icons"
            style="font-size: 2rem">keyboard_backspace</i></a>
</div>
<div class="position-fixed errors">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="list-unstyled mb-0 m-1">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>

<div class="container">
    <div class="row">
        <div class="col-10 offset-1">
            <h2 class="card text-center bg-dark text-light">{{$vehicle->make . " " . $vehicle->model}}</h2>

            <form action="/vehicles/{{$vehicle->id}}" method="POST" enctype="multipart/form-data" id="newvehicleform">
                @csrf
                @method('PATCH')

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="make" >Make</label>
                    </div>
                    <input id="make" name="make" type="text" class="form-control" value="{{$vehicle->make}}" required>
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="model">Model</label>
                    </div>
                    <input id="model" name="model" type="text" class="form-control" value="{{$vehicle->model}}" required >
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="type">Type</label>
                    </div>
                    <input id="type" name="type" type="text" class="form-control" value="{{ucfirst($vehicle->type)}}" required >


                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="price" >Price</label>
                    </div>
                    <input id="price" name="price" type="number" class="form-control" value="{{$vehicle->price}}" required min="0">
                    <div class="input-group-append">
                        <span class="input-group-text">$</span>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="mode">Mode</label>
                    </div>
                    <select id="mode" name="mode" class="form-control" required form="newvehicleform" ">
                        <option value="air" {{$vehicle->mode === 'air' ? 'selected="selected"' : ''}} >Air</option>
                        <option value="land" {{$vehicle->mode === 'land' ? 'selected="selected"' : ''}} >Land</option>
                        <option value="sea" {{$vehicle->mode === 'sea' ? 'selected="selected"' : ''}} >Sea</option>
                    </select>
                </div>

                <div class="input-group mb-3 textarea">
                    <div class="input-group-prepend">
                        <label for="description" class="input-group-text">Description</label>
                    </div>
                    <textarea name="description" name="description" class="form-control"
                        aria-label="With textarea" required>{{$vehicle->description}}</textarea>
                </div>

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="thumbnail">Thumbnail</label>
                    </div>
                    <input id="thumbnail" name="thumbnail" type="file" class="form-control p-1">
                </div>



                <div class="input-group-append mx-auto p-2 card w-50 mb-3">
                    <h5 class="card-title text-center">Current Thumbnail</h5>
                    <img class="card-img" src="{{$vehicle->thumbnail}}">
                </div>


                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="gallery">Gallery</label>
                    </div>
                    <input id="gallery" name="imgs[]" type="file" multiple='multiple' class="form-control p-1">
                </div>

                <div class="dropzone mb-3" id="dropzone">Drop files here</div>

                <div>
                    <h3 class="text-center text-light bg-dark">Delete existing</h3 class="text-center text-light bg-dark">
                </div>
                <div class="row no-gutters card flex-row mb-3">

                        @foreach($gallery as $index => $image)
                        <div class="col-6 col-md-4 p-2">
                            <input type="checkbox" name="{{$image}}" id="img{{$index}}" class="d-none galcbox">
                            <label for="img{{$index}}" class="d-block h-100 position-relative">
                                <div class="overlay"></div>
                                <img class="card-img h-100" style="object-fit: cover; object-position:center;" src="/images/gallery/{{$image}}">
                                <span class="xicon"><i class="material-icons">cancel</i></span>
                            </label>
                        </div>
                        @endforeach()
                </div>




                <button class="btn btn-lg btn btn-dark btn-block">Submit</button>
            </form>

        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    let drop = document.querySelector('#dropzone');
        let fileinput = document.querySelector('#gallery');

        drop.addEventListener("drop", function(e){
            this.classList.remove('dragover');
            e.preventDefault();
            fileinput.files = e.dataTransfer.files;
        })

        drop.addEventListener('dragover', function(e){
            this.classList.add('dragover');
            e.preventDefault();
            e.stopPropagation();

        })

        drop.addEventListener('dragleave', function(){
            this.classList.remove('dragover');
        })


</script>
@endsection
