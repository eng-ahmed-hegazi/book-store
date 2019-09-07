<?php

namespace App\Http\Controllers;
use Session;
use App\Tag;
use Illuminate\Http\Request;

class TagsController extends Controller
{
    public function index()
    {
        $tags = Tag::paginate(8);
        return view('admin.tags.index',[
            'tags' => $tags
        ]);
    }
    public function create()
    {
        return view('admin.tags.create');
    }
    public function store(Request $request)
    {
        $this->validate($request,[
            'tag'=>'required',
        ]);
        Tag::create([
            'tag' => $request->input('tag')
        ]);
        Session::flash('success','Successfully added Tag');
        return redirect(route('tags.index'));
    }
    public function edit($id)
    {
        $edit = Tag::find($id);
        return view('admin.tags.edit',compact('edit'));
    }
    public function show(){

    }
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'tag'=>'required'
        ]);

        $edit = Tag::find($id);
        $edit->tag=$request->input('tag');
        $edit->save();

        Session::flash('success','Successfully updated Tag Information');
        return redirect()->route('tags.index');
    }
    public function destroy($id)
    {
        $delete = Tag::find($id);
        $delete->delete();
        $delete->destroy($id);
        Session::flash('success','Successfully deleted Tag');
        return redirect()->route('tags.index');
    }
}
