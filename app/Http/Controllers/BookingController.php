<?php

namespace PaHooSBooKinG\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Auth;
use Redirect;
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
        $location=$request->slot_location;
        // $slot_id=DB::select('select id from slots where location = ?', [$location]);
        $slot_id=DB::table('slots')->where('location', $location)->value('id');
        $slot_count=DB::table('user_slot')->where('slot_id',$slot_id)->count();
        if($slot_count<DB::table('slots')->select('space')->value('space')){
        var_dump($slot_count);
        $user_id= Auth::id();
        $book=DB::table('user_slot')
                    ->insert([
                        'user_id'=> $user_id,
                        'slot_id'=>$slot_id
                    ]);
                    return back()->with('success', 'Space Added successfully ^_^');
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
}
