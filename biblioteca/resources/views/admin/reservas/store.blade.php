@extends('layouts.adm')

@section('content')

    <div class="container">

        <h1>Fazer Reserva do livro</h1>


        <form action="{{route('reserva.store')}}" method="post">
            {{--<input type="hidden" name="_token" value="{{csrf_token()}}">--}}
            {{csrf_field()}}

            <div class="form-group">
                <label>Usuario</label>

                <select name="users_id" class="form-control">
                    //pegar o usuario da seção não selecionar
                    {{--{{ Auth::user()->name }}--}}
                    @foreach($user as $u)
                        <option value="{{$u->id}}"
                        @if(Auth::user()->id == $u->id)
                            selected
                        @endif
                        >{{$u->name}}</option>
                        </option>
                        {{--<option value="{{$u->id}}">{{$u->name}}</option>--}}
                    @endforeach
                </select>
            </div>

            <p class="form-group">
                <label>Data do emprestimo</label>
                <input type="date" name="dataEmprestimo" value="{{old('dataEmprestimo')}}" class="form-control @if($errors->has('dataEmprestimo')) is-invalid @endif">
                @if($errors->has('dataEmprestimo'))
                    <span class="invalid-feedback">
                        <strong>{{$errors->first('dataEmprestimo')}}</strong>
                    </span>
                @endif
            </p>

            <div class="form-group">
                <label>Livros</label>
                <select name="" class="form-control">
                    @foreach($exemplar as $e )
                        @foreach($livro as $l)
                            <option value="{{$e->id}}"
                                    @if($e->livros_id ==$l->id)


                            >{{$l->titulo}}</option>
                            @endif
                            {{--<option value="{{$e->id}}">{{$e->livros_id}}</option>--}}
                         @endforeach
                    @endforeach
                </select>
            </div>

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
