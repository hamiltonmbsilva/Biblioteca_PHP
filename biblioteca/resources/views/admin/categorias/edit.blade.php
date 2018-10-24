@extends('layouts.adm')

@section('content')
    <div class="container">

        <h1>Edição da Categoria</h1>


        <form action="{{route('categoria.update', ['categorias'=> $categoria->id])}}" method="post">
            {{--<input type="hidden" name="_token" value="{{csrf_token()}}">--}}
            {{csrf_field()}}
            <p class="form-group">
                <label>Nome da Categoria</label>
                <input type="text" name="nome" value="{{$categoria->nome}}" class="form-control @if($errors->has('nome')) is-invalid @endif">
                @if($errors->has('nome'))
                    <span class="invalid-feedback">
                       <strong>{{$errors->first('nome')}}</strong>
                    </span>
                @endif
            </p>

            <p class="form-group">
                <label>Assunto</label>
                <input type="text" name="assunto" value="{{$categoria->assunto}}" class="form-control @if($errors->has('assunto')) is-invalid @endif">
                @if($errors->has('assunto'))
                    <span class="invalid-feedback">
                       <strong>{{$errors->first('assunto')}}</strong>
                    </span>
                @endif
            </p>

            <p class="form-group">
                <label>Descrição</label>
                <input type="text" name="descricao" value="{{$categoria->descricao}}" class="form-control @if($errors->has('descricao')) is-invalid @endif">
                @if($errors->has('descricao'))
                    <span class="invalid-feedback">
                       <strong>{{$errors->first('descricao')}}</strong>
                    </span>
                @endif
            </p>




            <input type="submit" value="Atualizar" class="btn btn-success btn-lg">

        </form>

    </div>
@endsection
