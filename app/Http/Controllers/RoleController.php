<?php

namespace App\Http\Controllers;

use App\Http\Requests\RoleRequest;
use App\Http\Requests\RoleUpdateRequest;
use Illuminate\Http\Request;
use App\Model\Role;
use App\Repositories\Role\RoleRepositoryInterface;

class RoleController extends Controller
{
    protected $roleRepository;

    public function __construct(RoleRepositoryInterface $roleRepository)
    {
        $this->roleRepository = $roleRepository;
    }

    public function index()
    {
        $roles = $this->roleRepository->paginate(10);
        return view("admin.role.index", compact('roles'));
    }

    public function create()
    {
        $html = view('admin.role.add')->render();
        return response()->json($html);
    }

    public function edit($id)
    {
        $role = $this->roleRepository->show($id);
        $html = view('admin.role.edit', compact('role'))->render();
        return response()->json($html);
    }

    public function store(RoleRequest $request)
    {
        $this->roleRepository->create($request->all());
        $roles = $this->roleRepository->paginate(10);
        $html = view('admin.role.list', compact('roles'))->render();
        return response()->json($html);
    }

    public function update(RoleUpdateRequest $request)
    {
        $this->roleRepository->update($request->all(), $request->id);
        $roles = $this->roleRepository->paginate(10);
        $html = view('admin.role.list', compact('roles'))->render();
        return response()->json($html);
    }

    public function destroy($id)
    {
        $this->roleRepository->delete($id);
        return redirect()->back()->with('success', config('common.alert_messages.success'));
    }
}
