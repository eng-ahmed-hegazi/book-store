
@extends('layouts.app')
@section('content')
    @include('admin.includes.errors')
    <div class="panel panel-primary">
        <div class="panel-heading text-uppercase">
            EDIT SETTINGS
        </div>
        <div class="panel-body">
            <form action="{{route('settings.update')}}" method="post" class="form">
                {{csrf_field()}}
                <div class="form-group">
                    <label for="site_name">SITE NAME</label>
                    <input type="text" value="{{$settings->site_name}}" name="site_name" placeholder="enter site name" class="form-control">
                </div>
                <div class="form-group">
                    <label for="contact_number">CONTACT NUMBER</label>
                    <input type="text" value="{{$settings->contact_number}}" name="contact_number" placeholder="enter contact number" class="form-control">
                </div>
                <div class="form-group">
                    <label for="contact_email">CONTACT EMAIL</label>
                    <input type="email" value="{{$settings->contact_email}}" name="contact_email" placeholder="enter email" class="form-control">
                </div>
                <div class="form-group">
                    <label for="name">ADDRESS</label>
                    <input type="text" value="{{$settings->address}}" name="address" placeholder="enter name" class="form-control">
                </div>

                <div class="form-group">
                    <label for="name">ABOUT</label>
                    <textarea placeholder="enter about" id="content" name="about" cols="5" rows="10" class="form-control">
                        {{$settings->about}}
                    </textarea>
                </div>
                <div class="formgroup text-center">
                    <input type="submit" value="Update Settings" class="btn btn-success">
                </div>
            </form>
        </div>
    </div>
@endsection
@section('style')
    <link rel="stylesheet" href="{{asset('css/summernote.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}" type="text/css">
@endsection
@section('script')
    <script src="{{asset('js/summernote.js')}}" type="text/javascript"></script>
    <script>
        $(document).ready(function() {
            $('#content').summernote();
        });
    </script>
@endsection