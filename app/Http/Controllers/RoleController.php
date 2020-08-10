<?php

namespace App\Http\Controllers;

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

    public function store(Request $request)
    {
        $request->validate(
            [
                'name' => 'required|unique:roles,name',
            ],
            [
                'required' => 'Trường :attribute không được để trống!'
            ]
        );

        $this->roleRepo->create(
            $request->only('name')
        );

        return redirect()->route('admin.roles')->with('success','Thanh cong');

    }

    public function show($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $this->roleRepo->update(
            $request->only('name'),
            $id,
        );

    }

    public function destroy($id)
    {
        $this->roleRepo->delete($id);
        return redirect()->back()->with('success','Thanh cong!');
    }
}
