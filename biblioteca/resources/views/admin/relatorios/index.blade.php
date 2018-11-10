@extends('layouts.adm')

@section('content')

    <div class="container">

    <h3 class="">Pesquisar</h3>

        <div>
            <form class="form-inline col-12 col-sm-12"  action="{{url('relatorio.pesquisar')}}"  method="get">
                {{csrf_field()}}
                <div class="row">
                    <div class="input-group  col-sm-6" >
                        <span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>
                        <input name="dataInicio" placeholder="Data de inicio" type="text" class="form-control">

                        <span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>
                        <input name="dataFinal"  placeholder="Data Final" type="text" class="form-control">

                        <span class="input-group-btn ">
                            <button class="btn btn-primary" type="submit">OK</button>
                        </span>

                    </div>

                    <div class="input-group  col-sm-5 float-right">
                        <a href="{{route('relatorio.relatorio')}}" class="float-right btn btn-success">Gerar relatorio em PDF</a>
                    </div>
                </div>
            </form>
        </div>
    </div>


    <div class="container form-inline">
        <h1 class="float-left">Reservas</h1>

        <table class="table table-striped">
            <thead>

            <tr>
                <th>#</th>
                <th>Nome do Usuario</th>
                <th>Nome do Livro</th>
                <th>Data da Reserva</th>

            </tr>

            </thead>
            <tbody>

            @foreach( $reservas as $resultado)
                @foreach(\App\Exemplares::whereHas('reservas', function ($query) use ($resultado){
                    $query->where('reservas_id', $resultado->id);
                        })->get() as $res)
                    {{--{{dd($resultado->dataReserva)}}--}}
                    <tr>

                        <td>{{$res->id}}</td>

                        <td>
                            @foreach($usuario as $u)
                                @if($resultado->users_id == $u->id)
                                    {{$u->name}}
                                @endif
                            @endforeach
                        </td>

                        <td>{{$res->livro->titulo}}</td>

                        <td>{{$resultado->dataReserva}} </td>


                        <td>
                            {{--<a href="{{route('relatorio.relatorio',['id'=> $res->id])}}" class="btn btn-success">PDF</a>--}}
                            {{--<a href="{{route('reserva.exibir', ['id'=> $res->id])}}" class="btn btn-success">Consultar</a>--}}
                            {{--<a href="{{route('reserva.edit', ['reserva'=> $res->id])}}" class="btn btn-primary">Editar</a>--}}
                            {{--<a href="{{route('reserva.remove', ['id'=> $res->id])}}" class="btn btn-danger">Excluir</a>--}}

                        </td>
                    </tr>
                @endforeach
            @endforeach
            </tbody>
        </table>
        {{$paginaReserva->links()}}
    </div>

    {{----Emprestimo----}}

    <div class="container form-inline">
        <h1 class="float-left">Emprestimos</h1>

        <table class="table table-striped">
            <thead>

            <tr>
                <th>#</th>
                <th>Nome do Usuario</th>
                <th>Nome do Livro</th>
                <th>Data do Emprestimo</th>
                <th>Data da Devolução</th>

            </tr>

            </thead>
            <tbody>

            @foreach( $emprestimos as $resultado)
                @foreach(\App\Exemplares::whereHas('emprestimos', function ($query) use ($resultado){
                    $query->where('emprestimos_id', $resultado->id);
                        })->get() as $res)
                    {{--{{dd($resultado->dataReserva)}}--}}
                    <tr>

                        <td>{{$res->id}}</td>

                        <td>
                            @foreach($usuario as $u)
                                @if($resultado->users_id == $u->id)
                                    {{$u->name}}
                                @endif
                            @endforeach
                        </td>

                        <td>{{$res->livro->titulo}}</td>

                        <td>{{$resultado->dataEmprestimo}} </td>
                        <td>{{$resultado->dataDevolucao}} </td>


                        {{--<td>--}}
                            {{--<a href="{{route('reserva.exibir', ['id'=> $res->id])}}" class="btn btn-success">Consultar</a>--}}
                            {{--<a href="{{route('reserva.edit', ['reserva'=> $res->id])}}" class="btn btn-primary">Editar</a>--}}
                            {{--<a href="{{route('reserva.remove', ['id'=> $res->id])}}" class="btn btn-danger">Excluir</a>--}}

                        {{--</td>--}}
                    </tr>
                @endforeach
            @endforeach
            </tbody>
        </table>
        {{--{{$paginaReserva->links()}}--}}
        {{$paginaEmprestimo->links()}}
    </div>

@endsection
