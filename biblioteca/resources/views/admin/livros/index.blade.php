@extends('layouts.adm')

@section('content')

    <div class="container">
        <h1 class="float-left">Livros</h1>
        <a href="{{route('livro.new')}}" class="float-right btn btn-success">Novo</a>

        <table class="table table-striped">
            <thead>

            <tr>
                <th>#</th>
                <th>Titulo</th>
                <th>Autores</th>
                <th>Ano</th>
                <th>Assunto</th>
                <th>Categoria</th>
                <th>Ações</th>
            </tr>

            </thead>
            <tbody>
            @foreach($livro as $l)
                <tr>
                    <td>{{$l->id}}</td>
                    <td>{{$l->titulo}}</td>
                    <td>{{$l->autores}}</td>
                    <td>{{$l->ano}}</td>
                    <td>{{$l->assuntos}}</td>
                    <td>@foreach($categoria as $c)
                            @if($l->categorias_id == $c->id)
                                {{$c->nome}}
                            @endif


                        @endforeach
                    </td>

                    <td>
                        <a href="{{route('livro.edit', ['livro'=> $l->id])}}" class="btn btn-primary">Editar</a>
                        <a href="{{route('livro.remove', ['id'=> $l->id])}}" class="btn btn-danger">Excluir</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

    </div>
@endsection
