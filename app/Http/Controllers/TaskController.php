<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;

class TaskController extends Controller
{

    public function index()
    {
        $this->authorize('viewAny', Task::class);

        $query = Gate::allows('admin')
            ? Task::query()
            : auth()->user()->tasks();

        $tasks = $query->orderedByPriority()->latest()->get();

        return view('tasks.index', compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('create', Task::class);

        return view('tasks.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->authorize('create', Task::class);

        $request->validate([
            'title' => 'required|min:3|max:255',
            'description' => 'nullable|max:1000',
            'priority' => 'nullable|in:haute,moyenne,basse',
        ]);

        $request->user()->tasks()->create([
            'title' => $request->title,
            'description' => $request->description,
            'priority' => $request->input('priority', 'moyenne'),
        ]);

        return redirect()->route('tasks.index')
            ->with('success', 'Tâche créée !');
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        $this->authorize('view', $task);

        return redirect()->route('tasks.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        $this->authorize('update', $task);

        return view('tasks.edit', compact('task'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Task $task)
    {
        $this->authorize('update', $task);

        $request->validate([
            'title' => 'required|min:3|max:255',
            'priority' => 'nullable|in:haute,moyenne,basse',
        ]);
        $task->update([
            'title' => $request->title,
            'description' => $request->description,
            'completed' => $request->has('completed'),
            'priority' => $request->input('priority', $task->priority),
        ]);
        return redirect()->route('tasks.index')
            ->with('success', 'Tâche modifiée !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        $this->authorize('delete', $task);

        $task->delete();

        return redirect()->route('tasks.index')
            ->with('success', 'Tâche supprimée !');
    }
}
