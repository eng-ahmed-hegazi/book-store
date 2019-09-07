{{-- used to display the tags Table --}}
@extends('layouts.app');
@section('content')
    <div class="panel panel-primary">
        <div class="panel-heading">
            Tags
        </div>
        @if(count($tags)>0)
            <div class="panel-body">
                <table class="table table-hover table-striped">
                    <tr >
                        <th>ID</th>
                        <th>Tag</th>
                        <th class="text-center">EDIT</th>
                        <th class="text-center">TRASH</th>
                    <tr>
                    @foreach($tags as $tag)
                        <tr>
                            <td>{{$tag->id}}</td>
                            <td><span class="glyphicon glyphicon-tag"></span> {{$tag->tag}}</td>
                            <td class="text-center">
                                <a href="{{route('tags.edit',$tag->id)}}" class="btn btn-primary btn-sm">
                                    <span class="glyphicon glyphicon-edit"></span>
                                </a>
                            </td>
                            <td class="text-center">
                                <form action="{{route('tags.destroy',$tag->id)}}" class="form"
                                      method="POST">
                                    {{csrf_field()}}
                                    {{method_field('DELETE')}}
                                    <button class="btn btn-danger btn-sm" type="submit"><span class="glyphicon glyphicon-trash"></span></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        @else
            <div class="panel-body">
                <div class="alert alert-danger"> NO <strong>Tags</strong> added</div>
            </div>
        @endif
    </div>
@endsection