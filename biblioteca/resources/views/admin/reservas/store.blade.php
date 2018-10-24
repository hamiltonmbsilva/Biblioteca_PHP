@extends('layouts.adm')

@section('content')

    <div class="container">

        <h1>Fazer Reserva do livro</h1>


        <form action="{{route('reserva.store')}}" method="post">
            {{--<input type="hidden" name="_token" value="{{csrf_token()}}">--}}
            {{csrf_field()}}
            {{--<p class="form-group">--}}
                {{--<label>Nome do Usuario</label>--}}
                {{--<input type="text" name="titulo" value="{{old('titulo')}}" class="form-control @if($errors->has('titulo')) is-invalid @endif">--}}
                {{--@if($errors->has('titulo'))--}}
                    {{--<span class="invalid-feedback">--}}
                        {{--<strong>{{$errors->first('titulo')}}</strong>--}}
                    {{--</span>--}}

                {{--@endif--}}
            {{--</p>--}}

            <p class="form-group">
                <label>Data do emprestimo</label>
                <input type="date" name="dataEmprestimo" value="{{old('dataEmprestimo')}}" class="form-control @if($errors->has('dataEmprestimo')) is-invalid @endif">
                @if($errors->has('dataEmprestimo'))
                    <span class="invalid-feedback">
                        <strong>{{$errors->first('dataEmprestimo')}}</strong>
                    </span>
                @endif
            </p>

            {{--<p class="form-group">--}}
                {{--<label>Nome do livro</label>--}}
                {{--<input type="text" name="autores" value="{{old('autores')}}" class="form-control @if($errors->has('autores')) is-invalid @endif">--}}
                {{--@if($errors->has('autores'))--}}
                    {{--<span class="invalid-feedback">--}}
                        {{--<strong>{{$errors->first('autores')}}</strong>--}}
                    {{--</span>--}}
                {{--@endif--}}
            {{--</p>--}}

            <p class="form-group">
                <label>Data da Devolução</label>
                <input type="date" name="dataDevolucao" value="{{old('dataDevolucao')}}" class="form-control @if($errors->has('dataDevolucao')) is-invalid @endif">
                @if($errors->has('dataDevolucao'))
                    <span class="invalid-feedback">
                        <strong>{{$errors->first('dataDevolucao')}}</strong>
                    </span>
                @endif
            </p>


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
