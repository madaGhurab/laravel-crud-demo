<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\User;

class AdminController extends Controller
{
    // Display admin dashboard
    public function index()
    {
        $tasks = Task::all();
        $users = User::all();
        return view('admin.index', compact('tasks', 'users'));
    }

    // Manage user accounts
    public function manageUsers()
    {
        $users = User::all();
        return view('admin.manage-users', compact('users'));
    }
}
