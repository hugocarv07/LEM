@extends('layouts.main')

@section('title', 'Editando: ' . $event->title)

@section('content')

<div id="event-create-container" class="col-md-6 offset-md-3">
  <h1>Editando: {{ $event->title }}</h1>
  <form action="/events/update/{{ $event->id }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="title">Autor: {{ $event->name }}</label>
      </div>
    
    <div class="form-group">
      <label for="title">Produto:</label>
      <input type="text" class="form-control" id="title" name="title" placeholder="Nome do produto" value="{{ $event->title }}">
    </div>
    
    <div class="form-group">
      <label for="Orientador"> Orientador: </label>
      <input type="text" class="form-control" id="Orientador" name="Orientador" placeholder="Nome do orientador"value="{{ $event->Orientador }}">
  </div>
  <div class="form-group">
      <label for="Orientador"> ppg-universidade: </label>
      <input type="text" class="form-control" id="ppg-universidade" name="ppg" placeholder="ppg-universidade do orientador"value="{{ $event->ppg }}">
  </div>
    
  <div class="form-group">
      <label for="title">Cidade:</label>
      <input type="text" class="form-control" id="city" name="city" placeholder="Local de Criação" value="{{ $event->city }}">
    </div>
    <div class="form-group">
        <label for="image">Imagem do Produto:</label>
        <input type="file" id="image" name="image" class="from-control-file">
        <img src="/img/produtos/{{ $event->image }}" alt="{{ $event->title }}" class="img-preview">
      </div>

      <div class="form-group">
        <label for="Pdf"> Pdf: </label>
        <input type="file" id="Pdf" name="Pdf" class="form-control-file" value="{{ $event->Pdf }}">
    </div>

    <div class="form-group">
      <label for="title">Descrição:</label>
      <textarea name="description" id="description" class="form-control" placeholder="descrição do produto">{{ $event->description }}</textarea>
    </div>
    
    <input type="submit" class="btn btn-primary" value="Editar Produto">
  </form>
</div>

@endsection