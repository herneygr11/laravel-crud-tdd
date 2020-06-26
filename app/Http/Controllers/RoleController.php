<?php

namespace App\Http\Controllers;

use App\Http\Requests\RequestRole;
use App\Models\Role;

class RoleController extends Controller
{
    public function __construct()
    {
        //
    }

    public function index()
    {
        $roles = Role::all();
        return view('views.roles.index', compact('roles'));
    }

    public function createRole()
    {
        return view('views.roles.create');
    }

    public function saveRole(RequestRole $request)
    {
        if(Role::create($request->all())){
            return redirect()->route("roles.index");
        }
    }

    public function editRole(Role $role)
    {
        return view("views.roles.edit", compact('role'));
    }

    public function updateRole(RequestRole $request, Role $role)
    {
        if ($role->update($request->all())) {
            return redirect()->route("roles.index");
        }
    }

}
