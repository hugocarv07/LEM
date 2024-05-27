@extends('layouts.main')
@section('title', 'LEM')
@section('content')
    

<div id="search-container" class="col-md-12">
    <h1>Busque um projeto</h1>
    <form action="">
        <input type="text" id="search" name="search" class="form-control" placeholder="Procurar">
    </form>
</div>
<div id="events-container" class="col-md-12">
    <h2>Projetos Principais</h2>
    <p class="subtitle">Veja alguns projetos</p>
    <div id="cards-container" class="row">
        @foreach ($events as $event)
            <div class="card col-md-3">
                <img src="/img/MAT.jpeg" alt="{{ $event->title }}">
                <div class="card-body">
                    <p class="card-date">10/05/2024</p>
                    <h5 class="card-title">{{ $event->title }}</h5>
                    <p class="card-participants">X Participantes</p>
                    <a href="#" class="btn btn-primary">Ver mais</a>
                </div>
            </div> <!-- Fechando a div do card aqui -->
        @endforeach
    </div>
</div>

@endsection
