@extends('layouts.adm')

@section('content')

    <div class="container">

        <h1>Fazer Reserva do livro</h1>


        <form action="{{route('reserva.store')}}" method="post">
            {{--<input type="hidden" name="_token" value="{{csrf_token()}}">--}}
            {{csrf_field()}}

            {{--<p class="form-group">--}}
                {{--<label>Usuario</label>--}}
                {{--<input type="text" name="users_id" value="{{Auth::user()->name}}" class="form-control ">--}}

            {{--</p>--}}

            <div class="form-group">
                <label>Categoria</label>
                <select name="users_id" class="form-control">
                    @foreach($user as $u)
                        @if(Auth::user()->id == $u->id)
                        <option value="{{$u->id}}">{{$u->name}}</option>
                        @endif
                    @endforeach
                </select>
            </div>

            <p class="form-group">
                <label>Data do Reserva</label>
                <input type="date" name="dataReserva" value="{{old('dataReserva')}}" class="form-control @if($errors->has('dataReserva')) is-invalid @endif">
                @if($errors->has('dataReserva'))
                    <span class="invalid-feedback">
                        <strong>{{$errors->first('dataReserva')}}</strong>
                    </span>
                @endif
            </p>

            <div class="form-group">
                <label>Livros</label>
                <select name="exemplar" class="form-control">
                    @foreach($exemplar as $e )
                        @foreach($livro as $l)
                            @if($e->livros_id == $l->id)
                                <option value="{{$e->id}}">{{$l->titulo}}</option>
                            @endif
                        @endforeach
                    @endforeach
                </select>
            </div>

            {{--<p class="form-group">--}}
                {{--<label>Data da Devolução</label>--}}
                {{--<input type="date" name="dataDevolucao" value="{{old('dataDevolucao')}}" class="form-control @if($errors->has('dataDevolucao')) is-invalid @endif">--}}
                {{--@if($errors->has('dataDevolucao'))--}}
                    {{--<span class="invalid-feedback">--}}
                        {{--<strong>{{$errors->first('dataDevolucao')}}</strong>--}}
                    {{--</span>--}}
                {{--@endif--}}
            {{--</p>--}}


            {{--<div class="form-group">--}}
                {{--<label>Selecionar o tipo de Livro</label>--}}
                {{--<select class="form-control">--}}
                    {{--<option>Impresso</option>--}}
                    {{--<option>Digital</option>--}}
                    {{--@if(option)--}}

                {{--</select>--}}
            {{--</div>--}}



            <input type="submit" value="Cadastrar" class="btn btn-success btn-lg">

        </form>

    </div>

@endsection
