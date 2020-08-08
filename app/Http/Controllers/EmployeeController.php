<?php

namespace App\Http\Controllers;

use App\Model\User;
use App\Model\Role;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = User::where('role','<>',4)
                        ->paginate(10);
        if (1<2) {
            alert('Post Created','Successfully', 'success');
        } else {
            alert()->error('Post Created', 'Something went wrong!'); // hoặc có thể dùng alert('Post Created','Something went wrong!', 'error');
        }
        return view('admin.staff.index', compact('employees'));

    }

    public function create()
    {
        $roles = Role::all();
        return view('admin.staff.add', compact('roles'));
    }

    public function store(Request $request)
    {
        User::create(
            $request->only('name')
        );
        return redirect()->route('admin.employees');
    }

    public function edit($id)   
    {
        User::findOrFail($id);
        return view('admin.employee.edit', compact('employee'));
    }

    public function update(Request $request, $id)   
    {
        User::update(
            $request->only('name')
        );
        return redirect()->route('admin.employees');

    }

    public function delete($id)   
    {
        User::destroy($id);
        return back()->with('message','Succesfully!');
    }

}
