@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto py-8 px-4">

    <!-- Header -->
    <div class="mb-6">
        <h1 class="text-3xl font-bold text-gray-800">Modifier la tâche</h1>
        <p class="text-gray-500 text-sm mt-1">Mettez à jour les détails de votre tâche</p>
    </div>

    <!-- Form Card -->
    <div class="bg-white rounded-xl shadow-md border border-gray-100 overflow-hidden">

        <!-- Card Header -->
        <div class="bg-gradient-to-r from-blue-600 to-indigo-600 px-6 py-6">
            <h2 class="text-white text-xl font-bold">Détails de la tâche</h2>
        </div>

        <!-- Card Body -->
        <div class="p-6">
            <form action="{{ route('tasks.update', $task) }}" method="POST" class="space-y-5">
                @csrf
                @method('PUT')

                <div>
                    <label for="title" class="block text-sm font-semibold text-gray-700 mb-2">Titre</label>
                    <input type="text"
                           id="title"
                           name="title"
                           value="{{ old('title', $task->title) }}"
                           class="w-full rounded-lg border border-gray-300 px-4 py-3 shadow-sm focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition @error('title') border-red-500 @enderror">
                    @error('title')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="description" class="block text-sm font-semibold text-gray-700 mb-2">Description</label>
                    <textarea id="description"
                              name="description"
                              rows="5"
                              class="w-full rounded-lg border border-gray-300 px-4 py-3 shadow-sm focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition">{{ old('description', $task->description) }}</textarea>
                </div>

                <div class="flex items-center gap-3 p-4 bg-gray-50 rounded-lg">
                    <input type="checkbox"
                           id="completed"
                           name="completed"
                           class="w-4 h-4 text-blue-600 rounded"
                           {{ $task->completed ? 'checked' : '' }}>
                    <label for="completed" class="text-sm font-semibold text-gray-700">Marquer comme terminée</label>
                </div>

                <div class="flex gap-3 pt-4">
                    <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-3 rounded-lg transition shadow-sm">
                        Mettre à jour
                    </button>
                    <a href="{{ route('tasks.index') }}" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-semibold px-6 py-3 rounded-lg transition shadow-sm">
                        Annuler
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
