
{{--@extends('layouts.adm')--}}

{{--@section('content')--}}

<html>
<head>
    <h1>Relatorios</h1>

    <link href="public/css/style.css" rel='stylesheet' type='text/css' media="all" />

    <script>
        #divCentral{
            border: #1d1d1d;
        }

    </script>
</head>


<body>

<div class="container form-inline" id="divCentral">
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



                </tr>
            @endforeach
        @endforeach
        </tbody>
    </table>

</div>


{{--<div class="container form-inline" id="divCentral">--}}
    {{--<h1 class="float-left">Reservas</h1>--}}

    {{--<table class="table table-striped">--}}
        {{--<thead>--}}

        {{--<tr>--}}
            {{--<th>#</th>--}}
            {{--<th>Nome do Usuario</th>--}}
            {{--<th>Nome do Livro</th>--}}
            {{--<th>Data da Reserva</th>--}}

        {{--</tr>--}}

        {{--</thead>--}}
        {{--<tbody>--}}

        {{--@foreach( $reservas as $resultado)--}}
            {{--@foreach(\App\Exemplares::whereHas('reservas', function ($query) use ($resultado){--}}
                {{--$query->where('reservas_id', $resultado->id);--}}
                    {{--})->get() as $res)--}}
                {{--{{dd($resultado->dataReserva)}}--}}
                {{--<tr>--}}

                    {{--<td>{{$res->id}}</td>--}}

                    {{--<td>--}}
                        {{--@foreach($usuario as $u)--}}
                            {{--@if($resultado->users_id == $u->id)--}}
                                {{--{{$u->name}}--}}
                            {{--@endif--}}
                        {{--@endforeach--}}
                    {{--</td>--}}

                    {{--<td>{{$res->livro->titulo}}</td>--}}

                    {{--<td>{{$resultado->dataReserva}} </td>--}}



                {{--</tr>--}}
            {{--@endforeach--}}
        {{--@endforeach--}}
        {{--</tbody>--}}
    {{--</table>--}}

{{--</div>--}}


</body>
</html>
