@extends('layouts.adm')

@section('content')

    <div class="container">
        <div class="col-12">
            <h1>Cadastro de Capas</h1>
            <hr>
        </div>
        <div class="col-12">
            <form action="{{route('livro.capa.save',['id'=>$livro_id])}}" enctype="multipart/form-data" method="post">
                {{csrf_field()}}
                <div class="form-group">

                    <label for="">Carregar Fotos</label>

                    <input type="file" name="capas[]" multiple/>
                </div>
                <div class="form-group" >
                    <button type="submit" class="btn btn-lg btn-success">Enviar Capa</button>

                </div>
            </form>
        </div>
    </div>



@endsection
