
@extends('layouts.app')
@section('content')
    @include('admin.includes.errors')
    <div class="panel panel-primary">
        <div class="panel-heading">
            CREATE NEW CATEGORY
        </div>
        <div class="panel-body">
            <form action="{{route('subcategories.store')}}" method="post" class="form">
                {{csrf_field()}}
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" value="{{old('name')}}" name="name" placeholder="enter category name" class="form-control">
                </div>
                <div class="form-group">
                    <label for="Category">Category</label>
                    <select name="category_id" id="category" class="form-control" style="height: 35px">
                        @foreach($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="formgroup text-center">
                    <input type="submit" value="Add Subcategory" class="btn btn-info">
                </div>

            </form>
        </div>
    </div>
@endsection