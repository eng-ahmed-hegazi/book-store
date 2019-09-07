
@extends('layouts.app')
@section('content')
    <div class="panel panel-primary">
        <div class="panel-heading">
            OUR CATEGORIES
        </div>
        @if(count($categories)>0)
            <div class="panel-body">
                <table class="table table-hover table-striped">
                    <tr class="bg-light">
                        <th>ID</th>
                        <th>NAME</th>
                        <th class="text-center">EDIT</th>
                        <th class="text-center">DELETE</th>
                    <tr>
                    @foreach($categories as $cat)
                        <tr>
                            <td>{{$cat->id}}</td>
                            <td>{{$cat->name}}</td>
                            <td class="text-center">
                                <a href="{{route('categories.edit',$cat->id)}}" class="btn btn-primary btn-sm">
                                    <span class="glyphicon glyphicon-edit"></span>
                                </a>
                            </td>
                            <td class="text-center">
                                <form action="{{route('categories.destroy',$cat->id)}}" class="form"
                                      method="POST">
                                    {{csrf_field()}}
                                    {{method_field('DELETE')}}
                                    <button class="btn btn-danger btn-sm" type="submit"><span class="glyphicon glyphicon-trash"></span></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </table>
                <div class="text-center">{{$categories->render()}}</div>
            </div>
        @else
            <div class="panel-body">
                <div class="alert alert-danger"> NO <strong>Categories</strong> added</div>
            </div>
        @endif
    </div>
@endsection