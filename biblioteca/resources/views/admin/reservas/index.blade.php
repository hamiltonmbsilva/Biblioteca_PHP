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
                    <td></td>
                    <td>{{$r->dataEmprestimo}}</td>
                    <td></td>
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
