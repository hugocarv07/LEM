@extends('layouts.main')
@section('title', 'LEM')
@section('content')
    

<div id="search-container" class="col-md-12">
    <h1>Busque um produto</h1>
    <form action="" method="GET">
        <input type="text" id="search" name="search" class="form-control" placeholder="Procurar">
    </form>
</div>
<div id="events-container" class="col-md-12">
    @if($search)
    <h2>Buscando por: {{ $search }}</h2>
    @else
    <h2>Produtos Principais</h2>
    <p class="subtitle">Veja alguns produtos</p>
    @endif
    <div id="cards-container" class="row">
        @foreach ($events as $event)
            <div class="card col-md-3">
                <img src="/img/produtos/{{$event->image}}" alt="{{ $event->title }}">
                <div class="card-body">
                    <p class="card-date">{{ $event->created_at }}</p>
                    <h5 class="card-title">{{ $event->title }}</h5>
                    <p class="card-participants">Criador(a):{{ $event->name }}</p>
                    <a href="/events/{{$event->id}}" class="btn btn-primary">Ver mais</a>
                </div>
            </div> <!-- Fechando a div do card aqui -->
        @endforeach
        @if(count($events) == 0 && $search)
        <p>Não foi possível encontrar nenhum produto com o nome: {{ $search }} ! <a href="/">Ver todos</a></p>
    @elseif(count($events) == 0)
        <p>Não há produtos disponíveis</p>
    @endif
    </div>
</div>

@endsection
