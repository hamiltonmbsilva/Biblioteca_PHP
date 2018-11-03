@extends('layouts.adm')

@section('content')

    <div class="container">
        <h1 class="float-left">Emprestimos</h1>
        <a href="{{route('emprestimo.new')}}" class="float-right btn btn-success">Novo</a>

        <table class="table table-striped">
            <thead>

            <tr>
                <th>#</th>
                <th>Nome do Usuario</th>
                <th>Data do Emprestimo</th>
                <th>Nome do Livro</th>
                <th>Data de Devolução</th>
            </tr>

            </thead>
            <tbody>
            @foreach($emprestimo as $r)
                <tr>
                    <td>{{$r->id}}</td>
                    <td>{{ Auth::user()->name }}
                        {{--@foreach($user as $u)--}}
                            {{--<option value="{{$u->id}}"--}}
                                    {{--@if($r->users_id == $u->id)--}}
                                    {{--selected>{{$u->name}}--}}
                                {{--@endif--}}
                            {{--</option>--}}


                        {{--@endforeach--}}
                    </td>
                    <td>{{$r->dataEmprestimo}}</td>
                    <td>
                        @foreach($exemplar as $e )
                            @foreach($livro as $l)
                                @foreach($emprestimo as $r)
                                    <option value="{{$e->id}}"
                                    @if(($e->livros_id == $l->id)&&($r->exemplares_id == $e->id) ))

                                        >{{$l->titulo}}</option>
                                    @endif
                                    {{--<option value="{{$e->id}}">{{$e->livros_id}}</option>--}}
                                 @endforeach
                            @endforeach
                        @endforeach

                    </td>
                    <td>{{$r->dataDevolucao}}</td>
                    <td>
                        <a href="{{route('emprestimo.exibir', ['id'=> $r->id])}}" class="btn btn-success">Consultar</a>
                        <a href="{{route('emprestimo.edit', ['emprestimo'=> $r->id])}}" class="btn btn-primary">Editar</a>
                        <a href="{{route('emprestimo.remove', ['id'=> $r->id])}}" class="btn btn-danger">Excluir</a>

                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{$pagina->links()}}
    </div>
@endsection
