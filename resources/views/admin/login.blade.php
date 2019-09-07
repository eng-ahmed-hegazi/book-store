<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
</head>
<style>
    .bg{
        background: url({{asset('9.jpg')}});
        height: 314px;
    }
    label{
        color: #fff;
    }
</style>
<body>
    <div class="container-fluid  text-center">
       <div class="row" style="min-height: 250px">
           <div class="page-header text-center" style="padding:100px">
               <img src="{{ asset('logo.png') }}" alt="" height="70">
           </div>
       </div>
        <div class="row bg" style="padding: 15px">
                <form method="POST" action="{{ route('admin.login') }}" class="col-lg-push-4 col-lg-4">
                    @csrf

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
                        @if ($errors->has('email'))
                            <span class="invalid-feedback">
                                    <strong>{{ $errors->first('email') }}</strong>
                        </span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="password"> Password</label>
                        <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                        @if ($errors->has('password'))
                            <span class="invalid-feedback">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                        @endif
                    </div>
                    

                    <div class="form-group">
                        <button type="submit" class="btn btn-danger">
                            Login
                        </button>
                    </div>
            </form>
        </div>
    </div>
    <script src="{{asset('js/jquery.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
</body>
</html>