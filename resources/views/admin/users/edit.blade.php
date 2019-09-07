
@extends('layouts.app');
@section('content')
    @include('admin.includes.errors')
    <div class="panel panel-primary">
        <div class="panel-heading text-uppercase">
            EDIT Tag {{$edit->id}}
        </div>
        <div class="panel-body">
            <form action="{{route('user.update',$edit->id)}}" method="post" class="form">
                {{csrf_field()}}
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" value="{{$edit->tag}}" name="tag" placeholder="enter tag" class="form-control">
                </div>
                <div class="form-group">
                    <label for="name">Email</label>
                    <input type="text" value="{{$edit->tag}}" name="tag" placeholder="enter tag" class="form-control">
                </div>
                <div class="formgroup text-center">
                    <input type="submit" value="update tag" class="btn btn-success">
                </div>
            </form>
        </div>
    </div>
@endsection