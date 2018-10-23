@extends('layoutsLogin.adm')

@section('content')

    <!--header-->
    <div class="header-w3l">
        <h1>Biblioteca Nelson Mandela</h1>
    </div>
    <!--//header-->
    <!--main-->
    <div class="main-w3layouts-agileinfo">
        <!--form-stars-here-->

        <div class="wthree-form">
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <h2>Preencha o formulário abaixo para efetuar o login</h2>
                {{--<form method="POST" action="{{ route('login') }}">--}}

                    <div class="form-sub-w3">
                        <input id="email" type="text" placeholder="Email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus  >
                        {{--<input type="text" name="Username" placeholder="Username " required="" />--}}
                        @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                        <div class="icon-w3">
                            <i class="fa fa-user" aria-hidden="true"></i>
                        </div>
                    </div>

                    <div class="form-sub-w3">
                        <input id="password" type="password" placeholder="Senha" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                        @if ($errors->has('password'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                        <div class="icon-w3">
                            <i class="fa fa-unlock-alt" aria-hidden="true"></i>
                        </div>
                    </div>

                    <div class="anim">
                        <div class="col-md-6 offset-md-4">
                            <div class="form-check">
                                 <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                </label>

                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>


                            </div>

                        </div>
                    </div>

                    {{--<div class="form-group row mb-0">--}}
                        {{--<div class="col-md-8 offset-md-4">--}}
                            {{--<button type="submit" class="btn btn-primary">--}}
                                {{--{{ __('Login') }}--}}
                            {{--</button>--}}

                            {{--<a class="btn btn-link" href="{{ route('password.request') }}">--}}
                                {{--{{ __('Forgot Your Password?') }}--}}
                            {{--</a>--}}
                        {{--</div>--}}
                    {{--</div>--}}

                    <div class="submit-agileits">
                        <input type="submit" value="{{ __('Login') }}">

                    </div>

            </form>

        </div>
        <!--//form-ends-here-->

    </div>



{{--<div class="container">--}}
    {{--<div class="row justify-content-center">--}}
        {{--<div class="col-md-8">--}}
            {{--<div class="card">--}}
                {{--<div class="card-header">{{ __('Login') }}</div>--}}

                {{--<div class="card-body">--}}
                    {{--<form method="POST" action="{{ route('login') }}">--}}
                        {{--@csrf--}}

                        {{--<div class="form-group row">--}}
                            {{--<label for="email" class="col-sm-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>--}}

                            {{--<div class="col-md-6">--}}
                                {{--<input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>--}}

                                {{--@if ($errors->has('email'))--}}
                                    {{--<span class="invalid-feedback" role="alert">--}}
                                        {{--<strong>{{ $errors->first('email') }}</strong>--}}
                                    {{--</span>--}}
                                {{--@endif--}}
                            {{--</div>--}}
                        {{--</div>--}}

                        {{--<div class="form-group row">--}}
                            {{--<label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>--}}

                            {{--<div class="col-md-6">--}}
                                {{--<input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>--}}

                                {{--@if ($errors->has('password'))--}}
                                    {{--<span class="invalid-feedback" role="alert">--}}
                                        {{--<strong>{{ $errors->first('password') }}</strong>--}}
                                    {{--</span>--}}
                                {{--@endif--}}
                            {{--</div>--}}
                        {{--</div>--}}

                        {{--<div class="form-group row">--}}
                            {{--<div class="col-md-6 offset-md-4">--}}
                                {{--<div class="form-check">--}}
                                    {{--<input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>--}}

                                    {{--<label class="form-check-label" for="remember">--}}
                                        {{--{{ __('Remember Me') }}--}}
                                    {{--</label>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}

                        {{--<div class="form-group row mb-0">--}}
                            {{--<div class="col-md-8 offset-md-4">--}}
                                {{--<button type="submit" class="btn btn-primary">--}}
                                    {{--{{ __('Login') }}--}}
                                {{--</button>--}}

                                {{--<a class="btn btn-link" href="{{ route('password.request') }}">--}}
                                    {{--{{ __('Forgot Your Password?') }}--}}
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
