<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LeaseRequest;

class LeaseRequestsController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        if(auth()->user()->isAdmin){
            $requests = LeaseRequest::all();
        } else {
            $requests = LeaseRequest::where('user_id', '=', auth()->user()->id)->get();
        }
        return view('requests.index', compact('requests'));
    }


    public function store(Request $request){
        if(implode(request(['years', 'months', 'weeks', 'days'])) === '0000'){
             return redirect('/vehicles');
        }

        LeaseRequest::create([
            'user_id' => auth()->user()->id,
            'vehicle_id' => request('vehicle_id'),
            'startdate' => request('startdate'),
            'enddate' => request('enddate'),
            'cost' => request('totalcost'),
            'duration' => json_encode(request(['years', 'months', 'weeks', 'days']))
        ]);
        return redirect('/leaserequests');
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
