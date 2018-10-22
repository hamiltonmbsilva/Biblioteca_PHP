{{--@extends('layouts.app')--}}

{{--@section('content')--}}

    <div class="container">

        <h1>Cadastro de usuario</h1>


        <form action="{{route('usuario.store')}}" method="post">
            {{--action="{{route('admin.usuario.store')}}"--}}
            {{--<input type="hidden" name="_token" value="{{csrf_token()}}">--}}
            {{csrf_field()}}
            <p class="form-group">
                <label>Nome do Usuario</label>
                <input type="text" name="nome" value="{{old('nome')}}" class="form-control @if($errors->has('nome')) is-invalid @endif">
                @if($errors->has('nome'))
                    <span class="invalid-feedback">
                        <strong>{{$errors->first('nome')}}</strong>
                    </span>

                @endif
            </p>

            <p class="form-group">
                <label>Email</label>
                <input type="email" name="email" value="{{old('email')}}" class="form-control @if($errors->has('email')) is-invalid @endif">
                @if($errors->has('email'))
                    <span class="invalid-feedback">
                        <strong>{{$errors->first('email')}}</strong>
                    </span>
                @endif
            </p>

            <p class="form-group">
                <label>Senha</label>
                <input type="password" name="password" value="{{old('password')}}" class="form-control @if($errors->has('password')) is-invalid @endif">
                @if($errors->has('password'))
                    <span class="invalid-feedback">
                        <strong>{{$errors->first('password')}}</strong>
                    </span>
                @endif
            </p>

            <p class="form-group">
                <label>Idade</label>
                <input type="number" name="idade" value="{{old('idade')}}" class="form-control @if($errors->has('idade')) is-invalid @endif">
                @if($errors->has('idade'))
                    <span class="invalid-feedback">
                        <strong>{{$errors->first('idade')}}</strong>
                    </span>
                @endif
            </p>

            <p class="form-group">
                <label>CPF</label>
                <input type="number" name="cpf" value="{{old('cpf')}}" class="form-control @if($errors->has('cpf')) is-invalid @endif">
                @if($errors->has('cpf'))
                    <span class="invalid-feedback">
                        <strong>{{$errors->first('cpf')}}</strong>
                    </span>
                @endif
            </p>

            <p class="form-group">
                <label>RG</label>
                <input type="text" name="rg" value="{{old('rg')}}" class="form-control @if($errors->has('rg')) is-invalid @endif">
                @if($errors->has('rg'))
                    <span class="invalid-feedback">
                        <strong>{{$errors->first('rg')}}</strong>
                    </span>
                @endif
            </p>

            <input type="submit" value="Cadastrar" class="btn btn-success btn-lg">

        </form>

    </div>

{{--@endsection--}}
