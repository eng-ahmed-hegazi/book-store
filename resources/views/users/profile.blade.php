@extends('front')
@section('content')
    <div class="row" style="margin: 100px 0">
        <div class="col-lg-1"></div>
        <div class="col-lg-10">
            @if ($errors->any())
                <div class="alert alert-dismissible bg-primary">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <h4 class="alert-heading">Warning!</h4>
                    <ul class="list-unstyled">
                        @foreach ($errors->all() as $error)
                            <li class="text-white">{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
    </div>
    <div class="row">
        <div class="col-lg-1"></div>
        <div class="col-lg-10">
            <form action="{{route('user.profile.update')}}" method="POST" enctype="multipart/form-data">
                {{csrf_field()}}
                {{method_field('POST')}}
                <div class="card bg-primary">
                    <div class="card-header">
                        <div class="pull-right contain col-lg-3">
                            <img src="{{Auth::user()->profile ? asset(Auth::user()->profile->avatar) : asset('img/3.png')}}" width="200" height="200" class="img-fluid image">
                            <div class="middle">
                                <div id="yourBtn" onclick="getFile()">Upload Image</div>
                                <div style='height: 0px;width: 0px; overflow:hidden;'><input id="upfile" name="image" type="file" value="upload" onchange="sub(this)"/></div>
                            </div>
                        </div>
                        <div class="pull-right text-left col-lg-5 text-right" style="padding-left: 10px">
                            <h2 style="color: #000;">{{Auth::user()->name}}</h2>
                            <h3 style="color: #000;">{{Auth::user()->email}}</h3>
                            <h3 style="color: #000;">REPLIES :  {{count(Auth::user()->comments)}}</h3>
                        </div>


                        <div class="pull-right text-left col-lg-3">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <input type="text" name="name" class="form-control"  style="background: #345367;color: #fff" placeholder="enter your name" value="{{Auth::user()->name}}" required autofocus>
                </div>
                <div class="form-group">
                    <input type="text" name="email" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}"  style="background: #345367;color: #fff" placeholder="enter your email" value="{{Auth::user()->email}}" required autofocus>
                </div>
                <div class="form-group">
                    <input type="password" name="password" class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }} "  style="background: #345367;color: #fff" placeholder="enter your new password">
                </div>
                @if(Auth::user()->profile)
                    <div class="form-group">
                        <input type="text" class="form-control " style="background: #345367;color: #fff" placeholder="enter your new facebook" name="facebook" value="{{Auth::user()->profile->facebook}}">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control " style="background: #345367;color: #fff" placeholder="enter your new youtube" name="youtube" value="{{Auth::user()->profile->youtube}}">
                    </div>
                    <div class="form-group">
                        <textarea  class="form-control " placeholder="enter about you" style="height: 250px;background: #345367;color: #fff" name="about">{{Auth::user()->profile->about}}</textarea>
                    </div>
                @else
                    <div class="form-group">
                        <input type="text" class="form-control email" style="background: #345367;color: #fff" placeholder="enter your new facebook" name="facebook" value="">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control"  style="background: #345367;color: #fff" placeholder="enter your new youtube" name="youtube" value="">
                    </div>
                    <div class="form-group">
                        <textarea  class="form-control"  placeholder="enter about you" style="height: 250px;background: #345367;color: #fff" name="about"></textarea>
                    </div>
                @endif
                <div class="form-group">
                    <input type="submit" value="Edit Profile" class="btn btn-dark">
                </div>
            </form>
        </div>
    </div>
    <br><br>
@endsection