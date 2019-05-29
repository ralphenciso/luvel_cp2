@extends('partials.layout')


@section('title', $vehicle->model)
@section('bodyclass', 'vhshowclass')

@section('content')
    <div class="position-fixed">
        <a class="btn btn-outline-dark d-flex align-items-center p-1" href="/vehicles"><i class="material-icons" style="font-size: 2rem" >keyboard_backspace</i></a>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-10 offset-1">
                <div class="card">
                    <div class="card-header text-center bg-dark text-light p-1 mb-0">
                        <h2 class="display-4">{{ $vehicle->make . ' ' . $vehicle->model }}</h2>
                        <p class="lead">${{number_format($vehicle->price/48)}}</p>
                    </div>
                    <p class="card-header lead itemdesc">{{$vehicle->description}}</p>
                    <div class="row no-gutters">
                        @foreach($gallery as $index => $image)
                        <div class="col-6 col-md-4 p-2"   data-target="#carouselgallery" data-slide-to="{{$index}}">
                            <img class="card-img h-100" style="object-fit: cover; object-position:center;" src="/images/gallery/{{$image}}" data-toggle="modal" data-target="#galModal">
                        </div>
                        @endforeach()
                    </div>

                    <div class="card-footer">
                       <!-- Button trigger modal / lease -->
                            <button type="button" class="btn btn-dark btn-block lead p-0 my-2" style="font-size: 1.5rem" data-toggle="modal" data-target="#vh{{$vehicle->id}}">
                                Lease
                            </button>

                            <!-- lease modal  -->
                            <div class="modal fade" id="{{'vh'.$vehicle->id}}" tabindex="-1" role="dialog" aria-hidden="true"
                                data-price="{{$vehicle->price}}">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">{{ $vehicle->make . ' ' . $vehicle->model }}</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="/leaserequests" method="POST"> @csrf
                                            <input type="text" name='vehicle_id' style="display: none" value="{{$vehicle->id}}">
                                            <div class="modal-body">
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <label for="startdate" class="input-group-text">Start Date</label>
                                                    </div>
                                                    <input type="date" class="form-control" name='startdate' id='{{$vehicle->id . 'startdate'}}'
                                                        required>
                                                </div>

                                                <div>
                                                    <table id="durationinput">
                                                        <tr>
                                                            <td>
                                                                <label for="years">Years</label>
                                                                <input type="number" id="{{$vehicle->id . 'years'}}" name="years" max='10' min='0'
                                                                    value='0'>
                                                            </td>
                                                            <td>
                                                                <label for="months">Months</label>
                                                                <input type="number" id="{{$vehicle->id . 'months'}}" name="months" max='11' min='0'
                                                                    value='0'>
                                                            </td>
                                                            <td>
                                                                <label for="weeks">Weeks</label>
                                                                <input type="number" id="{{$vehicle->id . 'weeks'}}" name="weeks" max='51' min='0'
                                                                    value='0'>
                                                            </td>
                                                            <td>
                                                                <label for="days">Days</label>
                                                                <input type="number" id="{{$vehicle->id . 'days'}}" name="days" max='31' min='0'
                                                                    value='0'>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>

                                                <div class="input-group my-3">
                                                    <div class="input-group-prepend">
                                                        <label for="enddate" class="input-group-text">End Date</label>
                                                    </div>
                                                    <input type="date" class="form-control" name='enddate' id='{{$vehicle->id . 'enddate'}}'
                                                        readonly />
                                                </div>

                                                <div class="totalcost">Total Cost $ <span></span></div>
                                                <input type="number" name="totalcost" class="d-none" value="0">

                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                <button type="submit" class="btn btn-success">Confirm Lease Request</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                        {{-- edit and delelte links for admin --}}
                        @if(auth()->user()->isAdmin)
                            <form action="/vehicles/{{$vehicle->id}}/edit" method="GET">
                                @csrf
                                <button class="btn btn-success btn-block lead p-0 my-2" style="font-size: 1.5rem">Edit</button>
                            </form>

                            <button type="button" class="btn btn-danger btn-block lead p-0 my-2" style="font-size: 1.5rem" data-toggle="modal" data-target="#delModal{{$vehicle->id}}">
                                Delete
                            </button>
                            {{-- confirmation modal --}}
                            <div class="modal" id="delModal{{$vehicle->id}}">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title">Delete Vehicle?</h4>
                                            <button type="button" class="btn btn-danger ml-auto mr-2" data-dismiss="modal">CANCEL</button>
                                            <form action="/vehicles/{{$vehicle->id}}" method="POST"> @csrf @method('DELETE')
                                                @csrf
                                                @method('DELETE')
                                                <button type='submit' class="btn btn-success">OK</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        @endif
                    </div>
                </div>
            </div>
        </div>

        {{-- gallery modal --}}

        <div class="modal fade" id="galModal" tabindex="-1" role="dialog" aria-labelledby="galLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-center" id="galLabel">Gallery</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div id="carouselgallery" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">
                                <ol class="carousel-indicators">
                                    @foreach ($gallery as $index => $image)
                                      <li data-target="#carouselgallery" data-slide-to="$index" class="{{!$index ? 'active' : ''}}""></li>
                                    @endforeach
                                </ol>
                                @foreach ($gallery as $index => $image)
                                    <div class="carousel-item {{!$index ? 'active' : ''}}" data-interval="10000">
                                        <img src="/images/gallery/{{$image}}" class="d-block w-100">
                                    </div>
                                @endforeach
                            </div>
                            <a class="carousel-control-prev" href="#carouselgallery" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselgallery" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>







@endsection


@section('scripts')
    <script src='/js/lease.js'></script>

    <script>
        // function setActiveimg(event){
        //     console.log(event.target.dataset.slide)
        //     $('#galModal').modal('show')
        //     $('#carouselgallery').carousel(`${event.target.dataset.slide}`)
        // }
    </script>
@endsection
