<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LeaseRequest;
use App\User;
use App\Vehicle;

class LeaseRequestsController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        if(auth()->user()->isAdmin){
            $requests = LeaseRequest::all();
            $users = User::all();
            return view('requests.index', compact('requests'))->with(compact('users'));
        } else {
            $requests = LeaseRequest::where('user_id', '=', auth()->user()->id)->get();
            return view('requests.index', compact('requests'));
        }
    }


    public function store(Request $request){

        if(implode(request(['years', 'months', 'weeks', 'days'])) === '0000'){
             return redirect('/vehicles')->with('durationerror', "Can't process request of duration of 0 days");
        }

        $request->validate([
            'vehicle_id' => 'required',
            'startdate' => 'required',
            'enddate' => 'required',
        ]);

        // TODO:: check total cost
        $price = Vehicle::findOrFail(request('vehicle_id'))->price;

        $totalcost = round(
                        $price/3.8 * request('years') +
                        $price/48 * request('months') +
                        $price/200 * request('weeks') +
                        $price/1360 * request('days')
                    );


        if($totalcost != request('totalcost')){
            return redirect('/vehicles')->with('costerror', "Trying to be sneaky?");
        }

        // TODO:: check end date


        LeaseRequest::create([
            'user_iD' => auth()->user()->id,
            'vehicle_id' => request('vehicle_id'),
            'startdate' => request('startdate'),
            'enddate' => request('enddate'),
            'cost' => request('totalcost'),
            'duration' => json_encode(request(['years', 'months', 'weeks', 'days']))
        ]);



        return redirect('/vehicles');
    }

     public function update(LeaseRequest $leaserequest){

     $leaserequest->update([
          'user_id' => auth()->user()->id,
          'vehicle_id' => request('vehicle_id'),
          'startdate' => request('startdate'),
          'enddate' => request('enddate'),
          'cost' => request('totalcost'),
          'duration' => json_encode(request(['years', 'months', 'weeks', 'days']))
     ]);

        return redirect('/leaserequests');
     }

     public function approve(LeaseRequest $leaserequest){
        abort_unless(auth()->user()->isAdmin, 404);

        $leaserequest->update([
            'status' => 'approved'
        ]);

        return redirect('/leaserequests');
     }

    public function destroy(LeaseRequest $leaserequest){

        $leaserequest->delete();

        return redirect('/leaserequests');
    }


}
