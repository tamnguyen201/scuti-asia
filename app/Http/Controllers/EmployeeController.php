<?php

namespace App\Http\Controllers;

use Alert;

use Illuminate\Http\Request;
use App\Http\Requests\EmployeeRequest;
use App\Repositories\Role\RoleRepositoryInterface;
use App\Repositories\Employee\EmployeeRepositoryInterface;
use App\Repositories\User\UserRepositoryInterface;

class EmployeeController extends Controller
{
    protected $employeeRepository;
    protected $userRepository;
    protected $roleRepository;

    public function __construct(
        EmployeeRepositoryInterface $employeeRepository,
        UserRepositoryInterface $userRepository,
        RoleRepositoryInterface $roleRepository
    ) {
        $this->roleRepository = $roleRepository;
        $this->userRepository = $userRepository;
        $this->employeeRepository = $employeeRepository;
    }
    
    public function index()
    {
        $employees = $this->employeeRepository->paginate(10);

        return view('admin.staff.index', compact('employees'));
    }

    public function show($id)
    {
        $employee = $this->employeeRepository->show($id);
        $html = view('admin.staff.profile', compact('employee'))->render();

        return response()->json($html);
    }

    public function create()
    {
        $roles = $this->roleRepository->all();

        return view('admin.staff.add', compact('roles'));
    }

    public function store(EmployeeRequest $request)
    {
        $this->employeeRepository->store($request->all());
        
        return redirect()->route('employees.index')->with('success', config('common.alert_messages.success'));
    }

    public function edit($id)
    {
        $manager = $this->employeeRepository->show($id);
        $roles = $this->roleRepository->all();

        return view('admin.staff.edit', compact('manager', 'roles'));
    }

    public function update(Request $request, $id)
    {
        $this->employeeRepository->update(['role_id' => $request->role_id], $id);
    
        return redirect()->route('employees.index')->with('success', config('common.alert_messages.success'));
    }

    public function destroy($id)
    {
        $this->employeeRepository->delete($id);

        return back()->with('success', config('common.alert_messages.success'));
    }
}
