@extends('layouts.main')

@section('title', 'Ficha Avaliativa')

@section('content')

<div id="evaluation-form-container" class="col-md-6 offset-md-3">
    <h1>Ficha Avaliativa</h1>
    <form action="/evaluate" method="POST">
        @csrf
        
        <!-- Exemplo de campo para Nome do Avaliador -->
        <div class="form-group">
            <label for="evaluator_name">Nome do Avaliador:</label>
            <input type="text" class="form-control" id="evaluator_name" name="evaluator_name" placeholder="Nome do avaliador">
        </div>

        <!-- Exemplo de campo para Data da Avaliação -->
        <div class="form-group">
            <label for="evaluation_date">Data da Avaliação:</label>
            <input type="date" class="form-control" id="evaluation_date" name="evaluation_date">
        </div>

        <!-- Exemplo de campo para Comentários Gerais -->
        <div class="form-group">
            <label for="comments">Comentários:</label>
            <textarea class="form-control" id="comments" name="comments" placeholder="Insira seus comentários"></textarea>
        </div>

        <!-- Botão para enviar o formulário -->
        <input type="submit" class="btn btn-primary" value="Enviar Avaliação">
    </form>
</div>

@endsection
