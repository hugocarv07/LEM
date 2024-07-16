@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Produto</h1>

    <form action="{{ route('admin.events.update', $event->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="title">Nome do Produto:</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ $event->title }}">
        </div>

        <div class="form-group">
            <label for="name">Autor:</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $event->name }}">
        </div>

        <div class="form-group">
            <label for="city">Cidade:</label>
            <input type="text" class="form-control" id="city" name="city" value="{{ $event->city }}">
        </div>

        <div class="form-group">
            <label for="description">Descrição:</label>
            <textarea class="form-control" id="description" name="description">{{ $event->description }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Salvar</button>
    </form>
</div>
@endsection
