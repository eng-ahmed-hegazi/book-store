<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;
class AdminController extends Controller
{
    
    public function create(){
        return view('admin.login');
    }

    public function store(){
        if(Auth::guard('admin')->attempt(['email'=>request('email'),'password' => request('password')])){
            return redirect('/home');
        }else{
            return back();
        }
    }

    public function logout(Request $request)
    {

        Auth::guard('admin')->logout();
        $request->session()->flush();
        $request->session()->regenerate();

        return redirect()->guest(url('/admin/login'));
    }
}
