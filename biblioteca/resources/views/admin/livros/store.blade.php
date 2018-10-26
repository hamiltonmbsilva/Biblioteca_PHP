@extends('layouts.adm')

@section('content')

    <div class="container">

        <h1>Cadastro de livros</h1>


        <form action="{{route('livro.store')}}" method="post">
            {{--<input type="hidden" name="_token" value="{{csrf_token()}}">--}}
            {{csrf_field()}}
            <p class="form-group">
                <label>Nome do Livro</label>
                <input type="text" name="titulo" value="{{old('titulo')}}" class="form-control @if($errors->has('titulo')) is-invalid @endif">
                @if($errors->has('titulo'))
                    <span class="invalid-feedback">
                        <strong>{{$errors->first('titulo')}}</strong>
                    </span>

                @endif
            </p>

            <p class="form-group">
                <label>ISBN</label>
                <input type="text" name="ISBN" value="{{old('ISBN')}}" class="form-control @if($errors->has('ISBN')) is-invalid @endif">
                @if($errors->has('ISBN'))
                    <span class="invalid-feedback">
                        <strong>{{$errors->first('ISBN')}}</strong>
                    </span>
                @endif
            </p>

            <p class="form-group">
                <label>Autores</label>
                <input type="text" name="autores" value="{{old('autores')}}" class="form-control @if($errors->has('autores')) is-invalid @endif">
                @if($errors->has('autores'))
                    <span class="invalid-feedback">
                        <strong>{{$errors->first('autores')}}</strong>
                    </span>
                @endif
            </p>

            <p class="form-group">
                <label>Edição</label>
                <input type="text" name="edicao" value="{{old('edicao')}}" class="form-control @if($errors->has('edicao')) is-invalid @endif">
                @if($errors->has('edicao'))
                    <span class="invalid-feedback">
                        <strong>{{$errors->first('edicao')}}</strong>
                    </span>
                @endif
            </p>

            <p class="form-group">
                <label>Editora</label>
                <input type="text" name="editora" value="{{old('editora')}}" class="form-control @if($errors->has('editora')) is-invalid @endif">
                @if($errors->has('editora'))
                    <span class="invalid-feedback">
                        <strong>{{$errors->first('editora')}}</strong>
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
                <label>Assunto do Livro</label>
                <input type="text" name="assuntos" value="{{old('assuntos')}}" class="form-control @if($errors->has('assuntos')) is-invalid @endif">
                @if($errors->has('assuntos'))
                    <span class="invalid-feedback">
                        <strong>{{$errors->first('assuntos')}}</strong>
                    </span>
                @endif
            </p>

            <div class="form-group">
                <label>Categoria</label>
                <select name="categorias_id" class="form-control">
                    @foreach($categoria as $c)
                        <option value="{{$c->id}}">{{$c->nome}}</option>

                    @endforeach
                </select>
            </div>





            <input type="submit" value="Cadastrar" class="btn btn-success btn-lg">

        </form>

    </div>

@endsection
