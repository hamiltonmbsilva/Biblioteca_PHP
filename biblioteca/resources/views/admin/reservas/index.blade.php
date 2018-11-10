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
                <th>Data da Reserva</th>
                <th>Nome do Livro</th>
                <th>Quantidade</th>

            </tr>

            </thead>
            <tbody>
            {{--@foreach($reserva as $r)--}}

            @foreach( $reservas as $resultado)
                @foreach(\App\Exemplares::whereHas('reservas', function ($query) use ($resultado){
                    $query->where('reservas_id', $resultado->id);
                        })->get() as $res)
                    {{--{{dd($resultado->dataReserva)}}--}}
                    <tr>
                <tr>
                    <td>{{$resultado->id}}</td>
                    <td>
                        {{ Auth::user()->name }}

                    </td>
                    <td>{{$resultado->dataReserva}}</td>
                    <td>
                        {{$res->livro->titulo}}
                        {{--@foreach($exemplar as $e )--}}
                            {{--@foreach($livro as $l)--}}
                                {{--@foreach($reserva as $r)--}}
                                    {{--<option value="{{$e->id}}"--}}
                                    {{--@if(($e->livros_id == $l->id)&&($r->exemplares_id == $e->id) ))--}}

                                        {{-->{{$l->titulo}}</option>--}}
                                    {{--@endif--}}
                                    {{--<option value="{{$e->id}}">{{$e->livros_id}}</option>--}}
                                 {{--@endforeach--}}
                            {{--@endforeach--}}
                        {{--@endforeach--}}

                    </td>

                    <td>

                        @foreach($reserva as $r)

                            @if($reserva == $r->dataReserva)
                            {{$cont = $contador,
                                $contador = $cont + 1
                            }}
                            @endif
                        @endforeach
                        <p>$contador</p>
                    </td>

                    <td>
                        <a href="{{route('reserva.exibir', ['id'=> $r->id])}}" class="btn btn-success">Consultar</a>
                        <a href="{{route('reserva.edit', ['reserva'=> $r->id])}}" class="btn btn-primary">Editar</a>
                        <a href="{{route('reserva.remove', ['id'=> $r->id])}}" class="btn btn-danger">Excluir</a>

                    </td>
                </tr>
            @endforeach
            @endforeach
            </tbody>
        </table>
        {{$pagina->links()}}
    </div>
@endsection
