<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Support\Facades\Gate;

class DashboardController extends Controller
{
    public function index()
    {
        $tasksQuery = Gate::allows('admin')
            ? Task::query()
            : Task::forUser(auth()->user());

        return view('dashboard', [
            'totalTasks' => $tasksQuery->count(),
            'completedTasks' => (clone $tasksQuery)->completed()->count(),
            'isAdmin' => Gate::allows('admin'),
        ]);
    }
}
