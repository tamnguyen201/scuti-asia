<?php

namespace App\Http\Controllers;

Use Alert;

use Illuminate\Http\Request;
use App\Repositories\Role\RoleRepositoryInterface;
use App\Repositories\Employee\EmployeeRepositoryInterface;

class EmployeeController extends Controller
{
    protected $employeeRepo;
    protected $roleRepo;

    public function __construct(
        EmployeeRepositoryInterface $employeeRepo,
        RoleRepositoryInterface $roleRepo
    )
    {
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

    public function store(Request $request)
    {
        $request->validate(
            [
                'name' => 'required',
                'email' => 'required|email|unique:users,email',
                //'phone' => 'required',
                //'avatar' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            ],
            [
                'required' => 'Trường :attribute không được để trống!',
                'email.email' => 'Vui lòng nhập đúng định dạng Email'
            ]
        );
 
        if ($files = $request->file('avatar')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $files->getClientOriginalExtension();
            $files->move($destinationPath, $profileImage);
            $insert['avatar'] = $profileImage;
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

    public function update(Request $request, $id)   
    {
        $request->validate(
            [
                'name' => 'required',
                'email' => 'required|email|unique:users,email,'.$id,
                //'phone' => 'required',
                //'avatar' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            ],
            [
                'required' => 'Trường :attribute không được để trống!',
                'email.email' => 'Vui lòng nhập đúng định dạng Email'
            ]
        );

        // $this->employeeRepo->update($request->all());

        return redirect()->route('admin.employees')->with('success','Thanh Cong!');

    }

    public function delete(Request $request)   
    {
        $this->employeeRepo->delete($request->id);
        return back()->with('success','Delete Successfully!');
    }

}
