<?php
namespace App\Http\Controllers;
use App\Slot;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use FarhanWazir\GoogleMaps\GMaps;


class SlotController extends Controller
{
    
    public function index()
    {
        $slots = DB::table('slots')
        ->select('location')
        ->get();
        return view('user.book',compact('slots'));
        // $slots=App\Slot::all();
        // return view('user.book',compact('slots'));
    }
    public function create(Request $request)
    {
        // dd($request->location);
        $slot=Slot::insert([
                        'location'=> $request->location,
                        'space'=>$request->space,
                        'latitude'=>$request->latitude,
                        'longtitude'=>$request->longtitude
                    ]);
                   return back()->with('success', 'Space Added successfully ^_^');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function map()
    {
            $config['center'] = '23.733850,92.716722';
            $config['zoom'] = '14';
            $config['map_height'] = '600px';           
    
            $gmap = new GMaps();
            $gmap->initialize($config);
            // marker
            $slots=Slot::getAll();
            

            foreach($slots as $slot){
                $slot_available=$slot->space - (DB::table('user_slot')->where('user_slot.slot_id','=',$slot->id)->count());
            $marker['position'] = "$slot->latitude, $slot->longtitude";
            $marker['infowindow_content'] = "$slot->location,slot available : $slot_available";
            $gmap->add_marker($marker);
            }
            $map = $gmap->create_map();
            
            return view('/user/map',compact('map'));
    }
}
