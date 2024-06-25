@extends('layouts.main')

@section('title', $event->title)

@section('content')

  <div class="col-md-10 offset-md-1">
    <div class="row">
      <div id="image-container" class="col-md-6">
        <img src="/img/produtos/{{ $event->image }}" class="img-fluid" alt="{{ $event->title }}">
      </div>
      <div id="info-container" class="col-md-6">
        <h1>{{ $event->title }}</h1>
        <p class="event-owner"> Autor: {{ $eventOwner['name'] }}</p>
        <p class="event-orientador"></ion-icon> Orientador(a): {{ $event->Orientador }}</p>
        <p class="event-DataCriacao"></ion-icon> Data de Criação: {{ $event->created_at }}</p>
      
        
      </div>
      <p class="event-Pdf"> PDF: {{ $event->Pdf }}</p>
      <div class="col-md-12" id="description-container">
        <h3>Sobre o Produto:</h3>
        <p class="event-description">{{ $event->description }}</p>
      </div>
    </div>
  </div>

@endsection