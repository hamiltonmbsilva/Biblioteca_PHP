@extends('layouts.adm')

@section('content')

    <div class="container">
        <h1 class="float-left">Livros</h1>
        <a href="{{route('livro.new')}}" class="float-right btn btn-success">Novo</a>


        <table class="table table-striped">
            <thead>

            <tr>
                <th>#</th>
                <th>Capa</th>
                <th>Titulo</th>
                <th>Autores</th>
                <th>Ano</th>
                <th>Assunto</th>
                <th>Tipo de livro</th>
                <th>Categoria</th>
                <th>Ações</th>
            </tr>

            </thead>
            <tbody>
            @foreach($livro as $l)
                <tr>
                    <td>{{$l->id}}</td>
                    <td>
                        @if($l->capas()->count())
                            <img src="{{asset('/imagem/' . $l->capas()->first()->capa)}}" alt="" class="img-fluid" width="50px">
                        @endif
                    </td>
                    <td>{{$l->titulo}}</td>
                    <td>{{$l->autores}}</td>
                    <td>{{$l->ano}}</td>
                    <td>{{$l->assuntos}}</td>
                    <td>
                        @if($l->ehtipo == 0)
                            <p>Livro Digital</p>
                        @endif
                            @if($l->ehtipo == 1)
                                <p>Livro Fisico</p>
                            @endif

                    <td>
                        @foreach($categoria as $c)
                            @if($l->categorias_id == $c->id)
                                {{$c->nome}}
                            @endif


                        @endforeach
                    </td>

                    <td>
                        <a href="{{route('livro.edit', ['livro'=> $l->id])}}" class="btn btn-primary">Editar</a>
                        <a href="{{route('livro.remove', ['id'=> $l->id])}}" class="btn btn-danger">Excluir</a>
                        <a href="{{route('livro.capa', ['id'=> $l->id])}}" class="btn btn-warning">Fotos</a>


                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{$livro->links()}}
    </div>
@endsection
