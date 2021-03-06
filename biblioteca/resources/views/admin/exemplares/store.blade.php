@extends('layouts.adm')

@section('content')


    <div class="container">

        <h1>Cadastro de Exemplares</h1>


        <form action="{{route('exemplar.store')}}" method="post">
            {{--<input type="hidden" name="_token" value="{{csrf_token()}}">--}}
            {{csrf_field()}}
            <p class="form-group">
                <label>Codigo do exemplar</label>
                <input type="text" name="codigo" value="{{old('codigo')}}" class="form-control @if($errors->has('codigo')) is-invalid @endif">

                @if($errors->has('codigo'))
                    <span class="invalid-feedback">
                        <strong>{{$errors->first('codigo')}}</strong>
                    </span>

                @endif
            </p>

            <div class="form-group">
                <label>Livros</label>
                <select name="livros_id" class="form-control">
                    @foreach($livro as $l)
                        <option value="{{$l->id}}">{{$l->titulo}}</option>
                    @endforeach
                </select>
            </div>

            <p class="form-group">
                <label>Circular</label>

                <select name="circular" class="form-control">
                    <option value="1">Circular</option>
                    <option value="0">Não é Circular</option>
                </select>

                @if($errors->has('circular'))
                    <span class="invalid-feedback">
                        <strong>{{$errors->first('circular')}}</strong>
                    </span>
                @endif
            </p>



            <p class="form-group">
                <label>Ano</label>
                <input type="number" name="ano" value="{{old('ano')}}" class="form-control @if($errors->has('ano')) is-invalid @endif">
                @if($errors->has('ano'))
                    <span class="invalid-feedback">
                        <strong>{{$errors->first('ano')}}</strong>
                    </span>
                @endif
            </p>

            <p class="form-group">
                <label>Quantidade</label>
                <input type="number" name="qtda" value="{{old('qtda')}}" class="form-control @if($errors->has('qtda')) is-invalid @endif">
                @if($errors->has('qtda'))
                    <span class="invalid-feedback">
                        <strong>{{$errors->first('qtda')}}</strong>
                    </span>
                @endif
            </p>

            <input type="submit" value="Cadastrar" class="btn btn-success btn-lg">

        </form>

    </div>

@endsection
