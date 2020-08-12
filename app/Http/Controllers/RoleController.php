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

    public function edit($id)
    {
        $role = $this->roleRepo->show($id);
        return response()->json($role);
    }

    public function store(RoleRequest $request)
    {
        $results = $this->roleRepo->create(
            $request->all()
        );

        return response()->json($results);
    }

    public function update(RoleUpdateRequest $request)
    {
        $this->roleRepo->update(
            $request->all(),
            $request->id
        );
        $results = $this->roleRepo->show($request->id);

        return response()->json($results);
    }

    public function destroy($id)
    {
        $this->roleRepo->delete($id);
        return redirect()->back()->with('success', 'Thành công!');
    }
}
