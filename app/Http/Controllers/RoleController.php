<?php

namespace App\Http\Controllers;

use App\Http\Requests\AssignRoleRequest;
use App\Models\User;
use App\Models\Role;

class RoleController extends Controller
{
    public function store(AssignRoleRequest $request)
    {
        $user = User::find($request->input('user_id'));
        $role = Role::find($request->input('role_id'));

        if ($user && $role) {
            $user->roles()->attach($role);
            return redirect()->back()->with('success', 'Role assigned successfully');
        }

        return redirect()->back()->with('error', 'User or Role not found');
    }
}
