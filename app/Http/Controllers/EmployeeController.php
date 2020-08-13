<?php

namespace App\Http\Controllers;

use Alert;

use Illuminate\Http\Request;
use App\Http\Requests\EmployeeRequest;
use App\Repositories\Role\RoleRepositoryInterface;
use App\Repositories\Employee\EmployeeRepositoryInterface;

class EmployeeController extends Controller
{
    protected $employeeRepo;
    protected $roleRepo;

    public function __construct(
        EmployeeRepositoryInterface $employeeRepo,
        RoleRepositoryInterface $roleRepo
    ) {
        $this->roleRepo = $roleRepo;
        $this->employeeRepo = $employeeRepo;
    }
    
    public function index()
    {
        $employees = $this->employeeRepo->paginate(10);
        return view('admin.staff.index', compact('employees'));
    }

    public function show($id)
    {
        $employee = $this->employeeRepo->show($id);
        return response()->json($employee);
    }

    public function create()
    {
        $roles = $this->roleRepo->all();
        return view('admin.staff.add', compact('roles'));
    }

    public function store(EmployeeRequest $request)
    {
        if ($files = $request->file('avatar')) {
            $destinationPath = 'image/';
            $avatar = date('YmdHis') . "." . $files->getClientOriginalExtension();
            $files->move($destinationPath, $avatar);
            $insert['avatar'] = $avatar;
        }
 
        $this->employeeRepo->create($request->all());
    
        return redirect('/admin/employees')
                ->with('success', 'Created successfully.');
    }

    public function edit($id)
    {
        $data['employRoles'] = $this->roleRepo->all();
        $data['employee'] = $this->employeeRepo->show($id);
        return view('admin.staff.edit', compact('data'));
    }

    public function update(EmployeeRequest $request, $id)
    {
        $this->employeeRepo->update($request->all(), $id);

        return redirect()->route('admin.employees')->with('success', 'Thanh Cong!');
    }

    public function destroy(Request $request)
    {
        $this->employeeRepo->delete($request->id);
        return back()->with('success', 'Delete Successfully!');
    }
}