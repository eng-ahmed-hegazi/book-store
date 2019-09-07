<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Styles -->

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/jquery.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/toastr.min.css')}}">
    {{--used for the summernote imported only when call the section CSSfor Post/create--}}
</head>
<style>
    body{
        font-family: Cairo;
        background: #273c75;
    }
</style>
@yield('style')
<body>
<div id="container-fluid">
    <nav class="navbar navbar-expand-md navbar-default navbar-laravel" style="background: #192a56;border: 0;border-radius: 0">
        <div class="container-fluid">
            <a class="navbar-brand text-center text-white" href="{{ url('/admin/dashboard') }}">
                <strong>BOOK</strong>STORE<br>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">

                </ul>
                <ul aria-labelledby="navbarDropdown" class="pull-right">
                    <a href="{{ route('admin.logout') }}" class="text-white"
                       onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                        Logout
                    </a>

                    <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </ul>

            </div>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3">
                <div class="clearfix"></div>
                <div>
                    <ul class="list-group pull-right col-lg-12" >
                        <li class="list-group-item" style="background: #192a56;border: 0">
                            <a href="{{route('home')}}" class="text-white">Main</a>
                        </li>
                        <li class="list-group-item" style="background: #192a46;border: 0">
                            <a href="{{route('books.index')}}" class="text-white">Books</a>
                        </li>
                        <li class="list-group-item" style="background: #192a56;border: 0">
                            <a href="{{route('books.create')}}" class="text-white"> Add Book</a>
                        </li>
                        <li class="list-group-item" style="background: #192a46;border: 0">
                            <a href="{{route('categories.index')}}" class="text-white">Categories</a>
                        </li>
                        <li class="list-group-item" style="background: #192a56;border: 0">
                            <a href="{{route('categories.create')}}" class="text-white">Add Category</a>
                        </li>
                        <li class="list-group-item" style="background: #192a46;border: 0">
                            <a href="{{route('tags.index')}}" class="text-white">Tags</a>
                        </li>
                        <li class="list-group-item" style="background: #192a56;border: 0">
                            <a href="{{route('tags.create')}}" class="text-white">Add Tag</a>
                        </li>
                        {{--<li class="list-group-item">
                            <a href="{{route('users.index')}}">Users</a>
                        </li>
                        <li class="list-group-item">
                            <a href="{{route('users.create')}}">Add User</a>
                        </li>
                                <li class="list-group-item">
                                    <a href="{{route('user.profile')}}">My Profile</a>
                                </li>
                            <li class="list-group-item">
                                <a href="{{route('user.profile.create')}}">Create Profile</a>
                            </li>
--}}
                        <li class="list-group-item" style="background: #192a46;border: 0">
                            <a href="{{route('settings.index')}}" class="text-white">Settings</a>
                        </li>
                    </ul>
                </div>

            </div>
            <div class="col-lg-8" style="margin-top: 15px">
                @yield('content')
            </div>
        </div>
    </div>
</div>

<!-- Scripts -->
<script src="{{asset('js/app.js') }}"></script>
<script src="{{asset('js/jquery.min.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="{{asset('js/toastr.min.js')}}"></script>
<script>
    @if(Session::has('success'))
    toastr.success("{{Session::get('success')}}");
    @endif

    @if(Session::has('info'))
    toastr.info("{{Session::get('info')}}");
    @endif
</script>
{{--used for the summernote imported only when call the section JS For Post/create --}}
@yield('script')
</body>
</html>
