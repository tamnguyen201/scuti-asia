<?php

namespace App\Http\Controllers;

use Alert;

use Illuminate\Http\Request;
use App\Http\Requests\EmployeeRequest;
use App\Http\Requests\EmployeeUpdateRequest;
use App\Repositories\Employee\EmployeeRepositoryInterface;

class EmployeeController extends Controller
{
    protected $employeeRepository;

    public function __construct(EmployeeRepositoryInterface $employeeRepository) {
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

    public function update(EmployeeUpdateRequest $request, $id)
    {
        $this->employeeRepository->update($request->all(), $id);
    
        return redirect()->route('employees.index')->with('success', trans('custom.alert_messages.success'));
    }

    public function updateStatus(Request $request)
    {
        $employee = $this->employeeRepository->show($request->admin_id);
        $employee->status = $request->status;
        $employee->save();

        return response()->json(['success' => trans('custom.alert_messages.success')]);
    }

    public function destroy($id)
    {
        $this->employeeRepository->delete($id);

        return back()->with('success', trans('custom.alert_messages.success'));
    }
}
