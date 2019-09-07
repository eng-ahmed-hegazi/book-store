
@extends('layouts.app')
@section('content')
    <div class="panel panel-primary">
        <div class="panel-heading">
            OUR CATEGORIES
        </div>
        @if(count($subcategories)>0)
            <div class="panel-body">
                <table class="table table-hover table-striped">
                    <tr class="bg-light">
                        <th>ID</th>
                        <th>NAME</th>
                        <th class="text-center">EDIT</th>
                        <th class="text-center">DELETE</th>
                    <tr>
                    @foreach($subcategories as $subcategory)
                        <tr>
                            <td>{{$subcategory->id}}</td>
                            <td>{{$subcategory->name}}</td>
                            <td class="text-center">
                                <a href="{{route('subcategories.edit',$subcategory->id)}}" class="btn btn-primary btn-sm">
                                    <span class="glyphicon glyphicon-edit"></span>
                                </a>
                            </td>
                            <td class="text-center">
                                <form action="{{route('subcategories.destroy',$subcategory->id)}}" class="form"
                                      method="POST">
                                    {{csrf_field()}}
                                    {{method_field('DELETE')}}
                                    <button class="btn btn-danger btn-sm" type="submit"><span class="glyphicon glyphicon-trash"></span></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </table>
                <div class="text-center">{{$subcategories->render()}}</div>
            </div>
        @else
            <div class="panel-body">
                <div class="alert alert-danger"> NO <strong>Categories</strong> added</div>
            </div>
        @endif
    </div>
@endsection