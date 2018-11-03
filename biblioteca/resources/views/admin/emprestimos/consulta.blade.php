@extends('layouts.adm')

@section('content')
    <div class="container">

        <h1>Consulta Emprestimo</h1>


        <form action="{{route('emprestimo.update', ['emprestimos'=> $emprestimo->id])}}" method="post">
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
                <label>Data do emprestimo</label>
                <p class="form-control">{{$emprestimo->dataEmprestimo}}</p>
                {{--<input type="date" name="dataEmprestimo" value="{{$emprestimo->dataEmprestimo}}" class="form-control @if($errors->has('dataEmprestimo')) is-invalid @endif">--}}
                @if($errors->has('dataEmprestimo'))
                    <span class="invalid-feedback">
                       <strong>{{$errors->first('dataEmprestimo')}}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group">
                <label>Livros</label>
                <p name="exemplar" class="form-control">
                    @foreach($exemplar as $e )
                        @foreach($livro as $l)
                            @if($e->livros_id == $l->id)
                                {{$l->titulo}}
                                {{--<option value="{{$e->id}}"></option>--}}
                            @endif
                        @endforeach
                    @endforeach
                </p>
            </div>

            <p class="form-group">
                <label>Data da devolução</label>
            <p class="form-control">{{$emprestimo->dataDevolucao}}</p>
                {{--<input type="date" name="dataDevolucao" value="{{$emprestimo->dataDevolucao}}" class="form-control @if($errors->has('dataDevolucao')) is-invalid @endif">--}}
                @if($errors->has('dataDevolucao'))
                    <span class="invalid-feedback">
                       <strong>{{$errors->first('dataDevolucao')}}</strong>
                    </span>
                @endif
            </p>


        </form>

    </div>
@endsection
