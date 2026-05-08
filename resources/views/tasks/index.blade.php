@extends('layouts.app')

@section('title', 'My Tasks')

@section('content')

<!-- Header -->
<div class="flex justify-between items-center mb-6">
    <div>
        <h1 class="text-2xl font-bold text-gray-800">My Tasks</h1>
        <p class="text-gray-500 text-sm">Manage your daily work easily</p>
    </div>

    <a href="{{ route('tasks.create') }}"
       class="bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-700 transition">
        + New Task
    </a>
</div>

<!-- Grid -->
<div class="grid md:grid-cols-2 lg:grid-cols-3 gap-5">

    @forelse($tasks as $task)

    <div class="bg-white p-5 rounded-xl shadow-sm hover:shadow-md transition duration-200
        border border-gray-100">

        <!-- Title + badge -->
        <div class="flex justify-between items-start">

            <h3 class="text-lg font-semibold text-gray-800
                {{ $task->completed ? 'line-through text-gray-400' : '' }}">
                {{ $task->title }}
            </h3>

            @if($task->completed)
            <span class="text-xs bg-green-100 text-green-600 px-2 py-1 rounded-full">
                    Done
                </span>
            @else
            <span class="text-xs bg-yellow-100 text-yellow-600 px-2 py-1 rounded-full">
                    Pending
                </span>
            @endif

        </div>

        <!-- Description -->
        <p class="text-gray-500 mt-2 text-sm leading-relaxed">
            {{ $task->description }}
        </p>

        <!-- Actions -->
        <div class="mt-4 flex gap-2">

            <a href="{{ route('tasks.edit', $task) }}"
               class="text-xs bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600 transition">
                Edit
            </a>

            <form action="{{ route('tasks.destroy', $task) }}" method="POST">
                @csrf
                @method('DELETE')

                <button class="text-xs bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600 transition">
                    Delete
                </button>
            </form>

        </div>

    </div>

    @empty

    <!-- Empty state -->
    <div class="col-span-3 text-center py-16">
        <div class="text-5xl mb-4">📝</div>
        <h2 class="text-xl font-semibold text-gray-700">No tasks yet</h2>
        <p class="text-gray-500 mt-1">Start by creating your first task</p>

        <a href="{{ route('tasks.create') }}"
           class="inline-block mt-4 bg-indigo-600 text-white px-5 py-2 rounded-lg hover:bg-indigo-700">
            Create Task
        </a>
    </div>

    @endforelse

</div>

@endsection
