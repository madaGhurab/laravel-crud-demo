<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    // Display tasks for the logged-in user
    public function index()
    {
        $tasks = auth()->user()->tasks()->get();
        return view('tasks.index', compact('tasks'));
    }

    // Show form to create a new task
    public function create()
    {
        return view('tasks.create');
    }

    // Store a new task
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        auth()->user()->tasks()->create($request->all());
        return redirect()->route('tasks.index');
    }

    // Mark a task as complete
    public function update(Request $request, Task $task)
    {
        $task->completed = $request->has('completed');
        $task->save();
        return redirect()->route('tasks.index');
    }

    // Delete a task
    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->route('tasks.index');
    }

    public function show(Task $task)
{
         return view('tasks.show', compact('task'));
}

    public function edit(Task $task)
{
        return view('tasks.edit', compact('task'));
}


}
