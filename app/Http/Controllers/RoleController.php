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

    public function saveRole(RequestRole $request)
    {
        if(Role::create($request->all())){
            return redirect()->route("roles.index");
        }
    }
}
