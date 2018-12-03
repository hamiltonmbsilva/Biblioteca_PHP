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
            @foreach( $emprestimos as $resultado)
                @foreach(\App\Exemplares::whereHas('emprestimos', function ($query) use ($resultado){
                    $query->where('emprestimos_id', $resultado->id);
                        })->get() as $res)

                <tr>
                    <td>{{$resultado->id}}</td>
                    <td>
                        @foreach($usuario as $u)
                            @if($resultado->users_id == $u->id)
                                {{$u->name}}
                            @endif
                        @endforeach

                    </td>
                    <td>{{$resultado->dataEmprestimo}}</td>
                    <td>
                        {{$res->livro->titulo}}

                    </td>
                    <td>{{$resultado->dataDevolucao}}</td>
                    <td>
                        <a href="{{route('emprestimo.exibir', ['id'=> $resultado->id])}}" class="btn btn-success">Consultar</a>
                        <a href="{{route('emprestimo.edit', ['emprestimo'=> $resultado->id])}}" class="btn btn-primary">Editar</a>
                        <a href="{{route('emprestimo.remove', ['id'=> $resultado->id])}}" class="btn btn-danger">Excluir</a>

                    </td>
                </tr>
                @endforeach
            @endforeach
            </tbody>
        </table>
        {{$pagina->links()}}
    </div>
@endsection
