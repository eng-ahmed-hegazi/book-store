
@extends('layouts.app')
@section('content')
    @include('admin.includes.errors')
    <div class="panel panel-primary">
        <div class="panel-heading text-uppercase">
            EDIT CATEGORY {{$subcategories->name}}
        </div>
        <div class="panel-body">
            <form action="{{route('subcategories.update',$subcategories->id)}}" method="post" class="form">
                {{csrf_field()}}
                {{method_field('PUT')}}
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" value="{{$subcategories->name}}" name="name" placeholder="enter name" class="form-control">
                </div>
                <select name="category_id" id="category" class="form-control" style="height: 35px">
                    @foreach($categories as $category)
                        <option value="{{$category->id}}"
                                @if($category->id == $subcategories->cat_id)
                                selected
                                @endif
                        >{{$category->name}}</option>
                    @endforeach
                </select>
                <div class="form-group text-center">
                    <input type="submit" value="Update Subcategory" class="btn btn-success">
                </div>
            </form>
        </div>
    </div>
@endsection