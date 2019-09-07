<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/toastr.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/fonts.css')}}">
    {{--used for the summernote imported only when call the section CSSfor Post/create--}}
</head>
<style>
    body{
        font-family: Cairo;
        direction: rtl;
        overflow-x: hidden;
    }
    .display-topleft{position:absolute;left:15px;top:0;
        background: #000;color: #fff;padding: 10px}
    .display-topright{
        background: #000;color: #fff;padding: 5px;}
    .side a:hover{
        text-decoration: none;

    }
    .bg{
        background: url({{asset('9.jpg')}});
    }

    .bg1{
        width: 200px;
        text-align: right;
        padding: 10px;

        background: url({{asset('9.jpg')}});
        display: none;
    }
    .bg1 li{
        height: 30px;
    }
    .bg1 li:hover {
        background: #244963;
        padding-right: 7px;
        transition:all 0.5s linear;
    }
    .bg1 li:hover a{
        text-decoration: none;
    }
    .drop{
        width: 120px;
        text-align: center;
    }
    .drop:hover{
        transition:all 0.5s linear;
        display: block;
    }
    .drop:hover .bg1{

        transition:all 0.7s ease-in-out;
        display: block;
        box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    }
    .bgfooter{
        background: url({{asset('9.jpg')}});
        width: 100%;
        overflow: hidden;
        margin-top: 40px;
        padding: 40px;
        padding-bottom: 10px;
    }
    .bgfooter li{
        height: 25px;
    }
    .bgfooter li:hover a{
        text-decoration: none;
        padding-right: 10px;
        transition:all 0.7s ease-in-out;
    }

    .line{
        background: url({{asset('line_bar.png')}});
    }
    .search input{
        width: 130px;
        box-sizing: border-box;
        border-radius: 4px;
        font-size: 16px;

        padding: 12px 20px 12px 40px;
        -webkit-transition: width 0.4s ease-in-out;
        transition: width 0.4s ease-in-out;
    }
    .search input:focus{
       padding-right: 60px;
        background: #fff178;
        transition:all 0.5s ease-in-out;

    }
    .images:hover{
        opacity: 0.7;
        transition:all 0.5s ease-in-out;
    }
    .side li:hover a{
        padding-right: 10px;
        color: #244a61;
        font-weight: bold;
        transition:all 0.5s ease-in-out;
    }
    /*rotate*/
    .rotate {

        -webkit-transition: width 1s, height 1s, -webkit-transform 1s; /* Safari */
        transition: width 1s, height 1s, transform 1s;
    }

    .rotate:hover {
        -webkit-transform: rotate(360deg) scale(1.1); /* Safari */
        transform: rotate(360deg) scale(1.1);
        color: #000;
        background: #fff178;
    }
    .scale {
        transition: width 0.5s, height 0.5s, transform 0.5s;
    }

    .scale:hover {
        transform:scale(1.2);
        color: #000;
        background: #fff178;
    }
    @media screen and (max-width: 1000px) {
        #myNavbar {
            background: url({{asset('9.jpg')}});
            margin-top: 20px;
            overflow: hidden;
            max-height: 600px;
        }
        .image_footer{
            display: none;
        }
        #dropd{
            display: none;
        }
    }
    .contain {
        position: relative;
    }

    .image {
        opacity: 1;
        display: block;
        width: 100%;
        height: auto;
        transition: .5s ease;
        backface-visibility: hidden;
    }

    .middle {
        transition: .5s ease;
        opacity: 0;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        -ms-transform: translate(-50%, -50%)
    }

    .contain:hover .image {
        opacity: 0.3;
    }

    .contain:hover .middle {
        opacity: 1;
    }

    .text {
        background-color: #1a1a1a;
        color: white;
        font-size: 16px;
        padding: 16px 16px;
    }
    #yourBtn{
        width: 150px;
        padding: 10px;
        text-align: center;
        color:#fff;
        background-color: #1a1a1a;
        cursor:pointer;
    }
</style>
<body>
<nav class="navbar navbar-inverse navbar-fixed-top bg" style="box-shadow: 0 1px 20px rgba(0, 0, 0, 0.3);height: 70px;">
    <div class="container-fluid">
        <div class="navbar-header navbar-right" >
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/" style="margin: 0;padding: 2px">
                <img src="{{asset(trans('main.img'))}}" alt="" class="img-responsive">
            </a>
        </div>
            <div class="collapse navbar-collapse" id="myNavbar">
                    <form class="navbar-form navbar-left col-lg-2" style="direction: ltr" action="{{route('search.single')}}" method="post">
                        {{csrf_field()}}
                        <div class="input-group search">
                            <div class="input-group-btn ">
                                <button class="btn btn-default" type="submit">
                                    <i class="glyphicon glyphicon-search"></i>
                                </button>
                            </div>
                            <input type="text" class="form-control" placeholder="ابحـــــــــــــث ..." name="query">

                        </div>
                    </form>
                    <ul class="nav navbar-nav navbar-right pull-right">
                        @foreach(LaravelLocalization::getSupportedLocales() as $key=> $value)
                            <li>
                                <a href="{{  LaravelLocalization::getLocalizedURL($key) }}" >
                                    {{$value['native']}}
                                </a>
                            </li>
                        @endforeach
                        @guest
                            <li><a class="dropdown-item" href="{{ route('login') }}"  style="color: #fff;">دخـول</a></li>
                            <li><a class="dropdown-item" href="{{ route('register') }}"  style="color: #fff;">تسجـيل</a></li>
                        @else
                            <li class="dropdown drop" id="dropd">
                                <a id="navbarDropdown " class="dropdown-toggle" style="color: #fff" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="text-capitalize">{{ Auth::user()->name }}</span>
                                </a>

                                <ul class="dropdown-menu list-unstyled" aria-labelledby="navbarDropdown">
                                    <li>
                                        <a class="dropdown-item" href="{{ route('logout') }}"  style="color: #000;"
                                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            خـــــــــــــروج
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="{{ route('profile.create') }}"  style="color: #000;">
                                            بروفايل
                                        </a>
                                    </li>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </ul>
                            </li>
                        @endguest
                    <li id="dropd"><a href="{{route('contact')}}" style="color: #fff;">تواصل معنا</a></li>
                    <li id="dropd" class="hidden-md"><a href="{{route('about')}}" style="color: #fff;">{{trans('main.logo')}}</a></li>

                    <li class="drop " id="dropd">
                        <a  href="#" style="color: #fff;">الأقسـام</a>
                        <ul class=" bg1 list-unstyled">
                            @foreach($categories as $category)
                            <li><a href="{{route('category.single',$category)}}" class="text-right " style="color: #fff;">{{$category->name}}</a></li>
                            @endforeach
                        </ul>
                    </li>
                    <li style="color: #fff;"><a href="/">الرئيسية</a></li>
                </ul>


            </div>
    </div>
</nav>

<div class="container-fluid" style="min-height: 300px">
    @yield('content')
</div>
<div class="bgfooter">
    <div class="row">
        <ul class="list-unstyled col-lg-4 pull-right links side">
            @foreach($categories as $category)
                <li style="line-height: 25px">
                    <span class="glyphicon glyphicon-chevron-left" style="width: 20px;color: #fff"></span>
                    <a href="{{route('category.single',$category)}}" class="text-right" style="color: #fff">
                          {{$category->name}}
                    </a>
                </li>
            @endforeach
        </ul>
        <ul class="list-unstyled col-lg-4 pull-right links" style="line-height: 25px">
            <a href="/" class="image_footer"><img src="{{asset('logo_footer.png')}}" alt=""></a>
            <li><span class="glyphicon glyphicon-chevron-left" style="width: 20px;color: #fff"></span><a href="#"  style="color: #fff">الشـــــــروط والاحكــام</a></li>
            <li><span class="glyphicon glyphicon-chevron-left" style="width: 20px;color: #fff"></span><a href="#"  style="color: #fff">اتـــــصل بنــــــــا </a></li>
            <li><span class="glyphicon glyphicon-chevron-left" style="width: 20px;color: #fff"></span><a href="#"  style="color: #fff">انضــــــم الينــــــا</a></li>
            <li><span class="glyphicon glyphicon-chevron-left" style="width: 20px;color: #fff"></span><a href="#"  style="color: #fff"> عــــن الموقـــــــع</a></li>

        </ul>
        <ul class="list-unstyled col-lg-4 pull-right links">
            <li><a href="#"  style="color: #fff"><span class="fa fa-facebook" style="width: 20px;color: #fff"></span>    فيـــــس بوك  </a></li>
            <li><a href="#"  style="color: #fff"><span class="fa fa-twitter" style="width: 20px;color: #fff"></span>   تويتـــــــر  </a></li>
            <li><a href="#"  style="color: #fff"><span class="fa fa-google-plus" style="width: 20px;color: #fff"></span>     جوجـــل بلــس  </a></li>
            <li><a href="#"  style="color: #fff"><span class="fa fa-youtube" style="width: 20px;color: #fff"></span>    يوتيـــــــوب  </a></li>
        </ul>
    </div>
    <div class="row text-center">
        <span style="color: #fff;background: #2c526c;border-radius: 5px" class="col-lg-offset-4 col-lg-4">جميـــع الحــــقوق محفوظـــة@2018 للمطــــــورAhmed Hegazy  </span>
    </div>
</div>
<!-- Scripts -->
<script src="{{asset('js/app.js') }}"></script>
<script src="{{asset('js/jquery.min.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="{{asset('js/toastr.min.js')}}"></script>
<script type="text/javascript">
    function getFile(){
        document.getElementById("upfile").click();
    }
    function sub(obj){
        var file = obj.value;
        var fileName = file.split("\\");
        document.getElementById("yourBtn").innerHTML = fileName[fileName.length-1];
        document.myForm.submit();
        event.preventDefault();
    }
</script>
</body>
</html>