
@extends('layouts.app');
@section('content')
    @include('admin.includes.errors')
    <div class="panel panel-primary">
        <div class="panel-heading">
            ADD NEW USER
        </div>
        <div class="panel-body">
            <form action="{{route('users.store')}}" method="post" class="form" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" value="{{old('name')}}" name="name" placeholder="enter name" class="form-control">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" value="{{old('email')}}" name="email" placeholder="enter email" class="form-control">
                </div>
                {{--                <div class="form-group">
                                    <label for="featured">Image</label>
                                    <input type="file" value="{{old('image')}}" name="image" class="form-control">
                                </div>--}}
                <div class="formgroup text-center">
                    <input type="submit" value="Add New User" class="btn btn-primary">
                </div>
            </form>
        </div>
    </div>
@endsection