@extends('layouts.adm')

@section('content')

    <div class="container">
        <h1 class="float-left">Usuarios</h1>
        <a href="{{route('user.new')}}" class="float-right btn btn-success">Novo</a>

        <table class="table table-striped">
            <thead>

            <tr>
                <th>#</th>
                <th>Foto</th>
                <th>Nome</th>
                <th>Criado em</th>
                <th>Tipo de Usuario</th>
                <th>Ações</th>
            </tr>

            </thead>
            <tbody>
            @foreach($users as $u)
                <tr>
                    <td>{{$u->id}}</td>
                    {{--{{dd($u->fotos())}}--}}
                    <td>
                        @if($u->fotos()->count())
                        <img src="{{asset('/imagem/' . $u->fotos()->first()->foto)}}" alt="" class="img-fluid" width="50px">
                        @endif
                    </td>
                    <td>{{$u->name}}</td>
                    <td>{{$u->created_at}}</td>
                    <td>
                        @foreach($tipo as $t)
                            @if($u->tipos_id == $t->id)
                                <option value="{{$t->id}}">{{$t->tipo}}</option>
                            @endif
                        @endforeach

                    <td>
                        <a href="{{route('user.edit', ['users'=> $u->id])}}" class="btn btn-primary">Editar</a>
                        <a href="{{route('user.remove', ['id'=> $u->id])}}" class="btn btn-danger">Excluir</a>
                        <a href="{{route('user.foto', ['id'=> $u->id])}}" class="btn btn-warning">Fotos</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{$users->links()}}
    </div>
@endsection
