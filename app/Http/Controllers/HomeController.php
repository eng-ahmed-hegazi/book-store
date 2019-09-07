<?php

namespace App\Http\Controllers;
use App\Book;
use App\Category;
use App\Subcategory;
use App\User;
use App\Tag;
use App\Comment;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('admin:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $num_categories = Category::all()->count();
        $num_users = User::all()->count();
        $num_books = Book::all()->count();
        $num_tags = Tag::all()->count();
        $comments = Comment::all()->count();
        $sub_categories = Subcategory::all()->count();
        return view('home',[
            'num_categories'=> $num_categories,
            'num_users'     => $num_users,
            'num_books'     => $num_books,
            'num_tags'      => $num_tags,
            'comments'      => $comments,
            'sub_categories'=> $sub_categories,
        ]);
    }
}
