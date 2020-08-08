<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Role;

class RoleController extends Controller
{
    
    public function index()
    {
        $roles = Role::paginate(10);
        return view("admin.role.index", compact('roles'));
    }

    public function store(Request $request)
    {
        Role::create(
            $request->only('name')
        );

    }

    public function show($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        Role::findOrFail($id)->update(
            $request->only('name')
        );

    }

    public function destroy($id)
    {
        //
    }
}
