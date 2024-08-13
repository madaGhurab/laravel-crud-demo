<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Fetch the number of tasks
        $taskCount = Task::count();

        // Pass the task count to the view
        return view('dashboard', compact('taskCount'));
    }
}
