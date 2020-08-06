<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Role;

class RoleController extends Controller
{
    
    public function index()
    {
        $roles = Role::all();
        return view("admin.role.index", compact('roles'));
        hjkjjhkjk
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        
    }
}
