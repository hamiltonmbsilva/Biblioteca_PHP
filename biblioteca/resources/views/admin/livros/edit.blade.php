@extends('layouts.adm')

@section('content')
    <div class="container">

        <h1>Edição de Livros</h1>


        <form action="{{route('livro.update', ['livros'=> $livro->id])}}" method="post">
            {{--<input type="hidden" name="_token" value="{{csrf_token()}}">--}}
            {{csrf_field()}}
            <p class="form-group">
                <label>Nome do Livro</label>
                <input type="text" name="titulo" value="{{$livro->titulo}}" class="form-control @if($errors->has('titulo')) is-invalid @endif">
                @if($errors->has('titulo'))
                    <span class="invalid-feedback">
                       <strong>{{$errors->first('titulo')}}</strong>
                    </span>
                @endif
            </p>

            <p class="form-group">
                <label>ISBN</label>
                <input type="text" name="ISBN" value="{{$livro->ISBN}}" class="form-control @if($errors->has('ISBN')) is-invalid @endif">
                @if($errors->has('ISBN'))
                    <span class="invalid-feedback">
                       <strong>{{$errors->first('ISBN')}}</strong>
                    </span>
                @endif
            </p>

            <p class="form-group">
                <label>Altores</label>
                <input type="text" name="autores" value="{{$livro->autores}}" class="form-control @if($errors->has('autores')) is-invalid @endif">
                @if($errors->has('autores'))
                    <span class="invalid-feedback">
                       <strong>{{$errors->first('autores')}}</strong>
                    </span>
                @endif
            </p>

            <p class="form-group">
                <label>Edição</label>
                <input type="text" name="edicao" value="{{$livro->edicao}}" class="form-control @if($errors->has('edicao')) is-invalid @endif">
                @if($errors->has('edicao'))
                    <span class="invalid-feedback">
                       <strong>{{$errors->first('edicao')}}</strong>
                    </span>
                @endif
            </p>

            <p class="form-group">
                <label>Editora</label>
                <input type="text" name="editora" value="{{$livro->editora}}" class="form-control @if($errors->has('editora')) is-invalid @endif">
                @if($errors->has('editora'))
                    <span class="invalid-feedback">
                       <strong>{{$errors->first('editora')}}</strong>
                    </span>
                @endif
            </p>

            <p class="form-group">
                <label>Ano</label>
                <input type="text" name="ano" value="{{$livro->ano}}" class="form-control @if($errors->has('ano')) is-invalid @endif">
                @if($errors->has('ano'))
                    <span class="invalid-feedback">
                       <strong>{{$errors->first('ano')}}</strong>
                    </span>
                @endif
            </p>

            <p class="form-group">
                <label>Assunto</label>
                <input type="text" name="assuntos" value="{{$livro->assuntos}}" class="form-control @if($errors->has('assuntos')) is-invalid @endif">
                @if($errors->has('assuntos'))
                    <span class="invalid-feedback">
                        <strong>{{$errors->first('assuntos')}}</strong>
                    </span>
                @endif
            </p>



            <input type="submit" value="Atualizar" class="btn btn-success btn-lg">

        </form>

    </div>
@endsection
