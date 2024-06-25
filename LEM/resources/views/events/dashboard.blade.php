@extends('layouts.main')

@section('title', 'Dashboard')

@section('content')

<div class="col-md-10 offset-md-1 dashboard-title-container">
    <h1>Gerenciamento de Produtos</h1>
</div>
<div class="col-md-10 offset-md-1 dashboard-events-container">
    @if(count($events) > 0)
    <table class="table-blue">
        <thead>
            <tr>
                <th>ID</th>
                <th>Produto</th>
                <th>Autor</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($events as $event)
                <tr>
                    <td>{{ $loop->index + 1 }}</td>
                    <td><a href="/events/{{ $event->id }}">{{ $event->title }}</a></td>
                    <td>{{ $event->name }}</td>
                    <td>
                        <div class="action-buttons">
                            <a href="/events/edit/{{ $event->id }}" class="btn btn-info edit-btn"><ion-icon name="create-outline"></ion-icon> Editar</a>
                            <button type="button" class="btn btn-danger delete-btn" onclick="deleteEvent({{ $event->id }})"><ion-icon name="trash-outline"></ion-icon> Deletar</button>
                        </div>
                        <form id="delete-form-{{ $event->id }}" action="/events/{{ $event->id }}" method="POST" style="display: none;">
                            @csrf
                            @method('DELETE')
                        </form>
                    </td>
                </tr>
            @endforeach    
        </tbody>
    </table>
    @else
    <p>Você ainda não tem produtos adicionados, <a href="/events/create">criar Produto</a></p>
    @endif
</div>

<!-- Incluindo o script Ionicons apenas uma vez -->
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

<!-- Script JavaScript para deletar evento -->
<script>
    function deleteEvent(id) {
        if (confirm('Tem certeza que deseja deletar este item?')) {
            document.getElementById('delete-form-' + id).submit();
        }
    }
</script>
@endsection
