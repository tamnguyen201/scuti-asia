<?php

namespace App\Http\Controllers;

use Alert;

use Illuminate\Http\Request;
use App\Http\Requests\EmployeeRequest;
use App\Repositories\Employee\EmployeeRepositoryInterface;
use App\Repositories\User\UserRepositoryInterface;

class EmployeeController extends Controller
{
    protected $employeeRepository;
    protected $userRepository;

    public function __construct(
        EmployeeRepositoryInterface $employeeRepository,
        UserRepositoryInterface $userRepository
    ) {
        $this->userRepository = $userRepository;
        $this->employeeRepository = $employeeRepository;
    }
    
    public function index()
    {
        $employees = $this->employeeRepository->paginate();

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
        return view('admin.staff.add');
    }

    public function store(EmployeeRequest $request)
    {
        $this->employeeRepository->store($request->all());
        
        return redirect()->route('employees.index')->with('success', trans('custom.alert_messages.success'));
    }

    public function edit($id)
    {
        $manager = $this->employeeRepository->show($id);

        return view('admin.staff.edit', compact('manager'));
    }

    public function update(Request $request, $id)
    {
        $this->userRepository->update(['role' => $request->role], $request->user_id);
    
        return redirect()->route('employees.index')->with('success', trans('custom.alert_messages.success'));
    }

    public function destroy($id)
    {
        $manager = $this->employeeRepository->show($id);
        $this->employeeRepository->delete($id);
        $this->userRepository->delete($manager->user_id);

        return back()->with('success', trans('custom.alert_messages.success'));
    }
}
