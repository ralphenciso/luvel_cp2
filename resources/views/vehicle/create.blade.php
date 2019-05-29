@extends('partials.layout')


@section('title', 'new vehicle')
@section('css')
    <link rel="stylesheet" href="/css/create.css">
@endsection

@section('content')

<div class="position-fixed">
    <a class="btn btn-light d-flex align-items-center p-1" href="/vehicles"><i class="material-icons"
            style="font-size: 2rem">keyboard_backspace</i></a>
</div>

<div class="container">
    <div class="row">
        <div class="col-10 offset-1">
                <h2 class="card text-center bg-dark text-light">Add New Vehicle</h2>

                 <form action="/vehicles" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <label class="input-group-text" for="make">Make</label>
                        </div>
                        <input id="make" name="make" type="text" class="form-control">
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <label class="input-group-text" for="model">Model</label>
                        </div>
                        <input id="model" name="model" type="text" class="form-control">
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <label class="input-group-text" for="type">Type</label>
                        </div>
                        <input id="type" name="type" type="text" class="form-control">
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <label class="input-group-text" for="price" min="0">Price</label>
                        </div>
                        <input id="price" name="price" type="number" class="form-control">
                        <div class="input-group-append">
                            <span class="input-group-text">$</span>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <label class="input-group-text" for="mode">Mode</label>
                        </div>
                        <input id="mode" name="mode" type="text" class="form-control">
                    </div>

                    <div class="input-group mb-3 textarea">
                        <div class="input-group-prepend">
                            <label for="description"  class="input-group-text">Description</label>
                        </div>
                        <textarea name="description" name="description" class="form-control" aria-label="With textarea"></textarea>
                    </div>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <label class="input-group-text" for="thumbnail">Thumbnail</label>
                        </div>
                        <input id="thumbnail" name="thumbnail" type="file" class="form-control p-1">
                    </div>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <label class="input-group-text" for="gallery">Gallery</label>
                        </div>
                        <input id="gallery" name="imgs[]" type="file" multiple="multiple" class="form-control p-1">
                    </div>
                    <div class="dropzone mb-3" id="dropzone">Drop files here</div>




                    <button class="btn btn-lg btn btn-dark btn-block" >Submit</button>
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
