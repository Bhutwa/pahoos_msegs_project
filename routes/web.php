<?php
namespace PaHooSBooKinG\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Slot;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

 

Auth::routes();

// <<-----------Models Routes ---------->
Route::resource('slots','\App\Http\Controllers\SlotController');
Route::resource('bookings','\App\Http\Controllers\BookingController');

// <<-------------Home Page Routes------------------->>
Route::get('/', 'HomeController@index');
//---------------------USER
Route::get('/home', function(){
    $slots= Slot::select('location')->get();
    $bookingdetails=DB::table('user_slot')
    ->join('slots','slots.id','=','user_slot.slot_id')
    ->join('users', function ($join) {
        $join->on('user_slot.user_id', '=', 'users.id');
    })
    ->select('user_slot.id','slots.location','users.name','user_slot.start','user_slot.end')
    ->get();
    $count=count($bookingdetails);
    return view('home', ['bookingdetails' => $bookingdetails,'count' => $count,'slots' => $slots]);
});

//----------------------ADMIN------Routes---------------------------------
Route::get('/admin/home' , function(){
    $bookingdetails = DB::table('user_slot')
            ->join('users', 'users.id', '=', 'user_slot.user_id')
            ->join('slots', 'slots.id', '=', 'user_slot.slot_id')
            ->select('users.name', 'slots.location','user_slot.id')->get();
    return view('admin.home',['bookingdetails'=> $bookingdetails]);
});
//<-----------Piviot Table Route -------->>
Route::get('/add-slot',function(){
    return view('/admin/addSlot');
});
//-----------------------------END ----------------------------------------


// <<--------- Google Map Route ----------->>
Route::get('/googlemap', 'SlotController@map');

// <<-------------View redirected Routes------>
Route::get('/feedback',function(){
return view('/user/feedback');

});




