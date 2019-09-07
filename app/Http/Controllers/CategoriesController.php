<?php

namespace App\Http\Controllers;
use App\Category;
use Session;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function index()
    {
        $categories = Category::paginate(8);
        return view('admin.categories.index',[
            'categories' => $categories
        ]);
    }
    public function create()
    {
        return view('admin.categories.create');
    }
    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=>'required',
        ]);
        Category::create([
            'name' => $request->input('name')
        ]);
        Session::flash('success','Successfully added Category');
        return redirect(route('categories.index'));
    }
    public function edit($id)
    {
        $categories = Category::find($id);
        return view('admin.categories.edit',compact('categories'));
    }
    public function show(){

    }
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'name'=>'required'
        ]);

        $edit = Category::find($id);
        $edit->name=$request->input('name');
        $edit->save();

        Session::flash('success','Successfully updated Category Information');
        return redirect()->route('categories.index');
    }
    public function destroy($id)
    {
        $delete = Category::find($id);
        $delete->delete();
        $delete->destroy($id);
        Session::flash('success','Successfully deleted Category');
        return redirect()->route('categories.index');
    }
}
