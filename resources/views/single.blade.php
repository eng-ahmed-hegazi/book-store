@extends('front')
@section('content')
<div class="container" style=";background: #f1f1f1">
    <div class="row" style="margin-top: 100px;padding: 50px">
        <h1 class="page-header">
            كتــــــــــاب   {{$book->name}}
        </h1>
        <div class="col-lg-6">
            <div >
                <div class="panel-body text-right" style="line-height: 19px">
                    <h4>اســـــم الكتـــــــــاب :{{str_limit($book->name,25)}}</h4>
                    <h4>اســـــــم المؤلــــــــف: {{$book->author}}</h4>
                    <h4 >وصـــــــــف الكتــــــاب: <span style="line-height: 29px">{{$book->description}}</span></h4><br>
                    <a href="{{route('download.single',$book->slug)}}" class="btn btn-primary" target="_blank">
                       تحميـــــــــــل الكتــــــــــاب    <span class="glyphicon glyphicon-save"></span>
                    </a>

                </div>
                <div>
                    @foreach($book->tags as $tag)
                        <span class="badge">
                            <p>
                                <a href="{{route('tag.single',$tag->id)}}" style="color: #fff">
                                <span class="glyphicon glyphicon-tag"></span>
                                    {{$tag->tag}}
                                </a>
                            </p>
                        </span>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <img src="{{asset($book->image)}}" alt="{{$book->name}}" title="{{$book->name}}"  class="col-lg-6 images">
        </div>

    </div>
    <div class="row" style="padding: 10px;margin: 10px">
        @if(!Auth::user())
            <div class="alert alert-danger alert-dismissable fade in">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Login!</strong> to add comment.
                <a href="" style="color: #fff;" data-toggle="modal" data-target="#login"> تسجيل</a>
                <a href="" style="color: #fff;" data-toggle="modal" data-target="#register">دخول</a>
            </div>

        @endif
            @include('admin.includes.errors')
        <form action="{{route('comment.add',$book->id)}}" class="form" method="post">
            {{csrf_field()}}
            {{method_field('POST')}}
            <div class="form-group">
                <label for="">أتـــرك تعليقـا (رأيــــــك يهمنـــا)</label>
                <textarea name="comment" id="" cols="30" rows="10" class="form-control" placeholder="اكتـــــــب تعليقك . . ." style="resize: none"></textarea>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary" value="" {{Auth::user()?'':'disabled'}}>أضف التعلـــــــيق <span class="glyphicon glyphicon-comment"></span></button>
            </div>
        </form>
    </div>
    <div class="row">
        <div class="col-lg-offset-4 col-lg-8">
            @foreach($comments as $comment)
                @if(isset($comment->user))
                <div class="panel panel-default">
                    <div style="padding: 5px">
                        @if(isset($comment->user->profile->avatar))
                        <img src="{{asset($comment->user->profile->avatar)}}" class="img-responsive pull-right"
                             width="60px" height="60px" style="border-radius: 50%">
                        @else
                        <img src="{{asset('uploads/avatars/2.png')}}" class="img-responsive pull-right"
                                 width="60px" height="60px" style="border-radius: 50%">
                        @endif
                        <div class="pull-right" style="padding: 5px">
                            <span class="text-uppercase"><strong>{{$comment->user->name}}</strong></span><br>
                            <span class="text-muted">{{$comment->user->email}}</span><br>
                            <small class="text-muted">[{{$comment->created_at->diffForHumans()}}]</small>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="panel-body">
                        {{$comment->comment}}
                    </div>
                </div>
                @endif
            @endforeach
        </div>
    </div>
</div>
@endsection