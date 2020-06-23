<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function __construct()
    {
        //
    }

    public function saveRole(Request $request)
    {
        if(Role::create($request->all())){
            return redirect()->route("roles.index");
        }
    }
}
