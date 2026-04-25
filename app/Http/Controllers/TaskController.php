<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request; // Import the Request object
use Inertia\Inertia;

class TaskController extends Controller
{

    public function index()
    {
        return Inertia::render('Tasks', [
            // Only fetch tasks belonging to the authenticated user
            'tasks' => auth()->user()->tasks()->latest()->get()
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate(['title' => 'required|string|max:255']);

        // Create the task through the user relationship
        auth()->user()->tasks()->create($validated);

        return redirect('/tasks');
    }

    public function update(Task $task)
    {
        // Toggle the boolean value
        $task->update([
            'is_completed' => !$task->is_completed
        ]);

        return redirect('/tasks');
    }

    public function destroy(Task $task)
    {
        $task->delete();
        return redirect('/tasks');
    }

    public function profile()
    {
        return Inertia::render('Profile');
    }
}
