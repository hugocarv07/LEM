@extends('layouts.main')

@section('title', $event->title)

@section('content')

  <div class="col-md-10 offset-md-1">
    <div class="row">
      <div id="image-container" class="col-md-6">
        @if($event->image)
            <img src="/img/produtos/{{ $event->image }}" class="img-fluid" alt="{{ $event->title }}">
        @else
            <p>Imagem não disponível</p>
        @endif
      </div>
      <div id="info-container" class="col-md-6">
        <h1>{{ $event->title }}</h1>
        <p class="event-owner"> Autor: {{ $eventOwner['name'] }}</p>
        <p class="event-orientador"><ion-icon name="person-outline"></ion-icon> Orientador(a): {{ $event->Orientador }}</p>
        <p class="event-DataCriacao"><ion-icon name="calendar-outline"></ion-icon> Data de Criação: {{ $event->created_at->format('d/m/Y') }}</p>
        @if($event->Pdf)
            <p class="event-Pdf"><ion-icon name="document-outline"></ion-icon> PDF: <a href="{{ asset('pdfs/' . $event->Pdf) }}" target="_blank">Download PDF</a></p>
        @else
            <p class="event-Pdf"><ion-icon name="document-outline"></ion-icon> PDF: Não disponível</p>
        @endif
      </div>
      <div class="col-md-12" id="description-container">
        <h3>Sobre o Produto:</h3>
        <p class="event-description">{{ $event->description }}</p>
      </div>
    </div>
  </div>

@endsection
