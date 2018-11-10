@extends('layouts.adm')

@section('content')
    <div class="container">

        <h1>Consulta Reserva</h1>


        <form action="{{route('reserva.update', ['reservas'=> $reserva->id])}}" method="post">
            {{--<input type="hidden" name="_token" value="{{csrf_token()}}">--}}
            {{csrf_field()}}

            <div class="form-group">
                <label>Nome do Usuario</label>
                <p name="users_id" class="form-control">
                    @foreach($user as $u)
                        @if(Auth::user()->id == $u->id)
                            {{$u->name}}
                        @endif
                    @endforeach
                </p>
            </div>

            <div class="form-group">
                <label>Data da Reserva</label>

                <p class="form-control">{{$reserva->dataReserva}}</p>
                {{--<input type="date" name="dataReserva" value="{{$reserva->dataReserva}}" class="form-control @if($errors->has('dataReserva')) is-invalid @endif">--}}
                @if($errors->has('dataReserva'))
                    <span class="invalid-feedback">
                       <strong>{{$errors->first('dataReserva')}}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group">
                <label>Livros</label>
                <p name="exemplar" class="form-control">
                    {{--{{dd($reserva->exemplares("reservas_id") == $reserva->id)}}--}}
                    @if(($reserva->reservas_id == $reserva->id)&& ($exemplar->id == $exemplar->exemplares_id)&&
                    ($exemplar->livros_id == $livro->id))

                        $livro->titulo
                     @endif

                    {{--@foreach($exemplar as $e )--}}
                        {{--@foreach($livro as $l)--}}
                            {{--@if($e->livros_id == $l->id)--}}
                                {{--{{$l->titulo}}--}}
                                {{--<option value="{{$e->id}}"></option>--}}
                            {{--@endif--}}
                        {{--@endforeach--}}
                    {{--@endforeach--}}
                </p>
            </div>




        </form>

    </div>
@endsection
