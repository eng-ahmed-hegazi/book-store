<?php

namespace App\Http\Controllers;

use App\Book;
use App\Category;
use App\Tag;
use Auth;
use App\Comment;
use Illuminate\Http\Request;
use App\Profile;

class FrontendController extends Controller
{
    public function index(){
        $books = Book::paginate(9);
        $mostdownloade = Book::orderBy('id')->take(4)->get();
        $resentadded = Book::orderBy('created_at','desc')->take(3)->get();
        $categories = Category::all();
        return view('index',[
            'books'  => $books,
            'mostdownloade'=>$mostdownloade,
            'resentadded'=>$resentadded,
            'categories'=>$categories
        ]);
    }

    public function singleBook($slug){
        $book= Book::where('slug',$slug)->first();
        $tags = $book->tags;
        $comments =Comment::where('book_id',$book->id)->get();

        $categories = Category::all();
        return view('single',[
            'book'  => $book,
            'tags'=>$tags,
            'categories'=>$categories,
            'comments'  =>$comments
        ]);
    }

    public function category($id){
        $category = Category::find($id);
        $books = $category->books;
        $categories = Category::all();
        return view('category',[
            'books'          => $books,
            'category'         =>$category,
            'categories'=>$categories
        ]);
    }
    public function tag($id){
        $tags = Tag::find($id);
        $books = $tags->books;
        $categories = Category::all();
        return view('tag',[
            'tag_title'     => $tags->tag,
            'books'          => $books,
            'categories'      => $categories
        ]);
    }

    public function search(){
        $books = Book::where('name','like','%'.request('query').'%')->paginate(8);
        $categories = Category::all();
        return view('search',[
            'books'         => $books,
            'categories'      => $categories,
            'title'         => 'نتيجــــــــــة البحــــث عن  '.request('query'),
            'query'         => request('query')
        ]);
    }

    public function download($slug){
        $book= Book::where('slug',$slug)->first();
        return redirect($book->download_link);
    }

    public function profilecreate (){
        return view('users.profile');
    }

    public function updateprofile(Request $request)
    {

        # delete id from the pharamter because Auth::user() is accessible every ware in view
        # controller will edit the profile of the logged in user
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'facebook' => 'required|url',
            'youtube' => 'required|url',
            'about' => 'required'
        ]);

        $user=Auth::user();
        $user->name=$request->input('name');
        $user->email=$request->input('email');
        if(Profile::where('user_id',Auth::user()->id)->count() > 0){
            $profile=Profile::where('user_id',Auth::user()->id)->first();
            $profile->user_id=$user->id;
            if($request->hasFile('image')) {
                # image handling
                $image = $request->file('image'); //get the input
                $image_new_name = time() . trim($image->getClientOriginalName());//set anew name
                $image->move('uploads/users', $image_new_name); //upload the image to the new path
                $profile->avatar='uploads/users/'.$image_new_name;
            }

            $profile->facebook=$request->input('facebook');
            $profile->youtube=$request->input('youtube');
            $profile->about=$request->input('about');
        }else{
            $profile= new Profile;
            $profile->user_id=$user->id;
            if($request->hasFile('image')) {
                # image handling
                $image = $request->file('image'); //get the input
                $image_new_name = time() . trim($image->getClientOriginalName());//set anew name
                $image->move('uploads/users', $image_new_name); //upload the image to the new path
                $profile->avatar='uploads/users/'.$image_new_name;
            }
            $profile->facebook=$request->input('facebook');
            $profile->youtube=$request->input('youtube');
            $profile->about=$request->input('about');
        }



        if(request('password') != null)
        {
            dd('not null');
            $user->password=bcrypt($request->input('password'));
        }
        $user->save();
        $profile->save();
        return redirect('/profile');
        }
        public function contact(){
            return view('contacts');
        }

        public function about(){
            return view('about');
        }
    public function addComment($id){
        $comment = new Comment;
        $comment->comment = request('comment');
        $comment->book_id = $id;
        $comment->user_id = Auth::user()->id;
        $comment->likes = 1;
        $comment->save();

        return redirect()->back();
    }
}
