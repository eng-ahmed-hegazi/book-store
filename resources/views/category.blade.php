@extends('front')
@section('content')
    <div class="row" style="margin-top: 50px;">
        <h1 class="page-header text-center">
            {{$category->name}}
        </h1>
        @foreach($books as $book)
            <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12" style="margin-top: 20px;">
                <div class="panel">
                    <div class="panel text-center" style="background: #f1f1f1;">
                        <div class="display-topleft black padding bg">{{$book->category->name}}</div>
                        <img src="{{asset($book->image)}}" alt="">
                        <h4>{{str_limit($book->name,25)}}</h4>
                        <p>{{$book->author}}</p>
                        <a href="{{route('book.single',$book->slug)}}" class="btn btn-outline-primary">المزيد</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection