@extends('layouts.app')
@section('content')
    @include('admin.includes.errors')
    <div class="panel panel-primary">
        <div class="panel-heading">
            EDIT BOOK
        </div>
        <div class="panel-body">
            <form action="{{route('books.update',$book->id)}}" method="post" class="form" enctype="multipart/form-data">
                {{csrf_field()}}
                {{method_field('PUT')}}
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" value="{{$book->name}}" name="name" placeholder="enter name" class="form-control">
                </div>
                <div class="form-group">
                    <label for="name">Author</label>
                    <input type="text" value="{{$book->author}}" name="author" placeholder="enter author" class="form-control">
                </div>
                <div class="form-group">
                    <label for="name">Download Link</label>
                    <input type="text" value="{{$book->download_link}}" name="download_link" placeholder="enter Download Link" class="form-control">
                </div>

                <div class="form-group">
                    <label for="Category">Category</label>
                    <select name="category_id" id="category" class="form-control" style="height: 35px">
                        @foreach($categories as $category)
                            <option value="{{$category->id}}"
                                    @if($category->id == $book->category->id)
                                    selected
                                    @endif
                            >{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="featured">Image</label>
                    <input type="file" name="image" class="form-control">
                </div>
                <div class="form-group">
                    <label for="tags" class="text-uppercase">choose the tags</label>
                    @foreach($tags as $tag)
                        <div class="checkbox">
                            <label><input type="checkbox" value="{{$tag->id}}" name="tags[]"
                                @foreach($book->tags as $t)
                                    @if($tag->id == $t->id)
                                      checked
                                    @endif
                                @endforeach
                                >{{$tag->tag}}</label>
                        </div>
                    @endforeach
                </div>
                <div class="form-group">
                    <label for="content">Description</label>
                    <textarea rows="12" cols="60" id="description" name="description" placeholder="enter description" class="form-control">
                        {{$book->description}}
                    </textarea>
                </div>
                <div class="formgroup text-center">
                    <input type="submit" value="Edit Book" class="btn btn-primary">
                </div>
            </form>
        </div>
    </div>
@endsection
