<?php

namespace App\Http\Controllers;

use App\Http\Requests\RoleRequest;
use App\Http\Requests\RoleUpdateRequest;
use Illuminate\Http\Request;
use App\Model\Role;
use App\Repositories\Role\RoleRepositoryInterface;

class RoleController extends Controller
{
    protected $roleRepo;

    public function __construct(RoleRepositoryInterface $roleRepo)
    {
        $this->roleRepo = $roleRepo;
    }

    public function index()
    {
        $roles = $this->roleRepo->paginate(10);
        return view("admin.role.index", compact('roles'));
    }

    public function create()
    {
        $html = view('admin.role.add')->render();
        return response()->json($html);
    }

    public function edit($id)
    {
        $role = $this->roleRepo->show($id);
        $html = view('admin.role.edit', compact('role'))->render();
        return response()->json($html);
    }

    public function store(RoleRequest $request)
    {
        $this->roleRepo->create($request->all());
        $roles = $this->roleRepo->paginate(10);
        $html = view('admin.role.list', compact('roles'))->render();
        return response()->json($html);
    }

    public function update(RoleUpdateRequest $request)
    {
        $this->roleRepo->update($request->all(), $request->id);
        $roles = $this->roleRepo->paginate(10);
        $html = view('admin.role.list', compact('roles'))->render();
        return response()->json($html);
    }

    public function destroy($id)
    {
        $this->roleRepo->delete($id);
        return redirect()->back()->with('success', config('common.alert_messages.success'));
    }
}
