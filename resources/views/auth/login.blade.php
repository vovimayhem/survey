<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>{{ config('app.name', 'Intranet') }}</title>

    <!--===============================================================================================-->  
    <link rel="stylesheet" type="text/css" href="css/util.css">
    <link rel="stylesheet" type="text/css" href="css/login.css">
    <!--===============================================================================================-->
</head>
<body>
    
    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <div class="login100-form-title" style="background-image: url(img/bg-01.jpg);">
                    <span class="login100-form-title-1">
                        Survey Admin Portal Sign In
                    </span>
                </div>

                <form class="login100-form validate-form" method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="wrap-input100 validate-input m-b-26">
                        <span class="label-input100">Email</span>
                        <input class="input100 {{ $errors->has('email') ? ' is-invalid' : '' }}" type="text" name="email" placeholder="Enter username" value="{{ old('email') }}" required autofocus>
                        @if ($errors->has('email'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                        @endif
                    </div>

                    <div class="wrap-input100 validate-input m-b-18">
                        <span class="label-input100">Password</span>
                        <input class="input100 {{ $errors->has('password') ? ' is-invalid' : '' }}" type="password" name="password" placeholder="Enter username" value="{{ old('password') }}" required autofocus>
                        @if ($errors->has('password'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                        @endif
                    </div>

                    <div class="flex-sb-m w-full p-b-30">
                        <div class="contact100-form-checkbox">
                            <input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
                            <label class="label-checkbox100" for="ckb1">
                                Remember me
                            </label>
                        </div>
                    </div>

                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn" type="submit">
                            Login
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>