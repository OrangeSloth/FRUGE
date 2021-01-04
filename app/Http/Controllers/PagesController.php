<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\FruitsController;

class PagesController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    // public function home(){
    //     if(!Session::get('login')){
    //         return redirect('login')->with('alert','Kamu harus login dulu');
    //     }
    //     else{
    //         return view('index');
    //     }
    // }

    public function logout(){
        Auth::logout();
        return redirect()->route('login');
    }

    //nonuser page
    public function dokumentasi()
    {
        view('dokumentasi');
    }


    //user page
    public function userIndex()
    {
        return view('userIndex');
    }

    public function userPenggunaan()
    {
        return view('userPenggunaan');

    }

    //admin page
    public function adminIndex()
    {
        return view('adminIndex');
    }

    public function adminPenggunaan()
    {
        return view('adminPenggunaan');
    }

}
