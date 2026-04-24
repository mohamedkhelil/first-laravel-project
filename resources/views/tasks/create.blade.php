@extends('layouts.app')

@section('styles')
<style>
    .task-form-page {
        max-width: 760px;
        margin: 0 auto;
    }

    .task-form-card {
        border: 1px solid #e5e7eb;
        border-radius: 18px;
        box-shadow: 0 12px 30px rgba(15, 23, 42, 0.06);
        overflow: hidden;
    }

    .task-form-card .card-header {
        padding: 1.25rem 1.5rem;
        background: linear-gradient(135deg, #0f172a, #1d4ed8);
        color: #fff;
        border-bottom: 0;
    }

    .task-form-card .card-header h4 {
        margin: 0;
        font-weight: 700;
    }

    .task-form-card .card-body {
        padding: 1.5rem;
        background: #fff;
    }

    .task-form-card .form-label,
    .task-form-card label {
        font-weight: 600;
        color: #334155;
        margin-bottom: .5rem;
    }

    .task-form-card .form-control {
        border-radius: 12px;
        border: 1px solid #dbe3ec;
        padding: .8rem 1rem;
        box-shadow: none;
    }

    .task-form-card .form-control:focus {
        border-color: #2563eb;
        box-shadow: 0 0 0 .2rem rgba(37, 99, 235, .12);
    }

    .task-form-actions {
        display: flex;
        gap: .75rem;
        flex-wrap: wrap;
        margin-top: .5rem;
    }

    .task-form-actions .btn {
        border-radius: 999px;
        padding: .7rem 1.1rem;
        font-weight: 600;
    }
</style>
@endsection

@section('content')
<div class="task-form-page">
    <div class="card task-form-card">
        <div class="card-header">
            <h4>Nouvelle Tâche</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('tasks.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="title">Titre *</label>
                    <input type="text" id="title" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}">
                    @error('title')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="description">Description</label>
                    <textarea id="description" name="description" class="form-control" rows="5">{{ old('description') }}</textarea>
                </div>
                <div class="task-form-actions">
                    <button type="submit" class="btn btn-success">Enregistrer</button>
                    <a href="{{ route('tasks.index') }}" class="btn btn-secondary">Annuler</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
