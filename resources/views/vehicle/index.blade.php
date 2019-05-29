@extends('partials.layout')

@section('title', 'vehicles')

@section('nav')
    @component('partials.nav')
        @slot('navclass', 'servicesnav')
    @endcomponent
@endsection

@section('bodyclass', 'servicesbody')

@section('content')
<div class="container mt-3">




        <div class="row">
            <div class='filters position-fixed p-2'>
                <div class="card mb-3 p-2">
                    <div class="" data-toggle="buttons" id="modefilter">
                        <label class="btn btn-outline-light btn-block active">
                            <input type="radio" name="modefilter" id="modeall" class="d-none">All
                        </label>
                        <label class="btn btn-outline-light btn-block">
                            <input type="radio" name="modefilter" id="air" class="d-none" >Air
                        </label>
                        <label class="btn btn-outline-light btn-block">
                            <input type="radio" name="modefilter" id="land" class="d-none"> Land
                        </label>
                        <label class="btn btn-outline-light btn-block">
                            <input type="radio" name="modefilter" id="sea" class="d-none"> Sea
                        </label>
                    </div>

                </div>
                <div class="card my-3 p-2">
                    <div class="" data-toggle="buttons" id="typefilter">
                        <label class="btn btn-outline-light btn-block active">
                            <input type="radio" name="typefilter" id="typeall" class="d-none">All
                        </label>
                        <label class="btn btn-outline-light btn-block">
                            <input type="radio" name="typefilter" id="car" class="d-none">Cars
                        </label>
                        <label class="btn btn-outline-light btn-block">
                            <input type="radio" name="typefilter" id="jet" class="d-none"> Jets
                        </label>
                        <label class="btn btn-outline-light btn-block">
                            <input type="radio" name="typefilter" id="yacht" class="d-none"> Yacths
                        </label>
                    </div>
                </div>
                <div class="card my-3 p-1 flex-row justify-content-around">
                    <span class="d-flex align-items-center">Price</span>
                    <span class='btn btn-outline-light p-1 d-flex align-items-center' id="sortdesc"><i class="material-icons">arrow_downward</i></span>
                    <span class="btn btn-outline-light p-1 d-flex align-items-center" id="sortasc"><i class="material-icons">arrow_upward</i></span>
                </div>
            </div>
            <div class="col-3 col-md-2"></div>

            <div class="col-9 col-md-10">

                @if (auth()->user() && auth()->user()->isAdmin)
                    <form id="newvehicle-form" action="/vehicles/create" method="GET" class="row p-2">
                        <button class="btn btn-lg btn-dark text-light btn-block" href="/vehicles/create" onclick="event.preventDefault(); document.getElementById('newvehicle-form').submit();">
                            Add Vehicle
                        </button>
                    </form>
                @endif


                <ul class="row list-unstyled itemslist">
                    @foreach ($vehicles as $vehicle)
                       <li class="col-6 col-md-4 p-2" data-mode="{{$vehicle->mode}}" data-type="{{$vehicle->type}}" data-price="{{$vehicle->price}}">
                            <div class='card h-100 p-3'>
                                <h2 class='card-title'>{{ $vehicle->make}}</h2>
                                <h2 class='card-title'>{{ $vehicle->model }}</h2>

                                <p class="text-dark font-weight-bold">Monthly Lease:  {{'$ ' . number_format($vehicle->price / 48)}}</p>

                                <img class="card-img" src="{{$vehicle->thumbnail}}" alt="{{$vehicle->type}}">


                                <form action="/vehicles/{{$vehicle->id}}" method="GET" class="mt-2">
                                    @csrf
                                    <button class="btn btn-outline-dark btn-block btndetails">Details</button>
                                </form>

                                <!-- Button trigger modal / lease -->
                                <button type="button" class="btn btn-dark my-2" data-toggle="modal" data-target="#vh{{$vehicle->id}}">
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

                                @if(auth()->user()->isAdmin)
                                    <form action="/vehicles/{{$vehicle->id}}/edit" method="GET"> @csrf
                                        <button type="submit" class="btn btn-success mb-2 btn-block">
                                            Edit
                                        </button>
                                    </form>

                                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delModal{{$vehicle->id}}">
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
                        </li>


                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src='/js/filter.js'></script>
    <script src='/js/lease.js'></script>
@endsection
