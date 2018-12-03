@extends('layouts.adm')

@section('content')

    <div class="container">

    <h3 class="">Pesquisar</h3>

        <div>
            <form class="form-inline col-12 col-sm-12"  action="{{route('relatorio.usuario')}}"  method="post">
                {{csrf_field()}}
                <div class="row">
                    <div class="input-group  col-sm-6" >
                        <span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>
                        <input name="dataInicio" placeholder="Data de inicio" type="date" class="form-control">

                        <span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>
                        <input name="dataFinal"  placeholder="Data Final" type="date" class="form-control">

                        <span class="input-group-btn ">
                            <button class="btn btn-primary" type="submit">OK</button>
                        </span>

                    </div>

                    <div class="input-group  col-sm-5 float-right">
                        <a href="{{route('relatorio.pdfUsuario')}}" class="float-right btn btn-success">Gerar relatorio em PDF</a>
                    </div>
                </div>
            </form>
        </div>
    </div>


    <div class="container form-inline">
        <h1 class="float-left">Usuarios</h1>

        <table class="table table-striped">
            <thead>

            <tr>
                <th>#</th>
                <th>Nome do Usuario</th>
                <th>Email</th>
                <th>Idade</th>
                <th>CPF</th>
                <th>RG</th>

            </tr>

            </thead>
            <tbody>

            @foreach( $usuario as $u)

                    <tr>
                        <td>{{$u->id}}</td>

                        <td>
                            {{$u->name}}
                        </td>

                        <td>{{$u->email}}</td>

                        <td>{{$u->idade}} </td>
                        <td>{{$u->cpf}} </td>
                        <td>{{$u->rg}} </td>

                    </tr>

            @endforeach
            </tbody>
        </table>
        @if(isset($dataForm))
            {{$emprestimos->appends($dataForm)->links()}}
        @else
            {{$emprestimos->links()}}
        @endif
    </div>

@endsection
