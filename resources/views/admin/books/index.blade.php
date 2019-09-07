
@extends('layouts.app')
@section('content')
    <div class="panel panel-primary">
        <div class="panel-heading">
            Books
        </div>
        @if(count($books)>0)
            <div class="panel-body">
                <table class="table table-hover table-striped table-bordered">
                    <tr >
                        <th>Name</th>
                        <th>Image</th>
                        <th>URL</th>
                        <th>Description</th>
                        <th>Size</th>
                        <th class="text-center">Edit</th>
                        <th class="text-center">Delete</th>
                    <tr>
                    @foreach($books as $book)
                        <tr>
                            <td>{{$book->name}}</td>
                            <td>{{str_limit($book->download_link,20)}}</td>
                            <td><img src="/{{$book->image}}" alt="{{$book->title}}" width="50px" height="70px"></td>
                            <td>{{str_limit($book->description,50)}}</td>
                            <td>{{$book->size / 1000}}MB</td>
                            <td class="text-center">
                                <a href="{{route('books.edit',$book->id)}}" class="btn btn-primary btn-sm">
                                    <span class="glyphicon glyphicon-edit"></span>
                                </a>
                            </td>
                            <td class="text-center">
                                <form action="{{route('books.destroy',$book->id)}}" class="form"
                                      method="POST">
                                    {{csrf_field()}}
                                    {{method_field('DELETE')}}
                                    <button class="btn btn-danger btn-xs" type="submit">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </table>
                <div class="text-center">{{$books->render()}}</div>
            </div>
        @else
            <div class="panel-body">
                <div class="alert alert-danger"> NO <strong>Posts</strong> added</div>
            </div>
        @endif
    </div>
@endsection