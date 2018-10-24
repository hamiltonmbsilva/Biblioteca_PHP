@extends('layouts.adm')

@section('content')

    <div class="container">

        <h1>Cadastro de Categorias</h1>


        <form action="{{route('categoria.store')}}" method="post">
            {{--<input type="hidden" name="_token" value="{{csrf_token()}}">--}}
            {{csrf_field()}}
            <p class="form-group">
                <label>Nome da Categoria</label>
                <input type="text" name="nome" value="{{old('nome')}}" class="form-control @if($errors->has('nome')) is-invalid @endif">
                @if($errors->has('nome'))
                    <span class="invalid-feedback">
                        <strong>{{$errors->first('nome')}}</strong>
                    </span>

                @endif
            </p>

            <p class="form-group">
                <label>Assunto</label>
                <input type="text" name="assunto" value="{{old('assunto')}}" class="form-control @if($errors->has('assunto')) is-invalid @endif">
                @if($errors->has('assunto'))
                    <span class="invalid-feedback">
                        <strong>{{$errors->first('assunto')}}</strong>
                    </span>
                @endif
            </p>

            <p class="form-group">
                <label>Descrição</label>
                <input type="text" name="descricao" value="{{old('descricao')}}" class="form-control @if($errors->has('descricao')) is-invalid @endif">
                @if($errors->has('descricao'))
                    <span class="invalid-feedback">
                        <strong>{{$errors->first('descricao')}}</strong>
                    </span>
                @endif
            </p>



            <input type="submit" value="Cadastrar" class="btn btn-success btn-lg">

        </form>

    </div>

@endsection
