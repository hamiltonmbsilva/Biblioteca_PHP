@extends('layouts.adm')

@section('content')
    <div class="container">

        <h1>Editar Reserva</h1>


        <form action="{{route('reserva.update', ['reservas'=> $reserva->id])}}" method="post">
            {{--<input type="hidden" name="_token" value="{{csrf_token()}}">--}}
            {{csrf_field()}}

            {{--<p class="form-group">--}}
                {{--<label>Nome do Uuuario</label>--}}
                {{--<input type="text" name="titulo" value="{{$livro->titulo}}" class="form-control @if($errors->has('titulo')) is-invalid @endif">--}}
                {{--@if($errors->has('titulo'))--}}
                    {{--<span class="invalid-feedback">--}}
                       {{--<strong>{{$errors->first('titulo')}}</strong>--}}
                    {{--</span>--}}
                {{--@endif--}}
            {{--</p>--}}

            <p class="form-group">
                <label>Data do emprestimo</label>
                <input type="date" name="dataEmprestimo" value="{{$reserva->dataEmprestimo}}" class="form-control @if($errors->has('dataEmprestimo')) is-invalid @endif">
                @if($errors->has('dataEmprestimo'))
                    <span class="invalid-feedback">
                       <strong>{{$errors->first('dataEmprestimo')}}</strong>
                    </span>
                @endif
            </p>

            {{--<p class="form-group">--}}
                {{--<label>Nome do livro</label>--}}
                {{--<input type="text" name="autores" value="{{$reserva->autores}}" class="form-control @if($errors->has('autores')) is-invalid @endif">--}}
                {{--@if($errors->has('autores'))--}}
                    {{--<span class="invalid-feedback">--}}
                       {{--<strong>{{$errors->first('autores')}}</strong>--}}
                    {{--</span>--}}
                {{--@endif--}}
            {{--</p>--}}

            <p class="form-group">
                <label>Data da devolução</label>
                <input type="date" name="dataDevolucao" value="{{$reserva->dataDevolucao}}" class="form-control @if($errors->has('dataDevolucao')) is-invalid @endif">
                @if($errors->has('dataDevolucao'))
                    <span class="invalid-feedback">
                       <strong>{{$errors->first('dataDevolucao')}}</strong>
                    </span>
                @endif
            </p>




            <input type="submit" value="Atualizar" class="btn btn-success btn-lg">

        </form>

    </div>
@endsection
