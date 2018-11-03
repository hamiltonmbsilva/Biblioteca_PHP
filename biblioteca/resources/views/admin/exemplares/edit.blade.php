@extends('layouts.adm')

@section('content')
    <div class="container">

        <h1>Edição de Exemplar</h1>


        <form action="{{route('exemplar.update', ['exemplar'=> $exemplar->id])}}" method="post">
            {{--<input type="hidden" name="_token" value="{{csrf_token()}}">--}}
            {{csrf_field()}}
            <p class="form-group">
                <label>Codigo</label>
                <input type="text" name="codigo" value="{{$exemplar->codigo}}" class="form-control @if($errors->has('codigo')) is-invalid @endif">
                @if($errors->has('codigo'))
                    <span class="invalid-feedback">
                       <strong>{{$errors->first('codigo')}}</strong>
                    </span>
                @endif
            </p>



            <p class="form-group">
                <label>Circular</label>

                <select name="circular" class="form-control @if($errors->has('circular')) is-invalid @endif">
                    <option value="1">Circular</option>
                    <option value="0">Não é Circular</option>
                </select>

                @if($errors->has('circular'))
                    <span class="invalid-feedback">
                        <strong>{{$errors->first('circular')}}</strong>
                    </span>
                @endif
            </p>

            {{--<p class="form-group">--}}
                {{--<label>Circular</label>--}}
                {{--<input type="text" name="circular" value="{{$exemplar->circular}}" class="form-control @if($errors->has('circular')) is-invalid @endif">--}}
                {{--@if($errors->has('circular'))--}}
                    {{--<span class="invalid-feedback">--}}
                       {{--<strong>{{$errors->first('circular')}}</strong>--}}
                    {{--</span>--}}
                {{--@endif--}}
            {{--</p>--}}

            <div class="form-group">
                <label>Livros</label>
                <select name="livros_id" class="form-control">
                    @foreach($livro as $l)
                        <option value="{{$l->id}}"
                            @if($exemplar->livros_id == $l->id)
                                selected
                             @endif
                                >{{$l->titulo}}</option>
                        </option>
                    @endforeach
                </select>
            </div>
            <p class="form-group">
                <label>Ano</label>
                <input type="text" name="ano" value="{{$exemplar->ano}}" class="form-control @if($errors->has('ano')) is-invalid @endif">
                @if($errors->has('ano'))
                    <span class="invalid-feedback">
                       <strong>{{$errors->first('ano')}}</strong>
                    </span>
                @endif
            </p>




            <input type="submit" value="Atualizar" class="btn btn-success btn-lg">

        </form>

    </div>
@endsection
