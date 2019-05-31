<?php

namespace App\Http\Controllers;

use App\Vehicle;
use Illuminate\Http\Request;
use File;
use Illuminate\Support\Facades\Storage;

class VehiclesController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {







        $vehicles = Vehicle::all();
        $modes = array();
        $types = array();

        foreach($vehicles  as $vehicle){
            array_push($modes, $vehicle->mode);
            array_push($types, $vehicle->type);
        }
        $modes = array_unique($modes);
        $types = array_unique($types);


        return view('vehicle.index', compact('vehicles'))->with('modes',$modes)->with('types',$types);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_unless(auth()->user()->isAdmin, 404);
        $types = Vehicle::select('type')->distinct()->get();

        return view('vehicle.create', compact('types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {




        $new =  $request->validate([
            'make' => 'required',
            'model' => 'required',
            'type' => 'required',
            'mode' => 'required',
            'price' => 'required',
            'description',
        ]);


        $new['mode'] = strtolower($new['mode']);
        $new['type'] = strtolower($new['type']);

       if(request()->hasfile('thumbnail')){
            $file = request()->file('thumbnail');
            $fname = request()->file('thumbnail')->getClientOriginalName();
            $thumbnail = '/images/vehicles/' . $fname;
            $file->move('images/vehicles', $fname);
            $new['thumbnail'] = $thumbnail;
       }

       if(request()->hasfile('imgs')){
           $nfolder = request('model');
           Storage::disk('gallery')->makeDirectory($nfolder);
           $files = request()->file('imgs');
           foreach($files as $file){
                $file->storeAs($nfolder,$file->getClientOriginalName(),
                'gallery');
           }
           $new['img_urls'] = $nfolder;
       }


        Vehicle::create($new);



        return redirect('/vehicles');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function show(Vehicle $vehicle)
    {

        $gallery = Storage::disk('gallery')->files($vehicle->img_urls);

        $vehicle = compact('vehicle');
        $vehicle['gallery'] = $gallery;

        return view('vehicle.show', $vehicle);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function edit(Vehicle $vehicle)
    {
        abort_unless(auth()->user()->isAdmin, 404);

        $gallery = Storage::disk('gallery')->files($vehicle->img_urls);
        $vehicle = compact('vehicle');
        $vehicle['gallery'] = $gallery;



        return view('vehicle.edit', $vehicle);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vehicle $vehicle)
    {




        $update = $request->validate([
            'make' => 'required',
            'model' => 'required',
            'type' => 'required',
            'mode' => 'required',
            'price' => 'required',
            'description',
        ]);

        $update['mode'] = strtolower($update['mode']);
        $update['type'] = strtolower($update['type']);

        if(request()->hasfile('thumbnail')){
            File::delete(public_path().str_replace('\\','/',$vehicle->thumbnail));
            $file = request()->file('thumbnail');
            $fname = request()->file('thumbnail')->getClientOriginalName();
            $thumbnail = '/images/vehicles/' . $fname;
            $file->move('images/vehicles', $fname);
            $update['thumbnail'] = $thumbnail;
        }

        if(request()->hasfile('imgs')){
            $nfolder = $vehicle->img_urls;
            $files = request()->file('imgs');
            foreach($files as $file){
            $file->storeAs($nfolder,$file->getClientOriginalName(),
            'gallery');
            }
            $new['img_urls'] = $nfolder;
        }




        $vehicle->update($update);

        $gallery = Storage::disk('gallery')->files($vehicle->img_urls);

        foreach($gallery as $img){
            $qstring = preg_replace('#\.#', '_', $img);
            $qstring = preg_replace('#\s#', '_', $qstring);
            if(request()->exists("$qstring") ){
                $path = public_path().'/images/gallery/'.$img;
                File::delete($path);
            }
        }



        return redirect('/vehicles');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vehicle $vehicle)
    {
        abort_unless(auth()->user()->isAdmin, 404);

        if($vehicle->thumbnail !== '/images/noimage.svg' ){
            File::delete(public_path().str_replace('\\','/',$vehicle->thumbnail));
        }

        if(isset($vehicle->img_urls) && $vehicle->thumbnail !== '' ){
            Storage::disk('gallery')->deleteDirectory($vehicle->img_urls);
        }

        $vehicle->delete();

        return redirect('/vehicles');
    }
}
