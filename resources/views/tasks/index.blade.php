@extends('layouts.app')
@section('title', 'Mes Tâches')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1>Mes Tâches
        <span class="badge bg-primary">{{ $tasks->count() }}</span>
    </h1>
    <a href="{{ route('tasks.create') }}" class="btn btn-success">
        + Nouvelle Tâche
    </a>
</div>
@forelse($tasks as $task)
<div class="card mb-3 {{ $task->completed ? 'border-success' : '' }}">
    <div class="card-body">
        <h5 class="{{ $task->completed ? 'text-decoration-line-through text-muted' : '' }}">
            {{ $task->title }}
        </h5>
        <p class="text-muted">{{ $task->description }}</p>
        <div class="d-flex gap-2">
            <a href="{{ route('tasks.edit', $task) }}" class="btn btn-sm btn-warning">
                Modifier
            </a>
            <form action="{{ route('tasks.destroy', $task) }}" method="POST">
                @csrf
                @method('DELETE')
                <button
                    class="btn btn-sm btn-danger"
                    onclick="return confirm('Supprimer cette tâche ?')">
                    Supprimer
                </button>
            </form>
        </div>
    </div>
</div>

@empty
<div class="alert alert-info">
    Aucune tâche.
    <a href="{{ route('tasks.create') }}">Créer votre première tâche</a>
</div>
@endforelse
@endsection
