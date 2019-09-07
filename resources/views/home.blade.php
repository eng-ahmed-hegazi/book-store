@extends('layouts.app')
@section('content')
    <div class="col-lg-4">
        <div class="panel panel-info">
            <div class="panel-heading text-center" >
               <strong> Books</strong>
            </div>
            <div class="panel-body text-center">
                <h1>{{$num_books}}</h1>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="panel panel-info">
            <div class="panel-heading text-center">
                <strong>Users</strong>
            </div>
            <div class="panel-body text-center">
                <h1>{{$num_users}}</h1>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="panel panel-info">
            <div class="panel-heading text-center">
                <strong>Categories</strong>
            </div>
            <div class="panel-body text-center">
                <h1>{{$num_categories}}</h1>
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="panel panel-info">
            <div class="panel-heading text-center">
                <strong>Tags</strong>
            </div>
            <div class="panel-body text-center">
                <h1>{{$num_tags}}</h1>
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="panel panel-info">
            <div class="panel-heading text-center">
                <strong>Sub Categories</strong>
            </div>
            <div class="panel-body text-center">
                <h1>{{$sub_categories}}</h1>
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="panel panel-info">
            <div class="panel-heading text-center">
                <strong>Comments</strong>
            </div>
            <div class="panel-body text-center">
                <h1>{{$comments}}</h1>
            </div>
        </div>
    </div>

@endsection