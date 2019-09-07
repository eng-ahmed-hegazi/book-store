<?php

namespace App\Http\Controllers;
use Auth;
use Session;
use Image;
use App\Profile;
use Illuminate\Http\Request;

class ProfilesController extends Controller
{
    public function index()
    {
        $user=Auth::user();
        return view('admin.users.profile',compact('user'));
    }

    public function update(Request $request)
    {
        # delete id from the pharamter because Auth::user() is accessible every ware in view
        # controller will edit the profile of the logged in user
        $this->validate($request,[
            'name'       =>'required',
            'email'      =>'required|email',
            'facebook'   =>'required|url',
            'youtube'    =>'required|url',
            'about'    =>'required'
        ]);

        $user=Auth::user();
        if($request->hasFile('avatar')){
            # image handling
            $avatar= $request->file('avatar'); //get the input
            $avatar_new_name=time().trim($avatar->getClientOriginalName());
            Image::make($avatar)
                ->resize(300, null, function ($constraint) {
                    $constraint->aspectRatio();
                })->save(public_path('uploads/avatars/'.$avatar_new_name),50);
            $user->profile->avatar = 'uploads/avatars/'.$avatar_new_name;
            $user->profile->save();
        }
        $user->name=$request->input('name');
        $user->email=$request->input('email');
        $user->profile->facebook=$request->input('facebook');
        $user->profile->youtube=$request->input('youtube');
        $user->profile->about=$request->input('about');




        if($request->has('password'))
        {
            $user->password=bcrypt($request->input('password'));
        }
        $user->save();
        $user->profile->save();
        Session::flash('success','profile Edited Successfully');
        return redirect()->route('user.profile');
    }

    public function create()
    {
        $user=Auth::user();

            return view('admin.users.profile.create',['user'=> $user]);
    }
    public function store(Request $request)
    {
        $this->validate($request,[
            'name'       =>'required',
            'email'      =>'required|email',
            'facebook'   =>'required|url',
            'youtube'    =>'required|url',
            'about'    =>'required'
        ]);

        $user=Auth::user();


        $profile=new Profile;
        $profile->user_id=$user->id;

        $avatar= $request->file('avatar'); //get the input
        $avatar_new_name=time().trim($avatar->getClientOriginalName());
        Image::make($avatar)
            ->resize(300, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path('uploads/avatars/'.$avatar_new_name),50);

        $profile->avatar = 'uploads/avatars/'.$avatar_new_name;
        $user->name=$request->input('name');
        $user->email=$request->input('email');
        $profile->facebook=$request->input('facebook');
        $profile->youtube=$request->input('youtube');
        $profile->about=$request->input('about');

        if($request->has('password'))
        {
            $user->password=bcrypt($request->input('password'));
        }

        $user->save();
        $profile->save();
        Session::flash('success','profile Edited Successfully');
        return redirect()->back();
    }
}
