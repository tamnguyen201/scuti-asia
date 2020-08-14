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
        $employee = $this->userRepository->show($id);
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
        $data = $request->all();
        if ($file = $request->file('avatar')) {
            $data['avatar'] = $this->employeeRepository->upload($file);
        }

        $data['password'] = \Str::random(15);
        $member = $this->userRepository->create($data);
        $this->employeeRepository->sendMail($request->email, $data['password']);

        $manager = ['user_id' => $member->id, 'role_id' => $request->role_id];
        $this->employeeRepository->create($manager);
    
        return redirect()->route('employees.index')->with('success', config('common.alert_messages.success'));
    }

    public function edit($id)
    {
        $manager = $this->employeeRepository->show($id);
        $data['manager_edit_id'] = $id;
        $data['user'] = $this->userRepository->show($manager->user->id);
        $data['roles'] = $this->roleRepository->all();
        $data['manager_id'] = $manager->role_id;

        return view('admin.staff.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $this->employeeRepository->update($request->all(), $id);
    
        return redirect()->route('employees.index')->with('success', config('common.alert_messages.success'));
    }

    public function destroy($id)
    {
        $this->userRepository->delete($id);

        return back()->with('success', config('common.alert_messages.success'));
    }
}
