<?php

namespace PaHooSBooKinG\Http\Controllers\Auth;

use PaHooSBooKinG\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\request;
use Redirect;
use FarhanWazir\GoogleMaps\GMaps;
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    
    protected function authenticated(Request $request, $user) {
        if ($user->role) {
           
            return Redirect::to('admin/home');
        } 
         else {
            $config['center'] = '23.733850,92.716722';
            $config['zoom'] = '14';
            $config['map_height'] = '600px';
    
            $gmap = new GMaps();
            $gmap->initialize($config);
         
            $map = $gmap->create_map();
            return view('/home',compact('map'));
        }
   }
   // protected $redirectTo = '/home';
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
   
}
