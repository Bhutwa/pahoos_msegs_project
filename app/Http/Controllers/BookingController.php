<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Validator;
use App\Slot;
use Illuminate\Support\Facades\Input;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        $validator = Validator::make($request->all(),[
            'location'  => 'required',
            'start'  => 'required|date_format:h:iA',
            'end'    => 'required|date_format:h:iA|after:start',
          ]);
        $location=$request->slot_location;
        // $slot_id=DB::select('select id from slots where location = ?', [$location]);
        $slot_id=DB::table('slots')->where('location', $location)->value('id');
        $slot_count=DB::table('user_slot')->where('slot_id',$slot_id)->count();
        if($slot_count<DB::table('slots')->select('space')->value('space') && $validator){
        var_dump($slot_count);
        $user_id= Auth::id();
        $book=DB::table('user_slot')
                    ->insert([
                        'user_id'=> $user_id,
                        'slot_id'=>$slot_id,
                        'start' => $request->start,
                        'end' => $request->end
                    ]);
                    return back()->with('success', 'Booked Parking Slot Successfully');
        }
        else {
            return back()->with('error', 'No Space Available in this location ,Please Select another !');
        }
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
        $booking = DB::table('user_slot')->find(Input::get('id'));
            $booking->loaction       = Input::get('loaction');
            $booking->start      = Input::get('start');
            $booking->end = Input::get('end');
            $booking->save();
            return back();
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
}
