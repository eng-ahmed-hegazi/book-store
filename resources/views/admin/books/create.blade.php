@extends('layouts.app')
@section('content')
    @include('admin.includes.errors')
    <div class="panel panel-primary">
        <div class="panel-heading">
            ADD NEW BOOK
        </div>
        <div class="panel-body">
            <form action="{{route('books.store')}}" method="post" class="form" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" value="{{old('name')}}" name="name" placeholder="enter name" class="form-control">
                </div>
                <div class="form-group">
                    <label for="name">Author</label>
                    <input type="text" value="{{old('author')}}" name="author" placeholder="enter author" class="form-control">
                </div>
                <div class="form-group">
                    <label for="download_link">Download Link</label>
                    <input type="text" value="{{old('download_link')}}" name="download_link" placeholder="enter Download Link" class="form-control">
                </div>

                <div class="form-group">
                    <label for="Category">Category</label>
                    <select name="category_id" id="category" class="form-control" style="height: 35px">
                        @foreach($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="featured">Image</label>
                    <input type="file" value="{{old('image')}}" name="image" class="form-control">
                </div>
                <div class="form-group">
                    <label for="tags" class="text-uppercase">choose the tags</label>
                    @foreach($tags as $tag)
                        <div class="checkbox">
                            <label><input type="checkbox" value="{{$tag->id}}" name="tags[]">{{$tag->tag}}</label>
                        </div>
                    @endforeach
                </div>
                <div class="form-group">
                    <label for="content">Description</label>
                    <textarea rows="12" cols="60" id="description" name="description" placeholder="enter description" class="form-control">
                        {{old('description')}}
                    </textarea>
                </div>
                <div class="formgroup text-center">
                    <input type="submit" value="Add New Book" class="btn btn-primary">
                </div>
            </form>
        </div>
    </div>
@endsection
