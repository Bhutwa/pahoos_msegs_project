<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
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

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/admin/home' , function(){
    $bookingdetails = DB::table('user_slot')
            ->join('users', 'users.id', '=', 'user_slot.user_id')
            ->join('slots', 'slots.id', '=', 'user_slot.slot_id')
            ->select('users.name', 'slots.location','user_slot.id')->get();
    return view('admin.home',['bookingdetails'=> $bookingdetails]);
});
Route::get('/add-slot',function(){
    return view('/admin/addSlot');
});
Route::resource('slots', SlotController::class);
Route::resource('bookings',BookingController::class);

