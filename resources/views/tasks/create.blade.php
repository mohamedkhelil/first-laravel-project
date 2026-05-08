@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto py-8 px-4">

    <!-- Header -->
    <div class="mb-6">
        <h1 class="text-3xl font-bold text-gray-800">Nouvelle Tâche</h1>
        <p class="text-gray-500 text-sm mt-1">Créez une nouvelle tâche pour gérer votre travail</p>
    </div>

    <!-- Form Card -->
    <div class="bg-white rounded-xl shadow-md border border-gray-100 overflow-hidden">

        <!-- Card Header -->
        <div class="bg-gradient-to-r from-blue-600 to-indigo-600 px-6 py-6">
            <h2 class="text-white text-xl font-bold">Détails de la tâche</h2>
        </div>

        <!-- Card Body -->
        <div class="p-6">

            <form action="{{ route('tasks.store') }}" method="POST" class="space-y-5">
                @csrf

                <div>
                    <label for="title" class="block text-sm font-semibold text-gray-700 mb-2">Titre *</label>
                    <input type="text"
                           id="title"
                           name="title"
                           value="{{ old('title') }}"
                           class="w-full rounded-lg border border-gray-300 px-4 py-3 shadow-sm focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition @error('title') border-red-500 @enderror"
                           placeholder="Entrez le titre de la tâche">
                    @error('title')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="description" class="block text-sm font-semibold text-gray-700 mb-2">Description</label>
                    <textarea id="description"
                              name="description"
                              rows="5"
                              class="w-full rounded-lg border border-gray-300 px-4 py-3 shadow-sm focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition"
                              placeholder="Décrivez votre tâche...">{{ old('description') }}</textarea>
                </div>

                <div class="flex gap-3 pt-4">
                    <button type="submit" class="bg-green-600 hover:bg-green-700 text-white font-semibold px-6 py-3 rounded-lg transition shadow-sm">
                        Enregistrer
                    </button>
                    <a href="{{ route('tasks.index') }}" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-semibold px-6 py-3 rounded-lg transition shadow-sm">
                        Annuler
                    </a>
                </div>
            </form>

        </div>
    </div>
</div>
