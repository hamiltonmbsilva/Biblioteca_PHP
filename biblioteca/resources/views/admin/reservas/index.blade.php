@extends('layouts.adm')

@section('content')

    <div class="container">
        <h1 class="float-left">Reservas</h1>
        <a href="{{route('reserva.new')}}" class="float-right btn btn-success">Novo</a>

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
            @foreach($reserva as $r)
                <tr>
                    <td>{{$r->id}}</td>
                    <td>
                        @foreach($user as $u)
                            <option value="{{$u->id}}"
                                    @if($r->users_id == $u->id)
                                    selected>{{$u->name}}
                                @endif
                            </option>


                        @endforeach
                    </td>
                    <td>{{$r->dataEmprestimo}}</td>
                    <td>
                        @foreach($exemplar as $e )
                            @foreach($livro as $l)
                                @foreach($reserva as $r)
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
                        <a href="{{route('reserva.edit', ['reserva'=> $r->id])}}" class="btn btn-primary">Editar</a>
                        <a href="{{route('reserva.remove', ['id'=> $r->id])}}" class="btn btn-danger">Excluir</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

    </div>
@endsection
