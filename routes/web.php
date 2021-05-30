<?php
namespace PaHooSBooKinG\Http\Controllers;

use App\Http\Controllers\BookingController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Slot;
use App\User;

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
    ->where('user_slot.user_id',Auth::id())
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
            ->select('users.name', 'slots.location','user_slot.id','user_slot.start','user_slot.end')->get();
    return view('admin.home',['bookingdetails'=> $bookingdetails]);
});

Route::get('/feedbacks',function(){
    $feedbacks=DB::table('feedbacks')
                    ->join('users','users.id','=','feedbacks.user_id')
                    ->select('feedbacks.rating','feedbacks.feedback_message','users.name')->get();
                    // dd($feedbacks);
    return view('admin.feedbacks',['feedbacks'=>$feedbacks]);
});

Route::get('/user-details',function(){
    $users=User::where('id','<>',2)->get();
    return view('admin.allusers',['users'=> $users]);
});
//<-----------Piviot Table Route -------->>
Route::get('/add-slot',function(){
    return view('/admin/addSlot');
});

//-----------------------------END ----------------------------------------


// <<--------- Google Map Route ----------->>
Route::get('/googlemap', 'SlotController@map');

// <<-------------View redirected Routes------>

Route::get('add-feedback','BookingController@feedback')->name('add-feedback');;
// <<--------------Controller Routes


Route::get('/feedback',function(){
    return view('user/feedback');
});
