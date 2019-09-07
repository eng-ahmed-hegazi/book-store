
@extends('layouts.app');
@section('content')
    @include('admin.includes.errors')
    <div class="panel panel-primary">
        <div class="panel-heading">
            CREATE NEW TAG
        </div>
        <div class="panel-body">
            <form action="{{route('tags.store')}}" method="post" class="form">
                {{csrf_field()}}
                <div class="form-group">
                    <label for="tag">Title</label>
                    <input type="text" value="{{old('tag')}}" name="tag" placeholder="enter tag" class="form-control">
                </div>

                <div class="formgroup text-center">
                    <input type="submit" value="create new tag" class="btn btn-primary">
                </div>
            </form>
        </div>
    </div>
@endsection