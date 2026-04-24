@extends('layouts.app')
@section('title', 'Mes Tâches')

@section('styles')
<style>
    .tasks-page {
        max-width: 900px;
        margin: 0 auto;
    }

    .tasks-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 1rem;
        margin-bottom: 1.5rem;
        padding: 1.25rem 1.5rem;
        background: linear-gradient(135deg, #fff, #f8fbff);
        border: 1px solid #e6edf5;
        border-radius: 18px;
        box-shadow: 0 12px 30px rgba(15, 23, 42, 0.06);
    }

    .tasks-header h1 {
        margin: 0;
        font-size: 1.8rem;
        font-weight: 700;
        color: #0f172a;
    }

    .tasks-count {
        margin-left: .5rem;
        padding: .45rem .75rem;
        border-radius: 999px;
        background: #2563eb;
        color: #fff;
        font-size: .9rem;
        vertical-align: middle;
    }

    .tasks-header .btn {
        border-radius: 999px;
        padding: .7rem 1.1rem;
        font-weight: 600;
        box-shadow: 0 8px 18px rgba(22, 163, 74, 0.18);
    }

    .task-card {
        border: 1px solid #e5e7eb;
        border-radius: 16px;
        box-shadow: 0 10px 24px rgba(15, 23, 42, 0.05);
        transition: transform .18s ease, box-shadow .18s ease, border-color .18s ease;
        overflow: hidden;
    }

    .task-card:hover {
        transform: translateY(-2px);
        box-shadow: 0 16px 32px rgba(15, 23, 42, 0.09);
    }

    .task-card.completed {
        border-color: #22c55e;
        background: linear-gradient(135deg, #ffffff, #f0fdf4);
    }

    .task-title {
        margin-bottom: .5rem;
        font-size: 1.15rem;
        font-weight: 700;
        color: #111827;
    }

    .task-description {
        margin-bottom: 1rem;
        color: #6b7280;
        line-height: 1.6;
    }

    .task-actions {
        display: flex;
        gap: .5rem;
        flex-wrap: wrap;
    }

    .task-actions .btn {
        border-radius: 999px;
        padding: .5rem .9rem;
        font-weight: 600;
    }

    .task-empty {
        border: 1px dashed #cbd5e1;
        border-radius: 16px;
        background: #f8fafc;
    }

    @media (max-width: 640px) {
        .tasks-header {
            flex-direction: column;
            align-items: stretch;
        }

        .tasks-header .btn {
            width: 100%;
        }
    }
</style>
@endsection

@section('content')
<div class="tasks-page">
<div class="tasks-header">
    <h1>Mes Tâches <span class="tasks-count">{{ $tasks->count() }}</span></h1>
    <a href="{{ route('tasks.create') }}" class="btn btn-success">
        + Nouvelle Tâche
    </a>
</div>
@forelse($tasks as $task)
<div class="card mb-3 task-card {{ $task->completed ? 'completed' : '' }}">
    <div class="card-body">
        <h5 class="task-title {{ $task->completed ? 'text-decoration-line-through text-muted' : '' }}">
            {{ $task->title }}
        </h5>
        <p class="task-description">{{ $task->description }}</p>
        <div class="task-actions">
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
<div class="alert alert-info task-empty">
    Aucune tâche pour le moment.
    <a href="{{ route('tasks.create') }}">Créer votre première tâche</a>
</div>
@endforelse
</div>
@endsection
