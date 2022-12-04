<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(Auth::user()->role_id == '1' || Auth::user()->role_id=='2'){
            return redirect()->route('admin.home');
        }
        if (Auth::user()->role_id == '3') {
            return redirect()->route('user.home');
        }
        else{
            Auth::logout();
            return view('auth/login');
        }
    }


    /** directional (Điều hướng)*/
    public function home()
    {
        return response()->view('user.index');
    }
    /** directional (Điều hướng)*/
    public function admin()
    {

        if(Auth::user()->role_id == '1' || Auth::user()->role_id=='2'){

            return response()->view('admin.index',['com'=>'home']);
        }else{
            return redirect()->route('login');
        }
    }
}
