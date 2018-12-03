
{{--@extends('layouts.adm')--}}

{{--@section('content')--}}

<html>
<head>

    <style>
        h1{
            text-align: center;
        }
        h2{
            text-align: center;
        }
        body{
            border-width: medium;
            border-style: solid;
            border-color: #000000;
        }
        .relatorio{


            border-width: medium;
            border-style: solid;
            border-color: #00acd6;
        }

    </style>
</head>


<body >

        <table align="center" width="96%" border="2" >
            <tr>
                <td align="center" colspan="2" style="color: Red; font-size: 150%">
                    <u><b>Relatorios de todos os Livros</b></u>
                </td>
            </tr>
            <tr>
            </tr>
        </table>



        <table align="center" width="96%" border="2" >

                <tr align="center">
                    <td align="center" style="width: 20%">
                        <b>Nome do livro:</b>
                    </td>
                    <td align="center"  style="width: 15%">
                        <b>Tipo</b>
                    </td>

                    <td align="center" style="width: 10%">
                        <b>Autores</b>
                    </td>
                    <td align="center" style="width: 10%">
                        <b>Edição</b>
                    </td>
                    <td align="center" style="width: 10%">
                        <b>Editora</b>
                    </td>
                    <td align="center" style="width: 10%">
                        <b>Lanç.</b>
                    </td>
                    <td align="center" style="width: 10%">
                        <b>Codigo Exemplar</b>
                    </td>
                    <td align="center" style="width: 10%">
                        <b>Circular</b>
                    </td>
                    <td align="center" style="width: 10%">
                        <b>Ano</b>
                    </td>
                    <td align="center" style="width: 10%">
                        <b>Quant.</b>
                    </td>
                </tr>
            @foreach( $livro as $l)
                @foreach($exemplar as $e)

                    <tr align="center">
                        <td align="center" style="width: 15%">
                            @if ($l ->id == $e->livros_id )
                                {{$l->titulo}}
                            @endif
                        </td>
                        <td align="center" style="width: 15%">
                            @if ($l ->id == $e->livros_id)
                                @if($l->ehtipo == 0)
                                    <p>
                                        Livro Digital
                                    </p>
                                @endif
                                @if($l->ehtipo == 1)
                                    <p>
                                        Livro Fisico
                                    </p>
                                @endif
                            @endif
                        </td>

                        <td align="center" style="width: 15%">
                            @if ($l ->id == $e->livros_id)
                                {{$l->autores}}
                            @endif
                        </td>
                        <td align="center" style="width: 15%">
                            @if ($l ->id == $e->livros_id)
                                {{$l->edicao}}
                            @endif
                        </td>
                        <td align="center" style="width: 15%">
                            @if ($l ->id == $e->livros_id)
                                {{$l->editora}}
                            @endif
                        </td>
                        <td align="center" style="width: 15%">
                            @if ($l ->id == $e->livros_id)
                                {{$l->ano}}
                            @endif
                        </td>
                        <td align="center" style="width: 15%">
                            @if ($l ->id == $e->livros_id)
                                {{$e->codigo}}
                            @endif
                        </td>
                        <td align="center" style="width: 15%">
                            @if ($l ->id == $e->livros_id)
                                @if($e->circular == 0)
                                    <p>
                                        Não é circular
                                    </p>
                                @endif
                                @if($e->circular== 1)
                                    <p>
                                        Circular
                                    </p>

                                @endif
                            @endif
                        </td>
                        <td align="center" style="width: 15%">
                            @if ($l ->id == $e->livros_id)
                                {{$e->ano}}
                            @endif
                        </td>
                        <td align="center" style="width: 15%">
                            @if ($l ->id == $e->livros_id)
                                {{$e->qtda}}
                            @endif
                        </td>
                        {{--<td align="center" style="width: 15%">--}}

                        {{--</td>--}}
                    </tr>
                @endforeach
            @endforeach

        </table>
</body>
</html>
