<?php

namespace App\Http\Controllers;
use App\Category;
use App\Subcategory;
use App\Tag;
use Session;
use Illuminate\Http\Request;

class SubcategoriesController extends Controller
{
    public function index()
    {
        $subcategories = Subcategory::paginate(8);

        return view('admin.subcategories.index',[
            'subcategories' => $subcategories
        ]);
    }
    public function create()
    {
        $categories = Category::all();
        if($categories->count()==0){
            Session::flash('info','you should have some categories before add post');
            return redirect()->route('category.create');
        }
        return view('admin.subcategories.create',compact('categories'));
    }
    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=>'required',
            'category_id' =>'required'
        ]);

        $book = Subcategory::create([
            'name'           => $request->input('name'),
            'cat_id'         => $request->input('category_id'),
        ]);
        Session::flash('success','Successfully added Subcategory');
        return redirect(route('subcategories.index'));
    }
    public function edit($id)
    {
        $categories = Category::all();
        $subcategories = Subcategory::find($id);
        return view('admin.subcategories.edit',compact('subcategories','categories'));
    }
    public function show(){

    }
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'name'=>'required',
            'category_id'=>'required',
        ]);

        $edit = Subcategory::find($id);

        $edit->name=$request->input('name');
        $edit->cat_id=$request->input('category_id');
        $edit->save();


        Session::flash('success','Successfully updated Subcategory Information');
        return redirect()->route('subcategories.index');
    }
    public function destroy($id)
    {
        $delete = Subcategory::find($id);
        $delete->delete();
        $delete->destroy($id);
        Session::flash('success','Successfully deleted Subcategory Information');
        return redirect()->route('subcategories.index');
    }
}
