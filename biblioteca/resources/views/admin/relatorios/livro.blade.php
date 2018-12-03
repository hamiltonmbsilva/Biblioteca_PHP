@extends('layouts.adm')

@section('content')

    <div class="container">

    <h3 class="">Pesquisar</h3>

        <div>
            <form class="form-inline col-12 col-sm-12"  action="{{route('relatorio.livro')}}"  method="post">
                {{csrf_field()}}
                <div class="row">
                    <div class="input-group  col-sm-6" >
                        <span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>
                        <input name="dataInicio" placeholder="Data de inicio" type="date" class="form-control">

                        <span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>
                        <input name="dataFinal"  placeholder="Data Final" type="date" class="form-control">

                        <span class="input-group-btn ">
                            <button class="btn btn-primary" type="submit">OK</button>
                        </span>

                    </div>

                    <div class="input-group  col-sm-5 float-right">
                        <a href="{{route('relatorio.pdfLivro')}}" class="float-right btn btn-success">Gerar relatorio em PDF</a>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="container form-inline">
        <h1 class="float-left">Todos os livros</h1>

        <table class="table table-striped">
            <thead>

                <tr>
                    <th>Titulo do Livro</th>
                    <th>Tipo</th>
                    <th>Codigo do Exemplar</th>
                    <th>Circular/Não circularo</th>
                    <th>Quantidade Exemplar</th>
                </tr>

            </thead>
            <tbody>

            @foreach( $livro as $l)
                @foreach($exemplar as $e)

                    <tr>
                        <td>
                            @if ($l->id == $e->livros_id && $l->id !='' && $e->livros_id != '')
                                {{$l->titulo}}
                             @endif
                        </td>

                        <td>
                            @if ($l->id == $e->livros_id && $l->id !='' && $e->livros_id != '')
                                @if($l->ehtipo == 0)
                                    <p>Livro Digital</p>
                                 @endif
                                    @if($l->ehtipo == 1)
                                        <p>Livro Fisico</p>
                                    @endif
                            @endif
                        </td>

                        <td>
                            @if ($l->id == $e->livros_id && $l->id !='' && $e->livros_id != '')
                                {{$e->codigo}}
                            @endif
                        </td>

                        <td>
                            @if ($l->id == $e->livros_id && $l->id !='' && $e->livros_id != '')
                                @if($e->circular == 0)
                                    <p>Não é circular</p>
                                @endif
                                @if($e->circular== 1)
                                    <p>Circular</p>
                                @endif
                            @endif
                        </td>

                        <td>
                            @if ($l->id == $e->livros_id && $l->id !='' && $e->livros_id != '')
                              {{$e->qtda}}

                            @endif
                        </td>
                        <td> </td>


                    </tr>
                @endforeach
            @endforeach
            </tbody>
        </table>
        @if(isset($dataForm))
            {{$emprestimos->appends($dataForm)->links()}}
        @else
            {{$emprestimos->links()}}
        @endif
    </div>

@endsection
