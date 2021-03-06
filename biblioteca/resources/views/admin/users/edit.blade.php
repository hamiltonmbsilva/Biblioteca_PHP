@extends('layouts.adm')

@section('content')

    <div class="container">

        <h1>Editar Usuario</h1>


        <form action="{{route('user.update',['user'=> $user->id])}}" method="post">
            {{--<input type="hidden" name="_token" value="{{csrf_token()}}">--}}
            {{csrf_field()}}
            <p class="form-group">
                <label>Nome do Nome</label>
                <input type="text" name="name" value="{{$user->name}}" class="form-control @if($errors->has('name')) is-invalid @endif">
                @if($errors->has('name'))
                    <span class="invalid-feedback">
                        <strong>{{$errors->first('name')}}</strong>
                    </span>

                @endif
            </p>

            <p class="form-group">
                <label>Email</label>
                <input type="email" name="email" value="{{$user->email}}" class="form-control @if($errors->has('email')) is-invalid @endif">
                @if($errors->has('email'))
                    <span class="invalid-feedback">
                        <strong>{{$errors->first('email')}}</strong>
                    </span>
                @endif
            </p>

            <p class="form-group">
                <label>Idade</label>
                <input type="number" name="idade" value="{{$user->idade}}" class="form-control @if($errors->has('idade')) is-invalid @endif">
                @if($errors->has('idade'))
                    <span class="invalid-feedback">
                        <strong>{{$errors->first('idade')}}</strong>
                    </span>
                @endif
            </p>

            <p class="form-group">
                <label>CPF</label>
                <input type="number" name="cpf" value="{{$user->cpf}}" class="form-control @if($errors->has('cpf')) is-invalid @endif">
                @if($errors->has('cpf'))
                    <span class="invalid-feedback">
                        <strong>{{$errors->first('cpf')}}</strong>
                    </span>
                @endif
            </p>

            <p class="form-group">
                <label>RG</label>
                <input type="text" name="rg" value="{{$user->rg}}" class="form-control @if($errors->has('rg')) is-invalid @endif">
                @if($errors->has('rg'))
                    <span class="invalid-feedback">
                        <strong>{{$errors->first('rg')}}</strong>
                    </span>
                @endif
            </p>

            {{--<p class="form-group">--}}
                {{--<label>Senha</label>--}}
                {{--<input type="password" name="password"  class="form-control @if($errors->has('password')) is-invalid @endif">--}}
                {{--@if($errors->has('password'))--}}
                    {{--<span class="invalid-feedback">--}}
                        {{--<strong>{{$errors->first('password')}}</strong>--}}
                    {{--</span>--}}
                {{--@endif--}}
            {{--</p>--}}

            {{--<p class="form-group">--}}
                {{--<label>Confirmar Senha</label>--}}
                {{--<input type="password" name="password_confirmation"  class="form-control @if($errors->has('password_confirmation')) is-invalid @endif">--}}
                {{--@if($errors->has('password_confirmation'))--}}
                    {{--<span class="invalid-feedback">--}}
                        {{--<strong>{{$errors->first('password_confirmation')}}</strong>--}}
                    {{--</span>--}}
                {{--@endif--}}
            {{--</p>--}}



            <input type="submit" value="Alterar" class="btn btn-success btn-lg">

        </form>

    </div>

@endsection
