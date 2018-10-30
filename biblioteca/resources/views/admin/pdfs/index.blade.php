@extends('layouts.adm')

@section('content')

    <div class="container">
        <div class="col-12">
            <h1>Cadastro de fotos</h1>
            <hr>
        </div>
        <div class="col-12">
            <form action="{{route('livro.pdf.save',['id'=>$livro_id])}}" enctype="multipart/form-data" method="post">
                {{csrf_field()}}
                <div class="form-group">

                    <label for="">Carregar Livros</label>
                    <input type="file" name="pdfs[]" multiple/>
                </div>
                <div class="form-group" >
                    <button type="submit" class="btn btn-lg btn-success">Enviar Fotos</button>

                </div>
            </form>
        </div>
    </div>



@endsection
