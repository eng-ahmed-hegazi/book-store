<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tag;
use Session;
use Image;
use App\Book;
use App\Category;

class BooksController extends Controller
{
    public function index()
    {
        $books = Book::paginate(8);
        return view('admin.books.index',[
            'books' => $books
        ]);
    }
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        if($categories->count()==0){
            Session::flash('info','you should have some categories before add post');
            return redirect()->route('category.create');
        }
        return view('admin.books.create',compact('categories','tags'));
    }
    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=>'required',
            'author'=>'required',
            'description'=>'required',
            'image'=>'required|image',
            'download_link'=>'required|url',
            'category_id'=>'required'
        ]);

        $image = $request->file('image');
        $featured_new_name=time().trim($image->getClientOriginalName());
        Image::make($image)
            ->resize(300, null, function ($constraint) {
            $constraint->aspectRatio();
            })
            ->save(public_path('uploads/'.$featured_new_name),50);

        $book = Book::create([
            'name'           => $request->input('name'),
            'author'         => $request->input('author'),
            'download_link'  => $request->input('download_link'),
            'size'           => $image->getClientSize(),
            'slug'           => str_slug($request->input('name')),
            'description'       => $request->input('description'),
            'image'      => 'uploads/'.$featured_new_name,
            'category_id'   => $request->input('category_id')
        ]);
        $book->tags()->attach($request->input('tags'));
        Session::flash('success','Successfully added Book');
        return redirect(route('books.index'));
    }
    public function edit($id)
    {
        $categories = Category::all();
        $tags = Tag::all();
        $book = Book::find($id);
        return view('admin.books.edit',compact('book','categories','tags'));
    }
    public function show(){

    }
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'name'=>'required',
            'author'=>'required',
            'description'=>'required',
            'download_link'=>'required|url',
            'category_id'=>'required'
        ]);

        $edit = Book::find($id);

        if($request->hasFile('image')){
            $image = $request->file('image');
            $featured_new_name=time().trim($image->getClientOriginalName());
            Image::make($image)
                  ->resize(300, null, function ($constraint) {
                    $constraint->aspectRatio();
                })->save(public_path('uploads/'.$featured_new_name),50);
            $edit->image = 'uploads/'.$featured_new_name;
        }
        $edit->name=$request->input('name');
        $edit->author=$request->input('author');
        $edit->description=$request->input('description');
        $edit->download_link=$request->input('download_link');
        $edit->category_id=$request->input('category_id');
        $edit->save();

        $edit->tags()->sync($request->input('tags'));
        Session::flash('success','Successfully updated Book Information');
        return redirect()->route('books.index');
    }
    public function destroy($id)
    {
        $delete = Book::find($id);
        $delete->delete();
        $delete->destroy($id);
        Session::flash('success','Successfully deleted Book Information');
        return redirect()->route('books.index');
    }
}
