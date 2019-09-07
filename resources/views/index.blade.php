@extends('front')
@section('content')
    <div class="row text-center">
        <img src="{{asset('carousel.jpg')}}" alt="" class="img-responsive images" style="width:100%">
    </div>
    <div class="row">
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 pull-right hidden-xs" >
                <ul class="list-unstyled side" style="margin: 0;padding: 0;background: #f7f9f9;">
                    <h4 style="padding-top:20px;">
                <span style="background: #f7f9f9;color: #000;padding: 15px;border-top-right-radius:10px;border-top-left-radius: 10px ">
                    الأقســـــــــــــــــام
                </span>
                    </h4>
                    @foreach($categories as $category)
                    <li style="background: #f7f9f9;color: #333;padding: 10px;border-radius:20px;margin-bottom: 2px">
                        <a href="{{route('category.single',$category->id)}}" style="color: #333">{{$category->name}}</a></li>
                    @endforeach
                </ul>
            <img src="{{asset('uploads/books/book5.png')}}" alt="" class=" img-responsive ">
        </div>
        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 pull-left">
                <div>
                    <h4 style="padding-top:20px;">
                        <span class="bg" style="color: #333;padding: 5px;background: #eff1f1">
                        الكــــــــــــــــــتب
                        </span>
                        <hr style="height: 5px;" class="line">
                    </h4>
                </div>
            <div class="row">
                @foreach($books as $book)
                <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
                    <div class="panel" style="background: #f7f9f9">

                        <div class="panel-body text-center">
                            <div class="display-topleft black padding bg">{{$book->category->name}}</div>
							<div class="row">
								<div class="col-lg-2"></div>
								<div class="col-lg-8">
								<img src="{{$book->image}}" alt="{{$book->name}}" title="{{$book->name}}" class="img-responsive">
								</div>
								
								<div class="col-lg-2"></div>
							</div>
                            <h4>{{str_limit($book->name,25)}}</h4>
                            <p class="text-muted">{{$book->author}}</p>
                            <a href="{{route('book.single',$book->slug)}}" class="scale btn btn-light" style="font-size: 15px;color:#000;text-decoration: none;background:#f0f1f1">
                                المزيد
                                <img src="{{asset('more.png')}}" alt="" height="17px" class="images">
                            </a>
                        </div>
                    </div>

                </div>
                @endforeach
            </div>
            <div class="clearfix"></div>
                    <div class="row">
                        <div class="text-center">{{$books->links('pagination')}}</div>
                    </div>

        </div>
    </div>
    <div class="row">
        <div>
            <h4 style="padding-top:20px;">
                <span  class="bg" style="color: #333;padding: 5px;background: #eff1f1">
                    الأكثـــــر تحميـــــــلا
                </span>
                <hr style="height: 3px;color: #222222;" class="line">
            </h4></div>
        @foreach($mostdownloade as $book)
            <div class="col-lg-6">
                <div style="background: #f1f1f1;margin-bottom: 2px">
                    <div class="panel-body text-right">
                        <img src="{{$book->image}}" alt="{{$book->name}}" title="{{$book->name}}" class="images pull-right  img-responsive">
                        <div  class="col-lg-7 pull-right">
                            <h4>{{str_limit($book->name,25)}}</h4>
                            <p>{{$book->author}}</p>
                            <p class="text-muted">{{$book->description}}</p>
                            <a href="{{route('book.single',$book->slug)}}" class="scale btn btn-light" style="font-size: 15px;color:#000;text-decoration: none;background:#ebe9e9">
                                المزيد
                                <img src="{{asset('more.png')}}" alt="" height="17px" class="images">
                            </a>
                        </div>
                    </div>
                </div>

            </div>
        @endforeach
    </div>
    <div class="row">
        <div>
            <h4 style="padding-top:20px;">
                <span style="color: #333;padding: 5px;background: #eff1f1" class="bg">
                    المضافــــــــــة حديثـا</span>
                <hr style="height: 3px;color: #222222;" class="line">
            </h4></div>
        @foreach($resentadded as $book)
            <div class="col-lg-4">
                <div style="background: #f1f1f1;margin-bottom: 2px">
                    <div class="panel-body text-center side">
                        <img src="{{$book->image}}" alt="{{$book->name}}" title="{{$book->name}}" class="images  img-responsive">
                        <h4>{{str_limit($book->name,25)}}</h4>
                        <p class="text-dark">{{$book->author}}</p>
                        <p class="text-muted">{{str_limit($book->description,50)}}</p>
                        <a href="{{route('book.single',$book->slug)}}" class="scale btn btn-light"
                           style="font-size: 15px;color:#000;text-decoration: none;background:#ebe9e9">
                            المزيد
                            <img src="{{asset('more.png')}}" alt="" height="17px" >
                        </a>
                    </div>
                </div>

            </div>
        @endforeach
    </div>
@endsection