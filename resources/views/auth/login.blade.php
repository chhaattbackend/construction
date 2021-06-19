<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{ config('app.name') }}</title>

    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css"
        integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog=="
        crossorigin="anonymous" />

    {{-- <link href="{{ mix('css/app.css') }}" rel="stylesheet"> --}}
    <link href="{{ asset('css/login.css') }}" rel="stylesheet">
</head>
<style>
    .login-card-body{
        background: transparent;
    }
</style>
<body class="hold-transition login-page" style="min-height: 341.688px;">
    <div class="login-box">
        <center>
            <div>
                <img style="width: 100px" src="https://chhatt.com/static/media/Logo.0a58bee2.png" alt="AdminLTE Logo"
                    class="brand-image img-bordered-smm img-roundedm elevation-3">
            </div>
        </center>
        <div class="login-logo">
            <a href="{{ url('/home') }}"><b>{{ config('app.name') }}</b></a>
        </div>
        <!-- /.login-logo -->

        <!-- /.login-box-body -->
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Sign in to start your session</p>

                <form method="post" action="{{ url('/login') }}">
                    @csrf

                    <div class="input-group mb-3">
                        <input type="email" name="email" value="{{ old('email') }}" placeholder="Email"
                            class="form-control @error('email') is-invalid @enderror">
                        <div class="input-group-append">
                            <div class="input-group-text"><span class="fas fa-envelope"></span></div>
                        </div>
                        @error('email')
                            <span class="error invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="input-group mb-3">
                        <input type="password" name="password" placeholder="Password"
                            class="form-control @error('password') is-invalid @enderror">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                        @error('password')
                            <span class="error invalid-feedback">{{ $message }}</span>
                        @enderror

                    </div>


                    <div class="row">
                        <div class="col-8">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="remember">
                                <label class="custom-control-label" for="remember">Remember Me</label>
                            </div>
                        </div>

                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                        </div>

                    </div>
                </form>
                @if($errors->any())
                <h6 class="text-white">{{$errors->first()}}</h6>
                @endif
                <p class="mb-1">
                    <a href="{{ route('password.request') }}">I forgot my password</a>
                </p>
                <p class="mb-0">
                    <a href="{{ route('register') }}" class="text-center">Register a new membership</a>
                </p>
            </div>
            <!-- /.login-card-body -->
        </div>

    </div>
    <!-- /.login-box -->

    <script src="{{ mix('js/app.js') }}" defer></script>
    {{-- <style>
        .custom-checkbox .custom-control-label::before {
            border-radius: 0.35rem;
        }

        .login-page,
        .register-page {
            align-items: center;
            background: #e9ecef;
            background-image: url("https://images.unsplash.com/photo-1507233701980-62a5bef7f2f9?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=889&q=80");
            display: flex;
            flex-direction: column;
            height: 100vh;
            justify-content: center;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
        }

        .login-box,
        .register-box {
            padding: 10px;
            width: 500px;
            background-image: linear-gradient(to right, rgba(70, 150, 235, 0.282), rgba(255, 255, 255, 0.624), rgba(70, 150, 235, 0.282));
            border-radius: 20px;
            border: 1px outset #212529ab;
        }

        .login-logo,
        .register-logo {
            font-size: 2.1rem;
            font-weight: 300;
            margin-bottom: 0.9rem;
            text-align: center;
        }

        .img-roundedm {
            border-radius: 1.25rem;
        }

        .img-bordered-smm {
            padding: 3px;
        }





        .login-card-body,
        .register-card-body {

            border-top: 0;
            color: #001f3f;
            padding: 20px;
        }

        .login-box-msg,
        .register-box-msg {
            margin: 0;
            padding: 0 20px 20px;
            text-align: center;
        }

        .btn-primary:hover {
            color: #ffffff;
            background-color: #001f3f;
            border-color: #001f3f;
        }

        .btn-primary {
            color: #ffffff;
            background-color: #001f3fd6;
            border-color: #001f3f8c;
            box-shadow: none;
        }

        span,
        a {
            color: #001f3f;
            text-decoration: none;
            background-color: transparent;
        }

    </style> --}}

    {{-- <style>
        .login-page {
            -webkit-tap-highlight-color: rgba(0, 0, 0, 0);
            --blue: #007bff;
            --indigo: #6610f2;
            --purple: #6f42c1;
            --pink: #e83e8c;
            --red: #dc3545;
            --orange: #fd7e14;
            --yellow: #ffc107;
            --green: #28a745;
            --teal: #20c997;
            --cyan: #17a2b8;
            --white: #ffffff;
            --gray: #6c757d;
            --gray-dark: #343a40;
            --primary: #007bff;
            --secondary: #6c757d;
            --success: #28a745;
            --info: #17a2b8;
            --warning: #ffc107;
            --danger: #dc3545;
            --light: #f8f9fa;
            --dark: #343a40;
            --breakpoint-xs: 0;
            --breakpoint-sm: 576px;
            --breakpoint-md: 768px;
            --breakpoint-lg: 992px;
            --breakpoint-xl: 1200px;
            --font-family-sans-serif: "Source Sans Pro", -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol";
            --font-family-monospace: SFMono-Regular, Menlo, Monaco, Consolas, "Liberation Mono", "Courier New", monospace;
            box-sizing: border-box;
            margin: 0;
            font-family: "Source Sans Pro", -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol";
            font-size: 1rem;
            font-weight: 400;
            line-height: 1.5;
            color: #212529;
            text-align: left;
            align-items: center;
            background: #e9ecef;
            background-image: url("https://images.pexels.com/photos/1252869/pexels-photo-1252869.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940");
            display: flex;
            flex-direction: column;
            height: 100vh;
            justify-content: center;
            background-size: cover;
            min-height: 341.688px;
        }

        .login-box {
            -webkit-tap-highlight-color: rgba(0, 0, 0, 0);
            --blue: #007bff;
            --indigo: #6610f2;
            --purple: #6f42c1;
            --pink: #e83e8c;
            --red: #dc3545;
            --orange: #fd7e14;
            --yellow: #ffc107;
            --green: #28a745;
            --teal: #20c997;
            --cyan: #17a2b8;
            --white: #ffffff;
            --gray: #6c757d;
            --gray-dark: #343a40;
            --primary: #007bff;
            --secondary: #6c757d;
            --success: #28a745;
            --info: #17a2b8;
            --warning: #ffc107;
            --danger: #dc3545;
            --light: #f8f9fa;
            --dark: #343a40;
            --breakpoint-xs: 0;
            --breakpoint-sm: 576px;
            --breakpoint-md: 768px;
            --breakpoint-lg: 992px;
            --breakpoint-xl: 1200px;
            --font-family-sans-serif: "Source Sans Pro", -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol";
            --font-family-monospace: SFMono-Regular, Menlo, Monaco, Consolas, "Liberation Mono", "Courier New", monospace;
            font-family: "Source Sans Pro", -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol";
            font-size: 1rem;
            font-weight: 400;
            line-height: 1.5;
            color: #212529;
            text-align: left;
            box-sizing: border-box;
            padding: 10px;
            width: 500px;
            background-image: linear-gradient(to right, rgba(70, 150, 235, 0.282), rgba(255, 255, 255, 0.5), rgba(70, 150, 235, 0.282));
            border-radius: 20px;
            border: 1px outset #212529ab;
        }

        .login-logo {
            -webkit-tap-highlight-color: rgba(0, 0, 0, 0);
            --blue: #007bff;
            --indigo: #6610f2;
            --purple: #6f42c1;
            --pink: #e83e8c;
            --red: #dc3545;
            --orange: #fd7e14;
            --yellow: #ffc107;
            --green: #28a745;
            --teal: #20c997;
            --cyan: #17a2b8;
            --white: #ffffff;
            --gray: #6c757d;
            --gray-dark: #343a40;
            --primary: #007bff;
            --secondary: #6c757d;
            --success: #28a745;
            --info: #17a2b8;
            --warning: #ffc107;
            --danger: #dc3545;
            --light: #f8f9fa;
            --dark: #343a40;
            --breakpoint-xs: 0;
            --breakpoint-sm: 576px;
            --breakpoint-md: 768px;
            --breakpoint-lg: 992px;
            --breakpoint-xl: 1200px;
            --font-family-sans-serif: "Source Sans Pro", -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol";
            --font-family-monospace: SFMono-Regular, Menlo, Monaco, Consolas, "Liberation Mono", "Courier New", monospace;
            font-family: "Source Sans Pro", -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol";
            line-height: 1.5;
            color: #212529;
            box-sizing: border-box;
            font-size: 2.1rem;
            font-weight: 300;
            margin-bottom: 0.9rem;
            text-align: center;
        }

        .card {
            -webkit-tap-highlight-color: rgba(0, 0, 0, 0);
            --blue: #007bff;
            --indigo: #6610f2;
            --purple: #6f42c1;
            --pink: #e83e8c;
            --red: #dc3545;
            --orange: #fd7e14;
            --yellow: #ffc107;
            --green: #28a745;
            --teal: #20c997;
            --cyan: #17a2b8;
            --white: #ffffff;
            --gray: #6c757d;
            --gray-dark: #343a40;
            --primary: #007bff;
            --secondary: #6c757d;
            --success: #28a745;
            --info: #17a2b8;
            --warning: #ffc107;
            --danger: #dc3545;
            --light: #f8f9fa;
            --dark: #343a40;
            --breakpoint-xs: 0;
            --breakpoint-sm: 576px;
            --breakpoint-md: 768px;
            --breakpoint-lg: 992px;
            --breakpoint-xl: 1200px;
            --font-family-sans-serif: "Source Sans Pro", -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol";
            --font-family-monospace: SFMono-Regular, Menlo, Monaco, Consolas, "Liberation Mono", "Courier New", monospace;
            font-family: "Source Sans Pro", -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol";
            font-size: 1rem;
            font-weight: 400;
            line-height: 1.5;
            color: #212529;
            text-align: left;
            box-sizing: border-box;
            position: relative;
            display: flex;
            flex-direction: column;
            min-width: 0;
            background-clip: border-box;
            border: 0 solid rgba(0, 0, 0, 0.125);
            border-radius: 0.25rem;
            box-shadow: 0 0 1px rgba(0, 0, 0, 0.125), 0 1px 3px rgba(0, 0, 0, 0.2);
            margin-bottom: 1rem;
            background-color: transparent;
        }

        .login-card-body {
            -webkit-tap-highlight-color: rgba(0, 0, 0, 0);
            --blue: #007bff;
            --indigo: #6610f2;
            --purple: #6f42c1;
            --pink: #e83e8c;
            --red: #dc3545;
            --orange: #fd7e14;
            --yellow: #ffc107;
            --green: #28a745;
            --teal: #20c997;
            --cyan: #17a2b8;
            --white: #ffffff;
            --gray: #6c757d;
            --gray-dark: #343a40;
            --primary: #007bff;
            --secondary: #6c757d;
            --success: #28a745;
            --info: #17a2b8;
            --warning: #ffc107;
            --danger: #dc3545;
            --light: #f8f9fa;
            --dark: #343a40;
            --breakpoint-xs: 0;
            --breakpoint-sm: 576px;
            --breakpoint-md: 768px;
            --breakpoint-lg: 992px;
            --breakpoint-xl: 1200px;
            --font-family-sans-serif: "Source Sans Pro", -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol";
            --font-family-monospace: SFMono-Regular, Menlo, Monaco, Consolas, "Liberation Mono", "Courier New", monospace;
            font-family: "Source Sans Pro", -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol";
            font-size: 1rem;
            font-weight: 400;
            line-height: 1.5;
            text-align: left;
            box-sizing: border-box;
            flex: 1 1 auto;
            min-height: 1px;
            border-top: 0;
            color: #001f3f;
            padding: 20px;
        }

        .card-body {
            -webkit-tap-highlight-color: rgba(0, 0, 0, 0);
            --blue: #007bff;
            --indigo: #6610f2;
            --purple: #6f42c1;
            --pink: #e83e8c;
            --red: #dc3545;
            --orange: #fd7e14;
            --yellow: #ffc107;
            --green: #28a745;
            --teal: #20c997;
            --cyan: #17a2b8;
            --white: #ffffff;
            --gray: #6c757d;
            --gray-dark: #343a40;
            --primary: #007bff;
            --secondary: #6c757d;
            --success: #28a745;
            --info: #17a2b8;
            --warning: #ffc107;
            --danger: #dc3545;
            --light: #f8f9fa;
            --dark: #343a40;
            --breakpoint-xs: 0;
            --breakpoint-sm: 576px;
            --breakpoint-md: 768px;
            --breakpoint-lg: 992px;
            --breakpoint-xl: 1200px;
            --font-family-sans-serif: "Source Sans Pro", -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol";
            --font-family-monospace: SFMono-Regular, Menlo, Monaco, Consolas, "Liberation Mono", "Courier New", monospace;
            font-family: "Source Sans Pro", -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol";
            font-size: 1rem;
            font-weight: 400;
            line-height: 1.5;
            text-align: left;
            box-sizing: border-box;
            flex: 1 1 auto;
            min-height: 1px;
            border-top: 0;
            color: #001f3f;
            padding: 20px;
        }

        .brand-image {
            width: 100px;
            border-radius: 13px;
            padding: 4px;
        }

        .btn-block {
            background-color: #001f3fd6;
            /* border: 0px; */
            border-color: #001f3f8c;
        }

        span,
        a {
            color: #001f3fd6;

        }

    </style> --}}
    {{-- <style>
        .custom-checkbox .custom-control-label::before {
            border-radius: 0.35rem;
        }

        .login-page,
        .register-page {
            align-items: center;
            background: #e9ecef;
            background-image: url("https://images.pexels.com/photos/1252869/pexels-photo-1252869.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940");
            display: flex;
            flex-direction: column;
            height: 100vh;
            justify-content: center;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
        }

        .login-box,
        .register-box {
            padding: 10px;
            width: 500px;
            background-image: linear-gradient(to right, rgba(70, 150, 235, 0.282), rgba(255, 255, 255, 0.624), rgba(70, 150, 235, 0.282));
            border-radius: 20px;
            border: 1px outset #212529ab;
        }

        .login-logo,
        .register-logo {
            font-size: 2.1rem;
            font-weight: 300;
            margin-bottom: 0.9rem;
            text-align: center;
        }

        .img-roundedm {
            border-radius: 1.25rem;
        }

        .img-bordered-smm {
            padding: 3px;
        }

        .card {
            position: relative;
            display: flex;
            flex-direction: column;
            min-width: 0;
            word-wrap: break-word;
            background-clip: border-box;
            border: 0 solid rgba(0, 0, 0, 0.125);
            border-radius: 0.25rem;
            background-color: transparent;
        }

        .card-body {
            flex: 1 1 auto;
            min-height: 1px;
            padding: 1.25rem;
        }

        .login-card-body,
        .register-card-body {

            border-top: 0;
            color: #001f3f;
            padding: 20px;
        }

        .login-box-msg,
        .register-box-msg {
            margin: 0;
            padding: 0 20px 20px;
            text-align: center;
        }

        .btn-primary:hover {
            color: #ffffff;
            background-color: #001f3f;
            border-color: #001f3f;
        }

        .btn-primary {
            color: #ffffff;
            background-color: #001f3fd6;
            border-color: #001f3f8c;
            box-shadow: none;
        }

        span,
        a {
            color: #001f3f;
            text-decoration: none;
            background-color: transparent;
        }

    </style> --}}
</body>

</html>
