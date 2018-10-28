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
                            <option value="{{$u->id}}">{{$u->name}}</option>
                        @endif
                    @endforeach
                </p>
            </div>

            <p class="form-group">
                <label>Data do emprestimo</label>
                <input type="date" name="dataEmprestimo" value="{{$reserva->dataEmprestimo}}" class="form-control @if($errors->has('dataEmprestimo')) is-invalid @endif">
                @if($errors->has('dataEmprestimo'))
                    <span class="invalid-feedback">
                       <strong>{{$errors->first('dataEmprestimo')}}</strong>
                    </span>
                @endif
            </p>

            <div class="form-group">
                <label>Livros</label>
                <p name="exemplar" class="form-control">
                    @foreach($exemplar as $e )
                        @foreach($livro as $l)
                            @if($e->livros_id == $l->id)
                                <option value="{{$e->id}}">{{$l->titulo}}</option>
                            @endif
                        @endforeach
                    @endforeach
                </p>
            </div>

            <p class="form-group">
                <label>Data da devolução</label>
                <input type="date" name="dataDevolucao" value="{{$reserva->dataDevolucao}}" class="form-control @if($errors->has('dataDevolucao')) is-invalid @endif">
                @if($errors->has('dataDevolucao'))
                    <span class="invalid-feedback">
                       <strong>{{$errors->first('dataDevolucao')}}</strong>
                    </span>
                @endif
            </p>


        </form>

    </div>
@endsection
