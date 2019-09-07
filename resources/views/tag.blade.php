@extends('front')
@section('content')
    <div class="row" style="margin-top: 50px;">
        <h1 class="page-header text-center">
            {{$tag_title}}
        </h1>
        @foreach($books as $book)
            <div class="col-lg-3" style="margin-top: 20px;background: #f1f1f1;">
                <div class="">
                    <div class=" text-center">
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