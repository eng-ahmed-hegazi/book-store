@extends('layouts.app')
@section('content')
    @include('admin.includes.errors')
    <div class="panel panel-primary">
        <div class="panel-heading">
            EDIT PROFILE
        </div>
        <div class="panel-body">
            <form action="{{route('user.profile.store')}}" method="post" class="form" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="form-group">
                    <label for="name">Username</label>
                    <input type="text" value="{{$user->name}}" name="name" placeholder="Enter Username" class="form-control">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" value="{{$user->email}}" name="email" placeholder="Enter Your Email" class="form-control">
                </div>
                <div class="form-group">
                    <label for="password">New Password</label>
                    <input type="password" name="password" placeholder="Enter New Password" class="form-control">
                </div>
                <div class="form-group">
                    <label for="avatar">Avatar</label>
                    <input type="file" name="avatar" class="form-control">
                </div>
                <div class="form-group">
                    <label for="facebook">Facebook</label>
                    <input type="text" value="{{old('facebook')}}" name="facebook" placeholder="Enter Facebook Link" class="form-control">
                </div>
                <div class="form-group">
                    <label for="youtube">Youtube</label>
                    <input type="text" value="{{old('youtube')}}" name="youtube" placeholder="Enter Youtube Link" class="form-control">
                </div>
                <div class="form-group">
                    <label for="about">About</label>
                    <textarea name="about" placeholder="Enter About" class="form-control" cols="30" rows="5">
                        {{old('about')}}
                    </textarea>
                </div>

                <div class="form-group text-center">
                    <input type="submit" value="Add Profile" class="btn btn-primary">
                </div>
            </form>
        </div>
    </div>
@endsection