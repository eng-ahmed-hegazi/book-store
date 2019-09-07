@extends('front')
@section('content')
    <div class="container" style=";background: #f1f1f1;margin-top: 100px;">
        <h3 class="page-header text-center">
            دخـــــــول
        </h3>
        <div class="row" style="padding: 15px">
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="form-group">
                    <label for="email">الأيميـــــــــل</label>
                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
                    @if ($errors->has('email'))
                        <span class="invalid-feedback">
                                    <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group">
                    <label for="password">كلمة الســـــــــــر</label>
                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                    @if ($errors->has('password'))
                        <span class="invalid-feedback">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                    @endif
                </div>

                <div class="form-group ">
                    <div class="checkbox">

                        <label>
                             <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}><span style="padding: 20px">تذكرنـــــــى</span>
                        </label>
                    </div>
                </div>

                <div class="form-group">
                        <button type="submit" class="btn btn-primary">
                            دخـــــــول
                        </button>
                        <a class="btn btn-link" href="{{ route('password.request') }}">
                            هل نسيــت كلمــةالســــر ؟
                        </a>
                    </div>
                </div>
            </form>
    </div>
@endsection
