@extends('layouts.adm')

@section('content')

    <div class="container">
        <h1 class="float-left">Exemplares</h1>
        <a href="{{route('exemplar.new')}}" class="float-right btn btn-success">Novo</a>

        <table class="table table-striped">
            <thead>

            <tr>
                <th>#</th>
                <th>Codigo</th>
                <th>Circular</th>
                <th>Nome do livro</th>
                <th>Ano</th>
                <th>Quantidade</th>
            </tr>

            </thead>
            <tbody>
            @foreach($exemplar as $e)
                <tr>
                    <td>{{$e->id}}</td>
                    <td>{{$e->codigo}}</td>
                    <td>
                        @if($e->circular == 1)
                            <p>Circular</p>
                        @endif
                        @if($e->circular == 0)
                                <p>Não é Circular</p>
                            @endif
                    </td>
                    {{--<td>{{$e->livros_id}}</td>--}}
                   <td>{{$e->livro->titulo}}</td>
                    <td>{{$e->ano}}</td>
                    <td>{{$e->qtda}}</td>
                    <td>
                        <a href="{{route('exemplar.edit', ['exemplar'=> $e->id])}}" class="btn btn-primary">Editar</a>
                        <a href="{{route('exemplar.remove', ['id'=> $e->id])}}" class="btn btn-danger">Excluir</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{$exemplar->links()}}
    </div>
@endsection
