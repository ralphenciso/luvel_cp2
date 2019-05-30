@extends('partials.layout')
@section('title', 'requests')

@section('nav')
    @component('partials.nav')
        @slot('navclass', 'requestsnav')
    @endcomponent
@endsection


@section('bodyclass', 'requestsbody')

@section('content')
<div class="container mt-3">
    <div class="row">
        <div class='col-3 col-md-2 p-2'>
            <div class='reqfilter'>
                <div class="card p-2">
                    <div data-toggle="buttons" id="reqfilter">
                        <label class="btn btn-outline-light btn-block active" data-filter="all">
                            <input type="radio" name="reqfilter" id="requestsall" class="d-none">All
                        </label>
                        <label class="btn btn-outline-light btn-block" data-filter="for approval">
                            <input type="radio" name="reqfilter" class="d-none">For Approval
                        </label>
                        <label class="btn btn-outline-light btn-block" data-filter="approved">
                            <input type="radio" name="reqfilter" class="d-none">Approved
                        </label>
                    </div>

                    <a class="btn btn-dark btn-block" href="/vehicles">
                        New Request
                    </a>

                </div>

                @if (isset($users) && auth()->user()->isAdmin)
                    <div class="card p-2 my-3" id='userfilter' data-toggle="buttons">
                        <p class="text-center">Users</p>
                        <label class="btn btn-outline-light btn-block active" data-filter="all">
                            <input type="radio" name="userfilter" id="userall" class="d-none">All
                        </label>

                        @foreach ($users as $user)
                            <label class="btn btn-outline-light btn-block" data-filter="{{$user->id}}" for="user{{$user->id}}">
                                <input type="radio" name="userfilter" id="user{{$user->id}}" class="d-none">{{$user->username}}
                            </label>
                        @endforeach
                    </div>
                @endif

            </div>
        </div>

        {{-- <div class="col-3 col-md-2"></div> --}}

        <div class="col-9 col-md-10">
            <ul class="row requestlist">
                @foreach ($requests as $request)
            <li class="card col-12 my-1 p-2" data-status="{{$request->status}}" data-userid="{{$request->user_id}}">
                    <div class="row no-gutters h-100">
                        <div class="col-4 p-1 d-flex flex-column justify-content-between">
                            <img src="{{$request->vehicle->thumbnail}}" class="card-img">
                        </div>
                        <div class="col-8 p-1 pl-4">
                            <div class="row no-gutters align-items-center">
                                <h3>{{$request->vehicle->make . ' ' . $request->vehicle->model }}</h3>
                                <h4 class="ml-auto text-left text-warning">$ {{number_format($request->cost)}}</h4>
                            </div>
                            <div class="input-group mb-3 w-auto">
                                <div class="input-group-prepend">
                                    <label class="input-group-text">Start Date</label>
                                </div>
                                <input type="date" class="form-control pr-0" name='startdate' required readonly value="{{$request->startdate}}">
                                <div class="input-group-prepend">
                                    <label class="input-group-text">End Date</label>
                                </div>
                                <input type="date" class="form-control pr-0" name='enddate' required readonly value="{{$request->enddate}}">
                            </div>

                            <div class="input-group mb-3 w-auto">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="years">Years</label>
                                </div>
                                <input class="form-control" type="number" name="years" max='10' min='0' value='{{json_decode($request->duration)->years}}' readonly>

                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="months">Months</label>
                                </div>
                                    <input class="form-control" type="number" name="months" max='11' min='0' value='{{json_decode($request->duration)->months}}' readonly>

                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="weeks">Weeks</label>
                                </div>
                                    <input class="form-control" type="number" name="weeks" max='51' min='0' value='{{json_decode($request->duration)->weeks}}' readonly>

                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="days">Days</label>
                                </div>
                                    <input class="form-control" type="number" name="days" max='31' min='0' value='{{json_decode($request->duration)->days}}' readonly>
                            </div>

                            <div class="d-flex justify-content-between align-items-center">


                                @if($request->status !== 'approved')
                                    <button class="btn btn-dark m-1" data-toggle="modal" data-target="#req{{$request->id}}">Edit</button>
                                    <button class="btn btn-dark m-1" data-toggle="modal" data-target="#delModal{{$request->id}}">Delete</button>
                                @endif

                                {{-- confirmation modals --}}
                                <div class="modal" id="delModal{{$request->id}}">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Delete Request?</h4>
                                                <button type="button" class="btn btn-danger ml-auto mr-2" data-dismiss="modal">CANCEL</button>
                                                <form action="/leaserequests/{{$request->id}}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type='submit' class="btn btn-success">OK</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- lease modal  -->
                                <div class="modal fade" id="{{'req'.$request->id}}" tabindex="-1" role="dialog" aria-hidden="true"
                                    data-price="{{$request->vehicle->price}}">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">{{ $request->vehicle->make . ' ' . $request->vehicle->model }}</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form action="/leaserequests/{{$request->id}}" method="POST"> @csrf  @method('PATCH')
                                                <input type="text" name='vehicle_id' style="display: none" value="{{$request->vehicle->id}}">
                                                <div class="modal-body">
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <label for="startdate" class="input-group-text" >Start Date</label>
                                                        </div>
                                                        <input type="date" class="form-control" name='startdate' id='{{$request->vehicle->id . 'startdate'}}' value={{$request->startdate}} required>
                                                    </div>

                                                    <div>
                                                        <table id="durationinput">
                                                            <tr>
                                                                <td>
                                                                    <label for="years">Years</label>
                                                                    <input type="number" id="{{$request->vehicle->id . 'years'}}" name="years" max='10' min='0'
                                                                        value='{{json_decode($request->duration)->years}}'>
                                                                </td>
                                                                <td>
                                                                    <label for="months">Months</label>
                                                                    <input type="number" id="{{$request->vehicle->id . 'months'}}" name="months" max='11' min='0'
                                                                        value='{{json_decode($request->duration)->months}}'>
                                                                </td>
                                                                <td>
                                                                    <label for="weeks">Weeks</label>
                                                                    <input type="number" id="{{$request->vehicle->id . 'weeks'}}" name="weeks" max='51' min='0'
                                                                        value='{{json_decode($request->duration)->weeks}}'>
                                                                </td>
                                                                <td>
                                                                    <label for="days">Days</label>
                                                                    <input type="number" id="{{$request->vehicle->id . 'days'}}" name="days" max='31' min='0'
                                                                        value='{{json_decode($request->duration)->days}}'>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </div>

                                                    <div class="input-group my-3">
                                                        <div class="input-group-prepend">
                                                            <label for="enddate" class="input-group-text">End Date</label>
                                                        </div>
                                                        <input type="date" class="form-control" name='enddate' id='{{$request->vehicle->id . 'enddate'}}' value={{$request->enddate}} readonly />
                                                    </div>

                                                    <div class="totalcost">Total Cost $ <span>{{number_format($request->cost)}}</span></div>
                                                    <input type="number" name="totalcost" class="d-none" value="{{$request->cost}}">

                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                    <button type="submit" class="btn btn-success">Confirm Lease Request</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>


                                @if (auth()->user()->isAdmin && $request->status !== 'approved')
                                    <form action="/leaserequests/{{$request->id}}/approve" method="POST"> @csrf @method('PATCH')
                                        <button class="btn btn-success m-1">Approve</button>
                                    </form>
                                @endif

                                <button class="btn ml-auto {{($request->status === 'approved' ? 'btn-outline-success' : 'btn-outline-light')}}">Status: {{ucwords($request->status)}}</button>
                            </div>


                        </div>

                    </div>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>

@endsection


@section('scripts')
    <script src='/js/reqfilter.js'></script>
    <script src='/js/leasereq.js'></script>
@endsection
