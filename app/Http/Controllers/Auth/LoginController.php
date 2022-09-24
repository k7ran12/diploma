<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Traits\HasRoles;


class LoginController extends Controller
{

    use AuthenticatesUsers,HasRoles;

    //protected $redirectTo = RouteServiceProvider::HOME;

    public function authenticated(){
        if(Auth::user()->hasAnyRole('admin')){
            return redirect()->route('home') ;
        }else{
            return redirect()->route('add.index');
        }
    }

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
