
@extends('layouts.app')
@section('content')
    @include('admin.includes.errors')
    <div class="panel panel-primary">
        <div class="panel-heading">
            CREATE NEW CATEGORY
        </div>
        <div class="panel-body">
            <form action="{{route('categories.store')}}" method="post" class="form">
                {{csrf_field()}}
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" value="{{old('name')}}" name="name" placeholder="enter category name" class="form-control">
                </div>
                <div class="formgroup text-center">
                    <input type="submit" value="Add Category" class="btn btn-info">
                </div>

            </form>
        </div>
    </div>
@endsection