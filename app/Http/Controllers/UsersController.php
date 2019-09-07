<?php

namespace App\Http\Controllers;

use App\User;
use App\Profile;
use Session;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function __construct()
    {
        return $this->middleware('auth');
    }

    public function index()
    {
        $users = User::all();
        return view('admin.users.index',compact('users'));
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=>'required',
            'email'=>'required|email'/*,
            'image'=>'required|image'*/
        ]);

        /*  # image handling
          $image= $request->file('image'); //get the input
          $image_new_name=time().trim($image->getClientOriginalName());//set anew name
          $image->move('uploads/users',$image_new_name); //upload the image to the new path*/

        $user = User::create([
            'name'      => $request->input('name'),
            'email'     => $request->input('email'),
            'password'  => bcrypt('password')
        ]);

        $profile = Profile::create([
        'user_id' => $user->id,
        'image'   =>asset('uploads/avatars/1.png')
        ]);

        Session::flash('success','Successfully Added User');
        return redirect(route('users.index'));
    }

    public function show(){

    }
    public function destroy($id)
    {
        $user = User::find($id);
        $user->profile->delete();
        $user->delete();

        Session::flash('success','user deleted successfully');
        return redirect()->back();
    }

    public function admin($id){
        $user = User::find($id);
        $user->admin=1;
        $user->save();
        Session::flash('success','permeation added ');
        return redirect()->back();
    }

    public function notadmin($id)
    {
        $user = User::find($id);
        $user->admin=0;
        $user->save();
        Session::flash('success','permeation removed ');
        return redirect()->back();
    }
}
