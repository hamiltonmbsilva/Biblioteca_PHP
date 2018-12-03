@extends('layouts.adm')


@section('content')

    <div class="container">

    <h3 class="">Grafico Emprestimo</h3>

    </div>



<div class="container">
    <div id="perf_div"></div>
    <?php echo $lava->render('ColumnChart', 'livro', 'perf_div') ?>
    {{--{{$lava->render('ColumnChart', 'livro', 'perf_div')}}--}}
</div>


@endsection
