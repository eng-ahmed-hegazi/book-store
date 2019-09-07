
@extends('layouts.app')
@section('content')
    @include('admin.includes.errors')
    <div class="panel panel-primary">
        <div class="panel-heading text-uppercase">
            EDIT CATEGORY {{$categories->name}}
        </div>
        <div class="panel-body">
            <form action="{{route('categories.update',$categories->id)}}" method="post" class="form">
                {{csrf_field()}}
                {{method_field('PUT')}}
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" value="{{$categories->name}}" name="name" placeholder="enter name" class="form-control">
                </div>
                <div class="form-group text-center">
                    <input type="submit" value="Update Category" class="btn btn-success">
                </div>
            </form>
        </div>
    </div>
@endsection