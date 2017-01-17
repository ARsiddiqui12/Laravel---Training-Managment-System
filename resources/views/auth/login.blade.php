@extends('layouts.app')

@section('content')

    <div class="logo">
        <span style="font-size:35px; color:white;font-weight: bold;">SMART</span><br>
        <span style="font-size:15px; color:white;font-weight: bold;">Training Management System</span>
    </div>

    <div class="content">



        <!-- BEGIN LOGIN FORM -->
        <form class="login-form" role="form" method="POST" action="{{ url('/login') }}">
            {{ csrf_field() }}
            <h3 class="form-title font-green">Sign In</h3>

            @if ($errors->has('username'))
            <span class="help-block">

                <div class="alert alert-warning" role="alert" style="font-style: italic;">Error: {{ $errors->first('username') }}</div>
            </span>
            @endif

            @if ($errors->has('password'))
            <span class="help-block">
            <div class="alert alert-warning" role="alert">Error: {{ $errors->first('password') }}</div>
            </span>
            @endif

            <div class="form-group">
                <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
                <label class="control-label visible-ie8 visible-ie9">Username or Employee Id</label>
                <input id="username" placeholder="Enter Username / Email / Employee Id" type="text" class="form-control" name="username" value="{{ old('username') }}" required autofocus>
            </div>
            <div class="form-group">
                <label class="control-label visible-ie8 visible-ie9">Password</label>
                <input id="password"  type="password" placeholder="Enter Password" class="form-control" name="password" required>

            </div>
            <div class="form-actions">
                <button type="submit" class="btn green uppercase">Login</button>
                <label class="rememberme check mt-checkbox mt-checkbox-outline">
                    <input type="checkbox" name="remember" />Remember
                    <span></span>
                </label>
                <a href="#" class="forget-password">Forgot Password?</a>
            </div>

            <div class="create-account">
                <p style="font-weight: bold;color:white;">
                    SMART - Training Management System
                </p>
            </div>
        </form>
        <!-- END LOGIN FORM -->



    </div>

    <div class="copyright"> 2017 © AR Siddiqui. SMART - Training Management System . </div>



{{--<div class="container">--}}
    {{--<div class="row">--}}
        {{--<div class="col-md-8 col-md-offset-2">--}}
            {{--<div class="panel panel-default">--}}
                {{--<div class="panel-heading">Login</div>--}}
                {{--<div class="panel-body">--}}
                    {{--<form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">--}}
                        {{--{{ csrf_field() }}--}}

                        {{--<div class="form-group{{ $errors->has('employeeid') ? ' has-error' : '' }}">--}}
                            {{--<label for="email" class="col-md-4 control-label">Employee Id</label>--}}

                            {{--<div class="col-md-6">--}}
                                {{--<input id="employeeid" type="text" class="form-control" name="employeeid" value="{{ old('employeeid') }}" required autofocus>--}}

                                {{--@if ($errors->has('employeeid'))--}}
                                    {{--<span class="help-block">--}}
                                        {{--<strong>{{ $errors->first('employeeid') }}</strong>--}}
                                    {{--</span>--}}
                                {{--@endif--}}
                            {{--</div>--}}
                        {{--</div>--}}

                        {{--<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">--}}
                            {{--<label for="password" class="col-md-4 control-label">Password</label>--}}

                            {{--<div class="col-md-6">--}}
                                {{--<input id="password" type="password" class="form-control" name="password" required>--}}

                                {{--@if ($errors->has('password'))--}}
                                    {{--<span class="help-block">--}}
                                        {{--<strong>{{ $errors->first('password') }}</strong>--}}
                                    {{--</span>--}}
                                {{--@endif--}}
                            {{--</div>--}}
                        {{--</div>--}}

                        {{--<div class="form-group">--}}
                            {{--<div class="col-md-6 col-md-offset-4">--}}
                                {{--<div class="checkbox">--}}
                                    {{--<label>--}}
                                        {{--<input type="checkbox" name="remember"> Remember Me--}}
                                    {{--</label>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}

                        {{--<div class="form-group">--}}
                            {{--<div class="col-md-8 col-md-offset-4">--}}
                                {{--<button type="submit" class="btn btn-primary">--}}
                                    {{--Login--}}
                                {{--</button>--}}

                                {{--<a class="btn btn-link" href="{{ url('/password/reset') }}">--}}
                                    {{--Forgot Your Password?--}}
                                {{--</a>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</form>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
{{--</div>--}}
@endsection
