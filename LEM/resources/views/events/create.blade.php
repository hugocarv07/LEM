@extends('layouts.main')

@section('title', 'Criar Evento')

@section('content')

<div id="event-create-container" class="col-md-6 offset-md-3">
    <h1>Crie o seu produto</h1>
    <form action="/events" method="POST" enctype="multipart/form-data">
        @csrf
        
        <div class="form-group">
            <label for="title"> Nome: </label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Nome">
        </div>
        
        <div class="form-group">
            <label for="title"> Produto: </label>
            <input type="text" class="form-control" id="title" name="title" placeholder="Nome do produto">
        </div>

        <div class="form-group">
            <label for="title"> Cidade: </label>
            <input type="text" class="form-control" id="city" name="city" placeholder="Nome da cidade">
        </div>

        <div class="form-group">
            <label for="image"> Imagem do produto: </label>
            <input type="file" id="image" name="image" class="form-control-file">
        </div>
        
        <div class="form-group">
            <label for="title"> Descrição: </label>
            <textarea name="description" id="description"  class="form-control" placeholder="Sobre o produto"></textarea>
        </div>


         <input type="submit" class="btn btn-primary" value="Criar Produto">
    </form>
</div>

@endsection