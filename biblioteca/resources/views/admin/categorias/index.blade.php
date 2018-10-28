@extends('layouts.adm')

@section('content')

    <div class="container">
        <h1 class="float-left">Categoria</h1>
        <a href="{{route('categoria.new')}}" class="float-right btn btn-success">Novo</a>

        <table class="table table-striped">
            <thead>

            <tr>
                <th>#</th>
                <th>Nome</th>
                <th>Assunto</th>
                <th>Descrição</th>

            </tr>

            </thead>
            <tbody>
            @foreach($categoria as $c)
                <tr>
                    <td>{{$c->id}}</td>
                    <td>{{$c->nome}}</td>
                    <td>{{$c->assunto}}</td>
                    <td>{{$c->descricao}}</td>

                    <td>
                        <a href="{{route('categoria.edit', ['categoria'=> $c->id])}}" class="btn btn-primary">Editar</a>
                        <a href="{{route('categoria.remove', ['id'=> $c->id])}}" class="btn btn-danger">Excluir</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{$categoria->links()}}
    </div>
@endsection
