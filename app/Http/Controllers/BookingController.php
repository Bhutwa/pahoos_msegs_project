<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Validator;
use App\Slot;
use Illuminate\Support\Facades\Mail;
use App\Mail\sendingEmail;

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
        $slot_id=Slot::where('location','=', $request->slot_location)->value('id');
        $validator = Validator::make($request->all(),[
            'location'  => 'required',
            'start'  => 'required|date_format:h:iA',
            'end'    => 'required|date_format:h:iA|after:start',
          ]);
          $taken = DB::table('user_slot')
           ->where('slot_id', '=', $slot_id)
           ->where('start','=',$request->start)->get();
            // dd($taken);
            $slot_count=DB::table('user_slot')->where('slot_id',$slot_id)->count();
                if($slot_count<(Slot::select('space')->value('space')) && $validator && (count($taken))<1){                
                
                DB::table('user_slot')
                    ->insert([
                        'user_id'=> Auth::id(),
                        'slot_id'=>$slot_id,
                        'start' => $request->start,
                        'end' => $request->end
                    ]);
                    
                    $id=DB::table('user_slot')
                    ->select('id')
                    ->where('user_id',Auth::id())
                    ->where('slot_id',$slot_id)
                    ->get();
                    $to_mail=Auth::user()->email;
                    $data=[
                        'subject' => 'BOOKING CONFIRMED',
                        'content' => 'Thank you For booking with us .Your Booking id is PAH000', $id,' Your booking is from ',$request->start,'to',$request->end,'Plaese pay the booking amount to the cashier before entering the building .THANK YOU "Your vehicle is safe with us".',
                        
                    ];
                    $email=Auth::user()->email;
                    Mail::to($to_mail)->send(new sendingEmail($data));

                    return back()->with('success', 'Booked Parking Slot Successfully');
                }
                else{
                    return back()->with('error', 'No Space Available in this location or Time slot already booked ,Please Select another !');
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
    public function edit(Request $request,$booking_id)
    { 
        $slot=Slot::where('location', $request->slot_location)->first();
        // $slot_id=$slot->id;
        $booking = DB::table('user_slot')
                    ->where('id',$booking_id)
                    ->update([
                        'slot_id' => $slot->id,
                        'start'  =>$request->start,
                        'end'       =>$request->end
                                            ]);
            return redirect('/home');
                    
                    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$booking_id)
    {
        // dd($booking_id);
       $deleteBooking=DB::table('user_slot')->where('id','=',$booking_id)->delete();
        return redirect('/home');   
    }
    public function feedback(Request $request)
    {
        
        DB::table('feedbacks')
            ->insert([
                'user_id' => Auth::user()->id,
                'rating' => $request->rating,
                'feedback_message' => $request->feedback_message
            ]);
            return redirect('/home');
    }

    
}
