@extends('front')
@section('content')
    <div class="row" style="margin: 150px 0">

        <div class="col-lg-1"></div>
        <div class="col-lg-10">
            <h1>تواصل معنا</h1>
            <hr>
            <form action="#" method="POST" enctype="multipart/form-data">
                {{csrf_field()}}
                {{method_field('POST')}}
                <div class="form-group">
                    <input type="text" class="form-control " style="background: #37576e" placeholder="enter your name" name="name" value="">
                </div>
                <div class="form-group">
                    <input type="email" class="form-control " style="background: #37576e" placeholder="enter your email" name="email" value="">
                </div>
                <div class="form-group">
                    <textarea  class="form-control " placeholder="enter your message" style="height: 250px;background: #37576e" name="message"></textarea>
                </div>
                <div class="form-group pull-right">
                    <button type="submit" class="btn btn-dark"><span class="fa fa-location-arrow"></span> ارسل</button>
                </div>
            </form>
        </div>
    </div>
@endsection