<?php

namespace App\Http\Controllers;
use App\Setting;
use Auth;
use Session;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function __construct()
    {
        return $this->middleware('admin:admin');
    }

    public function index(){
        $settings = Setting::all()->first();
        return view('admin.settings.edit',compact('settings'));
    }

    public function update(Request $request){
        $this->validate($request,[
            'site_name'=>'required',
            'contact_email'=>'required|email',
            'contact_number'=>'required',
            'address'=>'required',
            'about'=>'required'
        ]);
        $edit = Setting::all()->first();
        $edit->site_name=$request->input('site_name');
        $edit->contact_email=$request->input('contact_email');
        $edit->contact_number=$request->input('contact_number');
        $edit->address=$request->input('address');
        $edit->about=$request->input('about');
        $edit->save();
        Session::flash('success','Setting edited Successfully');
        return redirect(route('home'));
    }
}
